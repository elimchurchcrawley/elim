<div class="image"><?php if (isset($fields['field_image']->content)) print $fields['field_image']->content; ?></div>
<div class="details">
<h5><?php print $fields['title']->content; ?></h5>
<span class="date"><?php print $fields['created']->content; ?>, <a href="<?php print url('node/'.$fields['nid']->content, array('fragment' => 'comment-form')) ?>"><?php print $fields['comment_count']->content; ?></a></span>
</div>