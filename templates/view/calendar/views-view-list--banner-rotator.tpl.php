<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
$count =1;
?>
<div class="banner-rotator animate-onscroll">
	<div class="flexslider banner-rotator-flexslider">
			<?php print $wrapper_prefix; ?>
			  <?php if (!empty($title)) : ?>
			    <h3><?php print $title; ?></h3>
			  <?php endif; ?>
			  <?php print $list_type_prefix; ?>
			    <?php foreach ($rows as $id => $row): ?>
			      <?php print $row; ?>
			      	<?php $count++;?>
			    <?php endforeach; ?>
			  <?php print $list_type_suffix; ?>
			<?php print $wrapper_suffix; ?>
	</div>
</div>