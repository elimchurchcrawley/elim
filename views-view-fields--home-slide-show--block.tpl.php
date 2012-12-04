<div class="panel">
  <div class="slider_image"><?php if (isset($fields['field_image']->content)) print $fields['field_image']->content; ?></div>
  <div class="details">
    <?php 
    if (isset($fields['field_featured']->content) and $fields['field_featured']->content) {
      print '<div class="cats"><span>featured</span></div>';
    } elseif ($fields['timestamp']->content) {
      print '<div class="cats"><span>'.$fields['timestamp']->content.'</span></div>';
    } else {
      print '<div><span>&nbsp;</span></div>';
    }
    ?>
    <div class="header"><h2><?php print $fields['title']->content; ?></h2></div>
    <div class="date"><?php print $fields['created']->content; ?>, <a href="<?php print url('node/'.$fields['nid']->content, array('fragment' => 'comment-form')) ?>"><?php print $fields['comment_count']->content; ?></a> </div>
    <div class="excerpt"><?php print $fields['body']->content; ?></div>
  </div>
</div>
<?php if (isset($fields['field_image_1']->content)) ElimR_slide_img($fields['field_image_1']->content); ?>