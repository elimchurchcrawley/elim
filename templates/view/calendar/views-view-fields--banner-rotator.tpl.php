<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

?>
<?php foreach ($fields as $id => $field): ?>
	<?php 
		$count = $view->row_index; 
		$event = $row->_field_data['nid']['entity'];

		$single_image = 'http://placehold.it/262x148';
		if (!empty($event->field_single_image['und'])) {
		    $single_image = image_style_url("image_900x600",$event->field_single_image['und'][0]['uri']);
		}
	?>
	<li class="flex_rotator_<?php print $count; ?>" style="background: url(<?php print $single_image; ?>) center center no-repeat">
		<div class="banner-rotator-content">
			<h5><?php print $event->title;?></h5>
			<h2><?php if(isset($event->field_location['und'])){print $event->field_location['und'][0]['value'];}?></h2>
			<span class="date"><?php if(isset($event->event_calendar_date['und'])){
						print date('F jS',strtotime($event->event_calendar_date['und'][0]['value']));
					}
				?>
			</span>
			<a href="<?php print drupal_lookup_path('alias',"node/".$row->nid) ?>" class="button big button-arrow"><?php print t('Details');?></a>
		</div>

	</li>

<?php endforeach; ?>