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
$multimedia = 'http://placehold.it/70x70';
if(!empty($row->field_field_product_multimedia)){
    $multimedia = $row->field_field_product_multimedia[0]['raw']['uri'];
}
?>
        <div class="featured-image">
            <img width="70" height="70" src="<?php print file_create_url($multimedia);?>" alt="">
        </div>
        <div class="shop-item-content">
            <?php if(isset($fields['title'])): print $fields['title']->content; endif;?>
            <span class="price"><?php if(!empty($fields['field_regular_price']) && $fields['field_regular_price']->content != Null):?><del><?php print $fields['field_regular_price']->content;?></del>&nbsp;<?php endif;?><?php if(isset($fields['commerce_price'])): print $fields['commerce_price']->content; endif;?></span>
            <?php if(isset($fields['field_rating'])):?>
            <div class="read-only-small" data-score="5">
                <?php print $fields['field_rating']->content;?>
            </div>
            <?php endif;?>
        </div>
<?php unset($fields['title']);?>
<?php unset($fields['field_rating']);?>
<?php unset($fields['field_product_multimedia']);?>
<?php unset($fields['commerce_price']);?>
<?php unset($fields['field_regular_price']);?>
<?php foreach ($fields as $id => $field): ?>
    <?php if (!empty($field->separator)): ?>
        <?php print $field->separator; ?>
    <?php endif; ?>
    <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
    <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>