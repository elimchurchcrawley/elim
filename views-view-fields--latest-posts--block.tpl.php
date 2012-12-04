<div class="image"><?php if (isset($fields['field_image']->content)) print $fields['field_image']->content; ?></div>
<h3><?php print $fields['title']->content; ?></h3>
<div class="date"><?php print $fields['created']->content; ?>, <a href="<?php print url('node/'.$fields['nid']->content, array('fragment' => 'comment-form')) ?>"><?php print $fields['comment_count']->content; ?></a></div>
<div class="excerpt"><?php print $fields['body']->content; ?></div>
