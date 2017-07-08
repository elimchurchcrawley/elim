<?php
global $base_url;
$single_image = 'http://placehold.it/262x148';
if (!empty($node->field_single_image['und'])) {
    $single_image = file_create_url($node->field_single_image['und'][0]['uri']); 
}
$link = drupal_get_path_alias('user/' . $node->uid);
 //Images Slider
  $image_slide = "";
  if ($itemsImage = field_get_items('node', $node, 'field_blog_multimedia')) {
    if (count($itemsImage) == 1) {
		$image_slide = 'false';
    }
    elseif (count($itemsImage) > 1) {
		$image_slide = 'true';
    }
  }
  $img_count = 0;
  $counterImage = count($itemsImage);
$data = arg(0);
global $base_path;
?>
<?php if(!$page):?>
        <div class="post-image">
            <?php if(isset($node->field_video['und'])):?>
                <?php print $node ->field_video['und'][0]['value']; ?>
            <?php elseif($image_slide != ''):?>
                <div class="portfolio-slideshow flexslider animate-onscroll">
                    <ul class="slides">
                        <?php while ($img_count < $counterImage) { ?>
                            <li><img src="<?php echo file_create_url($node->field_blog_multimedia['und'][$img_count]['uri']); ?>" alt=""></li>
                            <?php $img_count++; } ?>
                    </ul>

                </div>

            <?php elseif(isset($node->field_audio['und'])):?>
                <?php print $node ->field_audio['und'][0]['value']; ?>
            <?php else: ?>
                <img src="<?php print $single_image; ?>" alt="">
                <div class="media-hover">
                    <div class="media-icons">
                        <a href="<?php print  $single_image; ?>" data-group="media-jackbox" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
                        <a href="<?php print $node_url;?>" class="media-icon"><i class="icons icon-link"></i></a>
                    </div>
                </div>
            <?php endif;?>
        </div>
        <div class="post-content">
            <?php if($data == 'blog-v1' || $data == 'blog-fullwidth'):?>
            <div class="post-side-meta">
                <div class="date">
                    <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="month"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </div>
                <a href="<?php print $node_url;?>">
                    <div class="post-format">
                        <?php if(isset($node->field_video['und'])):?>
                            <i class="icons icon-video"></i>
                        <?php elseif($image_slide != ''):?>
                            <i class="icons icon-picture"></i>
                        <?php elseif(isset($node->field_audio['und'])): ?>
                            <i class="icons icon-music"></i>
                        <?php elseif(isset($node->field_blockquote['und'])): ?>
                            <i class="icons icon-quote-left"></i>
                        <?php elseif(isset($node->field_link['und'])): ?>
                            <i class="icons icon-link"></i>
                        <?php else: ?>
                            <i class="icons icon-doc-text-inv"></i>
                        <?php endif;?>
                    </div>
                </a>
                <div class="post-comments">
                    <a href="<?php print $node_url;?>"><i class="icons icon-chat-empty"></i> <?php print $comment_count; ?></a>
                </div>
            </div>
            <?php endif;?>
            <div class="post-header">
                <h2><a href="<?php print $node_url;?>"><?php print $title;?></a></h2>
                <div class="post-meta">
                    <span><?php print t('by');?> <a href="<?php print $base_path.$link; ?>"><?php print $node ->name; ?></a></span>
                    <?php if($data == 'blog-v1'):?>
                    <span class="categories"><?php print t('in');?> <?php print candidate_format_comma_field('field_blog_category', $node); ?> </span>
                    <?php else:?>
                    <span><?php print format_date($node->created,'custom','F j, Y, g:i a');?></span>
                    <span><a href="<?php print $node_url;?>"><?php print $node->comment_count;?> <?php print t('Comments');?></a></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="post-exceprt">
                <?php if(isset($node->field_blockquote['und'])): ?>
                    <blockquote class="iconic-quote">
                        <?php print $node->field_blockquote['und'][0]['value']; ?>
                    </blockquote>
                <?php else:?>
                    <?php if(isset($content['body'])):?>
                        <?php print render($content['body']);?>
                    <?php endif;?>
                <?php endif;?>
                <a href="<?php print $node_url;?>" class="button read-more-button big button-arrow"><?php print t('Read More');?></a>
            </div>
        </div>
