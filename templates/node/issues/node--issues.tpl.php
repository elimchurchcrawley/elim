
<?php
if(isset($content['field_show_type'])){
    $type = $content['field_show_type']['#items'][0]['value'];
}
$single_image = 'http://placehold.it/262x148';
if (!empty($node->field_single_image['und'])) {
    $single_image = image_style_url("image_262x148",$node->field_single_image['und'][0]['uri']);
}
?>
<?php if(!$page):?>
    <div class="issue-block">
        <?php if($type == 'icon'):?>
        <?php if(isset($content['field_icon'])):?>
        <div class="issue-icon">
            <i class="icons <?php print $content['field_icon']['#items'][0]['value'];?>"></i>
        </div>
        <?php endif;?>
        <?php else:?>
        <div class="issue-image">
            <img src="<?php print $single_image;?>" alt="">
        </div>
        <?php endif;?>
        <div class="issue-content">
            <h4><?php print $title;?></h4>
            <?php if(isset($content['body'])): print render($content['body']); endif;?>
            <a class="button big button-arrow" href="<?php print $node_url;?>"><?php print t('Read more');?></a>
        </div>
    </div>
<?php else:?>
    <?php if(isset($content['body'])): print render($content['body']); endif;?>
<?php endif;?>