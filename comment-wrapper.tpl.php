<!-- Comments -->
<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<div id="comments">
  <h3><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?><?php print t(' on ').'"'.$content['#node']->title.'"' ?></h3>
  <div class="comments">
    <?php print render($content['comments']); ?>
    <?php //print '<pre>'. check_plain(print_r($content['#node'], 1)) .'</pre>' ?>
  </div>
  <div id="respond"><h3>Leave a Comment</h3></div>
  <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
</div>
<?php } ?>