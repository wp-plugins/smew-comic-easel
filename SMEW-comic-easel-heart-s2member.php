<?php
/*
Plugin Name: SMEW Comic Easel &#9829; s2member
Description: s2member intigration for Comic Easel for drip feeding of comic posts. Currently hardcoded to allow s2Member restricted Comic Easel custom post type 'comic' to drip content to everyone after one month. Only functions on Single Post. This is a child theme for both <a href="https://wordpress.org/plugins/comic-easel/">Comic Easel</a> and <a href="https://wordpress.org/plugins/s2member/">s2Member</a>. You must have both for this to be of any use.
Version: 0.1.4
License: GPL
Author: Christina "Smudge" Hanson, Philip M. Hofer (Frumph), s2Member / WebSharks, Inc.
Author URI: http://www.smudgemarks-engelwerks.com/
*/

defined('ABSPATH') or die("No script kiddies please!");

######
## Set up widgets
######

require_once(dirname(__FILE__).'/widgets/thumbnail.php');

######
## Set up plugin
######

if(!class_exists('SMEW_ce_heart_s2'))
	{
	class SMEW_ce_heart_s2
		{
		public function __construct()
			{
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));
			}
	
		public static function activate()
			{
			// Do nothing
			}
    
		public static function deactivate()
			{
			// Do nothing
			}

		public function admin_init()
			{
			$this->init_settings();
			}
   
		public function init_settings()
			{
			// register the settings for this plugin
			register_setting('smew_ce_s2-group', 'drip_time');
			register_setting('smew_ce_s2-group', 'drip_level');
			register_setting('smew_ce_s2-group', 'image_size_full');
			register_setting('smew_ce_s2-group', 'image_size_large');
			register_setting('smew_ce_s2-group', 'image_size_medium');
			register_setting('smew_ce_s2-group', 'restrict_image_size_full');
			register_setting('smew_ce_s2-group', 'restrict_image_size_large');
			register_setting('smew_ce_s2-group', 'restrict_image_size_medium');
			}
		######
		## add a menu
		######     
		public function add_menu()
			{
			add_options_page('SMEW Comic Easel &#9829; s2Member Settings', 'Comic Easel &#9829; s2Member', 'manage_options', 'ce_heart_s2', array(&$this, 'plugin_settings_page'));
			}
		
		######
		## Menu Callback
		######    
		public function plugin_settings_page()
			{
			if(!current_user_can('manage_options'))
				{
				wp_die(__('You do not have sufficient permissions to access this page.'));
				}		
			include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
			}
		} 
	}

if(class_exists('SMEW_ce_heart_s2'))
	{
    register_activation_hook(__FILE__, array('SMEW_ce_heart_s2', 'activate'));
    register_deactivation_hook(__FILE__, array('SMEW_ce_heart_s2', 'deactivate'));

    $ce_heart_s2 = new SMEW_ce_heart_s2();
	
	if(isset($wp_plugin_template))
		{
    	function plugin_settings_link($links)
    		{ 
        	$settings_link = '<a href="options-general.php?page=SMEW-CE-S2">Settings</a>'; 
        	array_unshift($links, $settings_link); 
        	return $links; 
    		}

    	$plugin = plugin_basename(__FILE__); 
    	add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
		}
	}
	
######
## Block single post view of Post Type 'comic' if viewer is not logged in or Member Level 0
######

add_filter( 'ws_plugin__s2member_check_post_level_access_excluded', 'set_s2member_restriction' );

function set_s2member_restriction()
	{
	if (get_option('drip_time')!='NULL')
		{
		global $post;
		
		$memberlevel_drip = get_option('drip_time');
		$gmt_timestamp = get_post_time('U', true);
		$comic_drip_time = date('U',strtotime('+'. $memberlevel_drip,$gmt_timestamp));
		$current_time = time();
		$s2_drip_access = get_option('drip_level');

		if (is_singular( 'comic' ) && ($comic_drip_time < $current_time))
			{
			return true;
			}
		return false;
		}
 	}
	
######
## Display comic image as 'large' instead of 'full'
######

function multiexplode ($delimiters,$string)
	{
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
	}

add_filter('ceo_display_featured_image_comic', 'comic_size');

function comic_size($output)
	{	
	$size = 'thumbnail';
	
	if (get_option('image_size_medium')=='yes')
		{
		$s2_access_level = get_option('restrict_image_size_medium');
		if (current_user_can($s2_access_level))
			{
			$size = 'medium';
			}
		}
	else
		{
		$size = 'medium';
		}
		
	if (get_option('image_size_large')=='yes')
		{
		$s2_access_level = get_option('restrict_image_size_large');
		if (current_user_can($s2_access_level))
			{
			$size = 'large';
			}
		}
	else
		{
		$size = 'large';
		}
		
	if (get_option('image_size_full')=='yes')
		{
		$s2_access_level = get_option('restrict_image_size_full');
		if (current_user_can($s2_access_level))
			{
			$size = 'full';
			}
		}
	else
		{
		$size = 'full';
		}

	$current_ID = get_the_ID();
	$post_image_id = get_post_thumbnail_id($current_ID);
	$current_image = wp_get_attachment_image_src( $post_image_id, $size );
	$current_image = reset($current_image);
	$new_output = multiexplode(array('="','"'), $output );
	$new_image_output = '';
	if($new_output[0] == '<img src=')
		{
		$new_image_output .= '<img src="'.  $current_image .'" alt="'. $new_output[3] .'" title="'. $new_output[5] .'" />';
		}
	else
		{
		$new_image_output .= '<a href="'. $new_output[1] .'" title="'. $new_output[3] .'">';
		$new_image_output .= '<img src="'.  $current_image .'" alt="'. $new_output[3] .'" title="'. $new_output[5] .'" />';
		$new_image_output .= '</a>';
		}
	echo $new_image_output;
	}

?>