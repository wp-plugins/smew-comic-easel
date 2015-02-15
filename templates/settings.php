<?php
defined('ABSPATH') or die("No script kiddies please!");
?>
<style type="text/css">
<!--
.style2 {font-size: xx-small}
-->
</style>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>SMEW Comic Easel &#9829; s2Member</h2>
	<br />
	<div style="background-color: #EBEBEB;-moz-border-radius:15px;border-radius:15px;padding:10px;"> Help turn your Comic Easel site into a paid subscription site with s2Member. Requires both <a href="https://wordpress.org/plugins/comic-easel/">Comic Easel</a> and <a href="https://wordpress.org/plugins/s2member/">s2Member</a> to funtion since this acts as a bridge between the two.<br />
  </div>
	<h2>
	  Settings	
  </h2>
	<form method="post" action="options.php">
		<?php @settings_fields('smew_ce_s2-group'); ?>
        <?php @do_settings_fields('smew_ce_s2-group'); ?>
		
		<div>
		<h3>Drip Feed</h3>
		<div>
		Explenation of drip feed goes here<br/>
		<label for="drip_time">Preview Comic? </label>
		<select class="drip_time" id="drip_time" name="drip_time">
		<option value="" <?php if(get_option('drip_time')=='NULL'){ echo 'selected="selected"'; } ?> >NONE</option>
		<option value="1 day" <?php if(get_option('drip_time')=='1 day'){ echo 'selected="selected"'; } ?> >1 day</option>
		<option value="3 days" <?php if(get_option('drip_time')=='3 days'){ echo 'selected="selected"'; } ?> >3 days</option>
		<option value="5 days" <?php if(get_option('drip_time')=='5 days'){ echo 'selected="selected"'; } ?> >5 days</option>
		<option value="1 week" <?php if(get_option('drip_time')=='1 week'){ echo 'selected="selected"'; } ?> >1 week</option>
		<option value="2 weeks" <?php if(get_option('drip_time')=='2 weeks'){ echo 'selected="selected"'; } ?> >2 weeks</option>
		<option value="1 month" <?php if(get_option('drip_time')=='1 month'){ echo 'selected="selected"'; } ?> >1 month</option>
		<option value="2 months" <?php if(get_option('drip_time')=='2 months'){ echo 'selected="selected"'; } ?> >2 months</option>
		<option value="3 months" <?php if(get_option('drip_time')=='3 months'){ echo 'selected="selected"'; } ?> >3 months</option>
		<option value="6 months" <?php if(get_option('drip_time')=='6 months'){ echo 'selected="selected"'; } ?> >6 months</option>
		<option value="1 year" <?php if(get_option('drip_time')=='1 year'){ echo 'selected="selected"'; } ?> >1 year</option>
		</select>
		for user with access to 
		<select class="drip_level" id="drip_level" name="drip_level">
			<option value="" <?php if(get_option('drip_level')=='NULL'){ echo 'selected="selected"'; } ?> >NONE</option>
			<option value="access_s2member_level0" <?php if(get_option('drip_level')=='access_s2member_level0'){ echo 'selected="selected"'; } ?> >Member Level 0</option>
			<option value="access_s2member_level1" <?php if(get_option('drip_level')=='access_s2member_level1'){ echo 'selected="selected"'; } ?> >Member Level 1</option>
			<option value="access_s2member_level2" <?php if(get_option('drip_level')=='access_s2member_level2'){ echo 'selected="selected"'; } ?> >Member Level 2</option>
			<option value="access_s2member_level3" <?php if(get_option('drip_level')=='access_s2member_level3'){ echo 'selected="selected"'; } ?> >Member Level 3</option>
			<option value="access_s2member_level4" <?php if(get_option('drip_level')=='access_s2member_level4'){ echo 'selected="selected"'; } ?> >Member Level 4</option>
		</select>
		</div>
		<br />
		<h3>Images Sizes Resetictions</h3>
		<div>
		Explenation of image resrictions goes here<br/>
		Image Size - Access level
		<hr>
		<input type="checkbox" id="image_size_full" name="image_size_full" value="yes" <?php if(get_option('image_size_full')=='yes'){ echo 'checked="checked"'; } ?> />Full -- 
			<select class="restrict_image_size_full" id="restrict_image_size_full" name="restrict_image_size_full">
				<option value="" <?php if(get_option('restrict_image_size_full')=='NULL'){ echo 'selected="selected"'; } ?> >NONE</option>
				<option value="access_s2member_level0" <?php if(get_option('restrict_image_size_full')=='access_s2member_level0'){ echo 'selected="selected"'; } ?> >Member Level 0</option>
				<option value="access_s2member_level1" <?php if(get_option('restrict_image_size_full')=='access_s2member_level1'){ echo 'selected="selected"'; } ?> >Member Level 1</option>
				<option value="access_s2member_level2" <?php if(get_option('restrict_image_size_full')=='access_s2member_level2'){ echo 'selected="selected"'; } ?> >Member Level 2</option>
				<option value="access_s2member_level3" <?php if(get_option('restrict_image_size_full')=='access_s2member_level3'){ echo 'selected="selected"'; } ?> >Member Level 3</option>
				<option value="access_s2member_level4" <?php if(get_option('restrict_image_size_full')=='access_s2member_level4'){ echo 'selected="selected"'; } ?> >Member Level 4</option>
			</select><br/>
		<input type="checkbox" id="image_size_large" name="image_size_large" value="yes" <?php if(get_option('image_size_large')=='yes'){ echo 'checked="checked"'; } ?> />Large -- 
			<select class="restrict_image_size_large" id="restrict_image_size_large" name="restrict_image_size_large">
				<option value="" <?php if(get_option('restrict_image_size_full')=='NULL'){ echo 'selected="selected"'; } ?> >NONE</option>
				<option value="access_s2member_level0" <?php if(get_option('restrict_image_size_large')=='access_s2member_level0'){ echo 'selected="selected"'; } ?> >Member Level 0</option>
				<option value="access_s2member_level1" <?php if(get_option('restrict_image_size_large')=='access_s2member_level1'){ echo 'selected="selected"'; } ?> >Member Level 1</option>
				<option value="access_s2member_level2" <?php if(get_option('restrict_image_size_large')=='access_s2member_level2'){ echo 'selected="selected"'; } ?> >Member Level 2</option>
				<option value="access_s2member_level3" <?php if(get_option('restrict_image_size_large')=='access_s2member_level3'){ echo 'selected="selected"'; } ?> >Member Level 3</option>
				<option value="access_s2member_level4" <?php if(get_option('restrict_image_size_large')=='access_s2member_level4'){ echo 'selected="selected"'; } ?> >Member Level 4</option>
			</select><br/>
		<input type="checkbox" id="image_size_medium" name="image_size_medium" value="yes" <?php if(get_option('image_size_medium')=='yes'){ echo 'checked="checked"'; } ?> />Medium -- 
		<select class="restrict_image_size_medium" id="restrict_image_size_medium" name="restrict_image_size_medium">
				<option value="" <?php if(get_option('restrict_image_size_full')=='NULL'){ echo 'selected="selected"'; } ?> >NONE</option>
				<option value="access_s2member_level0" <?php if(get_option('restrict_image_size_medium')=='access_s2member_level0'){ echo 'selected="selected"'; } ?> >Member Level 0</option>
				<option value="access_s2member_level1" <?php if(get_option('restrict_image_size_medium')=='access_s2member_level1'){ echo 'selected="selected"'; } ?> >Member Level 1</option>
				<option value="access_s2member_level2" <?php if(get_option('restrict_image_size_medium')=='access_s2member_level2'){ echo 'selected="selected"'; } ?> >Member Level 2</option>
				<option value="access_s2member_level3" <?php if(get_option('restrict_image_size_medium')=='access_s2member_level3'){ echo 'selected="selected"'; } ?> >Member Level 3</option>
				<option value="access_s2member_level4" <?php if(get_option('restrict_image_size_medium')=='access_s2member_level4'){ echo 'selected="selected"'; } ?> >Member Level 4</option>
			</select><br/>
		<input type="checkbox" id="image_size_thumbnail" name="image_size_thumbnail" value="" disabled="disabled" />Thumbnail -- 
		<select class="restrict_image_size_thumbnail" id="restrict_image_size_thumbnail" name="restrict_image_size_thumbnail" disabled="disabled">
				<option value="">NONE</option>
			</select>
			</div>
		<?php @submit_button(); ?>
    </form>
</div>