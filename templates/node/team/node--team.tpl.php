<?php
$single_image = 'http://placehold.it/570x480';
if (!empty($node->field_single_image['und'])) {
    $single_image = image_style_url("image_570x480",$node->field_single_image['und'][0]['uri']);
}
$single_image_two = ' ';
if (!empty($node->field_single_image['und'])) {
    $single_image_two = file_create_url($node->field_single_image['und'][0]['uri']);
}
?>
<?php if(!$page):?>
    <div class="team-member animate-onscroll ">
            <img class="team-member-image" src="<?php print $single_image_two;?>" alt="">
            <div class="team-member-info">
               <h2><?php print $title;?></h2>
            <?php if(isset($content['field_job'])):?>
                <span class="job"><?php print strip_tags(render($content['field_job']));?></span>
            <?php endif;?>
                <div class="team-member-more">
                    <?php if(isset($content['body'])): print render($content['body']); endif;?>
                    <div class="social-media">
                        <ul class="social-icons">
                        <?php if(isset($content['field_facebook_url'])):?>
                            <li class="facebook"><a href="<?php print $content['field_facebook_url']['#items'][0]['value'];?>" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_twitter_url'])): ?>
                            <li class="twitter"><a href="<?php print $content['field_twitter_url']['#items'][0]['value'];?>" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_google_plus_url'])):?>
                            <li class="google"><a href="<?php print $content['field_google_plus_url']['#items'][0]['value'];?>" class="tooltip-ontop" title="Google Plus"><i class="icons icon-gplus"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_youtube'])):?>
                            <li class="youtube"><a href="<?php print $content['field_youtube']['#items'][0]['value'];?>" class="tooltip-ontop" title="Youtube"><i class="icons icon-youtube-1"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_flickr'])):?>
                            <li class="flickr"><a href="<?php print $content['field_flickr']['#items'][0]['value'];?>" class="tooltip-ontop" title="Flickr"><i class="icons icon-flickr-4"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_email'])):?>
                            <li class="email"><a href="<?php print $content['field_email']['#items'][0]['value'];?>" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
                        <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php else:?>
    <h3 class="animate-onscroll no-margin-top"><?php print t('Meet our team');?></h3>
    <div class="team-member animate-onscroll big">
        <img width="570" height="480" class="team-member-image" src="<?php print $single_image;?>" alt="">
        <div class="team-member-info">
            <h2><?php print $title;?></h2>
            <?php if(isset($content['field_job'])):?>
                <span class="job"><?php print strip_tags(render($content['field_job']));?></span>
            <?php endif;?>
            <div class="team-member-more">
                <?php if(isset($content['body'])): print render($content['body']); endif;?>
                <div class="social-media">
                    <span class="small-caption"><?php print t('Get connected:');?></span>
                    <ul class="social-icons">
                        <?php if(isset($content['field_facebook_url'])):?>
                            <li class="facebook"><a href="<?php print $content['field_facebook_url']['#items'][0]['value'];?>" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_twitter_url'])): ?>
                            <li class="twitter"><a href="<?php print $content['field_twitter_url']['#items'][0]['value'];?>" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_google_plus_url'])):?>
                            <li class="google"><a href="<?php print $content['field_google_plus_url']['#items'][0]['value'];?>" class="tooltip-ontop" title="Google Plus"><i class="icons icon-gplus"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_youtube'])):?>
                            <li class="youtube"><a href="<?php print $content['field_youtube']['#items'][0]['value'];?>" class="tooltip-ontop" title="Youtube"><i class="icons icon-youtube-1"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_flickr'])):?>
                            <li class="flickr"><a href="<?php print $content['field_flickr']['#items'][0]['value'];?>" class="tooltip-ontop" title="Flickr"><i class="icons icon-flickr-4"></i></a></li>
                        <?php endif;?>
                        <?php if(isset($content['field_email'])):?>
                            <li class="email"><a href="<?php print $content['field_email']['#items'][0]['value'];?>" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php print views_embed_view('podcast',"page_2",$node->title); ?>
<?php endif;?>
