<div class="panel">
  <div class="slider_image"><?php if (isset($fields['field_image']->content)) print $fields['field_image']->content; ?></div>
  <div class="details">
    <div class="header"><h2><?php print $fields['title']->content; ?></h2></div>
    <div class="date"><?php print $fields['created']->content; ?>, <a href="<?php print url('node/'.$fields['nid']->content, array('fragment' => 'comment-form')) ?>"><?php print $fields['comment_count']->content; ?></a> </div>
    <div class="excerpt"><?php print $fields['body']->content; ?></div>
  </div>
</div>
<?php if (isset($fields['views_collapsing']->content)) Elim_slide_img($fields['views_collapsing']->content); ?>