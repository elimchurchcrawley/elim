<div class="comment">
<div class="image"><?php print $picture ?></div>
<div class="details">
<div class="name"><span class="author"><?php print theme('username', array('account' => $content['comment_body']['#object'])) ?></span> <span class="date"><?php print format_date($content['comment_body']['#object']->created); ?><?php print str_replace(array('<li','<ul','</li>','</ul'), array(' &middot; <span','<span','</span>','</span'), render($content['links'])) ?></span></div>
<?php print render($content) ?>
</div>
</div>
<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>