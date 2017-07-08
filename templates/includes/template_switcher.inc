<?php 
	global $theme_root; 
	global $base_url; 
?>
<!-- Customize Box -->
<div class="customize-box">

	<h5><?php print t('Layout Settings');?></h5>
	
	<form id="customize-box">
		
		<label><?php print t('Layout type:');?></label><br>
		<input type="radio" value="boxed" name="layout-type" id="boxed-layout-radio"><label for="boxed-layout-radio"><?php print t('Boxed');?></label>
		<input type="radio" value="wide" name="layout-type" checked="checked" id="wide-layout-radio"><label for="wide-layout-radio"><?php print t('Wide');?></label>
		
		<br>
		
		<label><?php print t('Background:');?></label>
		<select id="background-option" class="chosen-select">
			<option value=".background-color"><?php print t('Color');?></option>
			<option selected value=".background-image"><?php print t('Background');?></option>
		</select>
		
		<div class="background-color">
            <div id="colorpicker"></div>
			<input type="hidden" id="colorpicker-value" value="#000">
		</div>
		
		<div class="background-image">
			<input type="radio" value="<?php echo $theme_root; ?>/img/background/1.jpg" name="background-image-radio" id="background-img-radio-1" checked>
			<label for="background-img-radio-1"><img width="30" height="30" src="<?php echo $theme_root; ?>/img/background/1-thumb.jpg" alt=""></label>
			
			<input type="radio" value="<?php echo $theme_root; ?>/img/background/2.jpg" name="background-image-radio" id="background-img-radio-2">
			<label for="background-img-radio-2"><img width="30" height="30" src="<?php echo $theme_root; ?>/img/background/2-thumb.jpg" alt=""></label>
			
			<input type="radio" value="<?php echo $theme_root; ?>/img/background/3.jpg" name="background-image-radio" id="background-img-radio-3">
			<label for="background-img-radio-3"><img width="30" height="30" src="<?php echo $theme_root; ?>/img/background/3-thumb.jpg" alt=""></label>
		</div>
		
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">
		
	</form>
	
	<div class="customize-box-button">
		<i class="icons icon-cog-3"></i>
	</div>
	
</div>
<!-- /Customize Box -->