<?php else:?>
	<?php if(isset($node->field_layout_mode['und']) && $node->field_layout_mode['und'][0]['value'] == 'fullwidth'): ?>
                <div class="blog-post-single fullwidth-post">
                    <div class="post-side-meta animate-onscroll">
                        <div class="date">
                            <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                            <span class="month"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                        </div>

                        <div class="post-format">
                            <?php if(isset($node->field_video['und'])):?>
                                <i class="icons icon-video"></i>
                            <?php elseif($image_slide != ''):?>
                                <i class="icons icon-picture"></i>
                            <?php elseif(isset($node->field_audio['und'])): ?>
                                <i class="icons icon-music"></i>
                            <?php elseif(isset($node->field_blockquote['und'])): ?>
                                <i class="icons icon-quote-left"></i>
                            <?php elseif(isset($node->field_link['und'])): ?>
                                <i class="icons icon-link"></i>
                            <?php else: ?>
                                <i class="icons icon-doc-text-inv"></i>
                            <?php endif;?>
                        </div>

                        <div class="post-comments">
                            <a href="<?php print $node_url; ?>/#comments"><i class="icons icon-chat-empty"></i> <?php print $comment_count; ?></a>
                        </div>

                    </div>
                    <?php if(isset($node->field_video['und'])):?>
                        <?php print $node ->field_video['und'][0]['value']; ?>
                    <?php elseif($image_slide != ''):?>
                        <div class="portfolio-slideshow flexslider animate-onscroll">
                            <ul class="slides">
                                <?php while ($img_count < $counterImage) { ?>
                                    <li><img src="<?php echo file_create_url($node->field_blog_multimedia['und'][$img_count]['uri']); ?>" alt=""></li>
                                    <?php $img_count++; } ?>
                            </ul>

                        </div>

                    <?php elseif(isset($node->field_audio['und'])):?>
                        <?php print $node ->field_audio['und'][0]['value']; ?>
                    <?php elseif(isset($node->field_blockquote['und'])): ?>
                        <blockquote class="iconic-quote">
                            <?php print $node ->field_blockquote['und'][0]['value']; ?>
                        </blockquote>
                    <?php elseif(isset($node->field_link['und'])): ?>
                        <blockquote class="iconic-quote link-quote">
                            <?php print $node ->field_link['und'][0]['value']; ?>
                        </blockquote>
                    <?php else: ?>
                        <img src="<?php print  $single_image; ?>" alt="">

                    <?php endif;?>
                    <div class="post-meta animate-onscroll">
                        <span><?php print t('by');?> <a href="<?php print $base_path.$link; ?>"><?php print $node ->name; ?></a></span>
                        <span class="categories"><?php print t('in');?> <?php print candidate_format_comma_field('field_blog_category', $node); ?> </span>
                    </div>
                    <div class="post-content">
                        <?php if(isset($content['body'])): print render($content['body']); endif;?>
                    </div>
                    <div class="post-meta-track animate-onscroll">
                        <table class="project-details">

                            <tbody><tr>
                                <td class="share-media">
                                    <ul class="social-share">
                                        <li><?php print t('Share this:');?></li>
                                        <li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Facebook" target="_blank"><i class="icons icon-facebook"></i></a></li>
                                        <li class="twitter"><a href="https://twitter.com/home?status=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Twitter" target="_blank"><i class="icons icon-twitter"></i></a></li>
                                        <li class="google"><a href="https://plus.google.com/share?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Google Plus" target="_blank"><i class="icons icon-gplus"></i></a></li>
                                        <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Pinterest" target="_blank"><i class="icons icon-pinterest-3"></i></a></li>
                                        <li class="email"><a href="#" class="tooltip-ontop" title="" data-original-title="Email"><i class="icons icon-mail"></i></a></li>
                                    </ul>
                                </td>
                                <td class="tags categories tag">Tags: <?php print candidate_format_comma_field('field_blog_tags', $node); ?></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <div class="row animate-onscroll">
                        <?php if(isset($content['flippy_pager']['#list']['prev']) && $content['flippy_pager']['#list']['prev'] != False):?>
                        <div class="col-lg-6 col-md-6 col-sm-6 button-pagination align-left">
                            <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['prev']['nid']);?>" class="button big previous"><?php print t('Prev post');?></a>
                        </div>
                        <?php endif;?>

                        <?php if(isset($content['flippy_pager']['#list']['next']) && $content['flippy_pager']['#list']['next'] != False):?>
                        <div class="col-lg-6 col-md-6 col-sm-6 button-pagination align-right">
                            <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['next']['nid']);?>" class="button big next"><?php print t('Next post');?></a>
                        </div>
                        <?php endif;?>

                    </div>
                    <?php print views_embed_view('author', 'about_user'); ?>
                </div>
                <div class="related-articles">
                    <?php print views_embed_view('blog','related_4col',$node->nid);?>
                </div>
                <?php if ($comment == COMMENT_NODE_OPEN) : ?>
                    <?php  print render($content['comments']); ?>
                <?php endif;?>
	<?php else:?>
					<div class="blog-post-single">
						<?php if(isset($node->field_video['und'])):?>
							<?php print $node ->field_video['und'][0]['value']; ?>
						<?php elseif($image_slide != ''):?>
							<div class="portfolio-slideshow flexslider animate-onscroll">
								<ul class="slides">
									<?php while ($img_count < $counterImage) { ?>
										<li><img src="<?php echo file_create_url($node->field_blog_multimedia['und'][$img_count]['uri']); ?>" alt=""></li>
									<?php $img_count++; } ?>
								</ul>

							</div>

						<?php elseif(isset($node->field_audio['und'])):?>
							<?php print $node ->field_audio['und'][0]['value']; ?>
                        <?php elseif(isset($node->field_blockquote['und'])): ?>
                            <blockquote class="iconic-quote">
                                <?php print $node ->field_blockquote['und'][0]['value']; ?>
                            </blockquote>
                        <?php elseif(isset($node->field_link['und'])): ?>
                            <blockquote class="iconic-quote link-quote">
                                <?php print $node ->field_link['und'][0]['value']; ?>
                            </blockquote>
						<?php else: ?>
							<img src="<?php print  $single_image; ?>" alt="">
						<?php endif;?>
						<div class="post-meta animate-onscroll">
								<span><?php print t('by');?> <a href="<?php print $base_path.$link; ?>"><?php print $node ->name; ?></a></span>
                                <span><?php print format_date($node->created,'custom','F j, Y, g:i a');?></span>
                                <span><a href="<?php print $node_url;?>"><?php print $comment_count;?> <?php print t('Comments');?></a></span>
                        </div>
						<div class="post-content">
							<?php if(isset($content['body'])): print render($content['body']); endif;?>
						</div>
						<div class="post-meta-track animate-onscroll">
								<table class="project-details">

									<tbody>
                                    <tr>
										<td class="share-media">
											<ul class="social-share">
												<li><?php print t('Share this:');?></li>
												<li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Facebook" target="_blank"><i class="icons icon-facebook"></i></a></li>
												<li class="twitter"><a href="https://twitter.com/home?status=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Twitter" target="_blank"><i class="icons icon-twitter"></i></a></li>
												<li class="google"><a href="https://plus.google.com/share?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Google Plus" target="_blank"><i class="icons icon-gplus"></i></a></li>
												<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fblog-single-fullwidth.html" class="tooltip-ontop" title="" data-original-title="Pinterest" target="_blank"><i class="icons icon-pinterest-3"></i></a></li>
												<li class="email"><a href="#" class="tooltip-ontop" title="" data-original-title="Email"><i class="icons icon-mail"></i></a></li>
											</ul>
										</td>
										<td class="tags categories tag">Tags: <?php print candidate_format_comma_field('field_blog_tags', $node); ?></td>
									</tr>
								</tbody></table>
						</div>
                        <div class="row animate-onscroll">
                            <?php if(isset($content['flippy_pager']['#list']['prev']) && $content['flippy_pager']['#list']['prev'] != False):?>
                                <div class="col-lg-6 col-md-6 col-sm-6 button-pagination align-left">
                                    <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['prev']['nid']);?>" class="button big previous"><?php print t('Prev post');?></a>
                                </div>
                            <?php endif;?>

                            <?php if(isset($content['flippy_pager']['#list']['next']) && $content['flippy_pager']['#list']['next'] != False):?>
                                <div class="col-lg-6 col-md-6 col-sm-6 button-pagination align-right">
                                    <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['next']['nid']);?>" class="button big next"><?php print t('Next post');?></a>
                                </div>
                            <?php endif;?>

                        </div>
                        <?php print views_embed_view('author', 'about_user'); ?>
					</div>
                    <div class="related-articles">
                        <?php print views_embed_view('blog','block_1',$node->nid);?>
                    </div>
                    <?php if ($comment == COMMENT_NODE_OPEN) : ?>
                        <?php  print render($content['comments']); ?>
                    <?php endif; ?>
	<?php endif;?>
<?php endif;?>
