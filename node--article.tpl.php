<?php 
if (!$page) { 
?>
<div class="articles<?php //print (elim_article_first() ? '' : ' first')?>">
<div class="image"><?php print render($content['field_image']); ?></div>
                                
<div class="details">
<h5><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h5>
<span class="date"><?php print format_date($node->created); ?>, <?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?> - <a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a><?php } ?></span>                                    
<?php hide($content['comments']); hide($content['links']); print render($content); ?>
</div>
<div class="clear"></div>
<?php //print '<pre>'. check_plain(print_r($node, 1)) .'</pre>'; ?>
</div>
<?php } else { 
//govideo_set_background($node->field_background_article['und'][0]['uri']);  
$acc = user_load(1);
?>
<div id="content">
<?php if ($display_submitted): ?>
<div class="meta"><?php print $submitted ?><?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?> - <a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a><?php } ?></div>
<div class="clear"></div>
<?php endif; ?>

<?php hide($content['comments']); hide($content['links']); print render($content); ?>

<div id="author">
<h4><span>About the Author</span></h4>
<?php print theme('user_picture', array('account' => $acc)); ?>
<p><?php print $acc->field_userabout[$node->language][0]['value']; ?></p>
<div class="clear"></div>                        
</div>

<?php
  $name = 'related_posts';
  $display_id = 'block';
  if ($view = views_get_view($name)) {
    if ($view->access($display_id)) {
      $output = $view->execute_display($display_id);
      $view->destroy();
	    print '<div id="related"><h4><span>'.t('Related Posts').'</span></h4>'.$output['content'].'<div class="clear"></div></div>';
    }
    $view->destroy();
  }
?>   

<div class="clear"></div>
<?php //print '<pre>'. check_plain(print_r($node, 1)) .'</pre>'; ?>

<?php print render($content['comments']); ?>
<div class="clear"></div>
</div>
<?php } ?>
