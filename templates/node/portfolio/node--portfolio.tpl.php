<?php
global $base_url;
$single_image = 'http://placehold.it/262x148';
if (!empty($node->field_single_image['und'])) {
    $single_image = file_create_url($node->field_single_image['und'][0]['uri']);
    $image_rs =  file_create_url(image_style_url('image_500x335',$node->field_single_image['und'][0]['uri']));
}
$link = drupal_get_path_alias('user/' . $node->uid);


 //Images Slider
  $image_slide = "";
  if ($itemsImage = field_get_items('node', $node, 'field_portfolio_multimedia')) {
    if (count($itemsImage) == 1) {
		$image_slide = 'false';
    }
    elseif (count($itemsImage) > 1) {
		$image_slide = 'true';
    }
  }
  $img_count = 0;
  $counterImage = count($itemsImage);
global $base_path;

?>

<?php if(!$page):?>
    <div class="media-item animate-onscroll gallery-media">
            <div class="media-image gallery-media">
                <img src="<?php print $image_rs;?>" alt="">
                <div class="media-hover">
                    <div class="media-icons">
                        <?php if(isset($node->field_video['und'])):?>
                            <?php
                            $html = $node->field_video['und'][0]['value'];
                            $array = explode('/', $html);
                            $count = count($array);
                            $id = str_replace(' ',' ', $array[$count -2]);
                            $current_id = explode('"',$id);

                            if (strpos($html, "youtube" ) !== false) {
                                $thumbnail = 'http://img.youtube.com/vi/'.$current_id[0].'';
                            } else {
                                $thumbnail = "http://res.cloudinary.com/demo/image/vimeo/".$current_id[0]."";
                            }
                            if (strpos($html, "youtube" ) !== false) {
                                $href_uri = 'https://www.youtube.com/watch?v='.$current_id[0].'';
                            } else {
                                $href_uri = "https://vimeo.com/".$current_id[0]."";
                            }
                            ?>
                            <a href="<?php print $href_uri?>" data-group="media-jackbox" data-thumbnail="<?php print $thumbnail;?>" class="jackbox media-icon"><i class="icons icon-play"></i></a>
                        <?php else:?>
                            <a href="<?php print $single_image;?>" data-group="media-jackbox" data-thumbnail="<?php print $single_image;?>" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
                        <?php endif;?>
                        <a href="<?php print $node_url;?>" class="media-icon"><i class="icons icon-link"></i></a>
                    </div>
                </div>
            </div>

            <h4 class="related-title"><a href="<?php print $node_url;?>"><?php print $title;?></a></h4>
        </div>
<?php else:?>
    <?php if(isset($node->field_layout_mode['und']) && $node->field_layout_mode['und'][0]['value'] == 'extended'):?>
        <?php if(isset($node->field_video['und'])):?>
        <section class="gray-bg section full-width padding-0">
            <div class="portfolio-video">
                <?php print $node ->field_video['und'][0]['value']; ?>
            </div>
        <?php elseif($image_slide != ' '):?>
        <section class="section portfolio-slideshow-section full-width">
            <div class="portfolio-slideshow flexslider">
                <ul class="slides">
                    <?php while ($img_count < $counterImage) { ?>
                        <li><img src="<?php echo file_create_url(image_style_url('image_1941x674',$node->field_portfolio_multimedia ['und'][$img_count]['uri'])); ?>" alt=""></li>
                    <?php $img_count++; } ?>
                </ul>

            </div>

        <?php elseif(isset($node->field_audio['und'])):?>
            <?php print $node ->field_audio['und'][0]['value']; ?>
        <?php else: ?>
        <section class="section portfolio-slideshow-section full-width">
            <img src="<?php print  $single_image; ?>" alt="">
        <?php endif;?>
        </section>
        <section class="section full-width-bg gray-bg">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="portfolio-single">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <h6><?php print $title; ?></h6>
                                <table class="project-details">
                                    <tr>
                                        <td><?php print t('Date')?>:</td>
                                        <td><?php print format_date($node->created,'custom','F d, Y');?></td>
                                    </tr>
                                    <?php if(isset($node->field_portfolio_category['und'])):?>
                                        <tr>
                                            <td><?php print t('Category')?>:</td>
                                            <td class="categories"><?php print candidate_format_comma_field('field_portfolio_category', $node); ?></td>
                                        </tr>
                                    <?php endif;?>

                                    <tr>
                                        <td><?php print t('Author')?>:</td>
                                        <td><a href="<?php print $base_path.$link; ?>"><?php print $node ->name; ?></a></td>
                                    </tr>
                                    <?php if(isset($node->field_skills['und'])):?>
                                        <tr>
                                            <td>Skills:</td>
                                            <td class="categories"><?php print candidate_format_comma_field('field_skills', $node); ?></td>
                                        </tr>
                                    <?php endif;?>

                                    <tr>
                                        <td> <?php print t('Comments');?>:</td>
                                        <td><a href="<?php print $node_url;?>"><?php print $comment_count;?></a></td>
                                    </tr>
                                    <?php if(isset($node->field_portfolio_tags['und'])):?>
                                        <tr>
                                            <td><?php print t('Tags:');?></td>
                                            <td class="categories tag"><?php print candidate_format_comma_field('field_portfolio_tags', $node); ?></td>
                                        </tr>
                                    <?php endif;?>

                                    <tr>
                                        <td><?php print t('Project URL')?>:</td>
                                        <td><a href="<?php print $node_url;?>" class="button transparent button-arrow"><?php print t('View Project')?></a></td>
                                    </tr>

                                    <tr>
                                        <td><?php print t('Share this')?>:</td>
                                        <td>
                                            <ul class="social-share">
                                                <li class="facebook"><a href="#" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                                                <li class="twitter"><a href="#" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                                                <li class="google"><a href="#" class="tooltip-ontop" title="Google Plus"><i class="icons icon-gplus"></i></a></li>
                                                <li class="pinterest"><a href="#" class="tooltip-ontop" title="Pinterest"><i class="icons icon-pinterest-3"></i></a></li>
                                                <li class="email"><a href="#" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <h6><?php print t('Description')?></h6>

                               <?php if(isset($content['body'])): print render($content['body']); endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="row portfolio-pagination">

                        <div class="col-lg-4 col-md-4 col-sm-4 align-left animate-onscroll">
                            <?php if(isset($content['flippy_pager']['#list']['prev']) && $content['flippy_pager']['#list']['prev'] != False):?>
                                <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['prev']['nid']);?>" class="button big button-arrow-before">Prev project</a>
                            <?php endif;?>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 align-center animate-onscroll">
                            <a href="<?php print $base_url.'/sortable-1column-sidebar';?>" class="button big"><?php print t('All projects')?></a>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-4 align-right animate-onscroll">
                            <?php if(isset($content['flippy_pager']['#list']['next']) && $content['flippy_pager']['#list']['next'] != False):?>

                                <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['next']['nid']);?>" class="button big button-arrow">Next project</a>
                            <?php endif;?>
                        </div>

                    </div>
                    <!--Related portfolio-->
                    <?php print views_embed_view('block_portfolio','block_1',$node->nid);?>
                    <!--end Related-->

                </div>
            </div>
        </section>
    <?php else:?>
        <div class="portfolio-single">
                        <?php if(isset($node->field_video['und'])):?>
                            <div class="portfolio-video">
                                <?php print $node ->field_video['und'][0]['value']; ?>
                            </div>
                        <?php elseif($image_slide != ''):?>
                            <div class="portfolio-slideshow flexslider">
                                <ul class="slides">
                                    <?php while ($img_count < $counterImage) { ?>
                                        <li><img src="<?php echo file_create_url($node->field_portfolio_multimedia ['und'][$img_count]['uri']); ?>" alt=""></li>
                                    <?php $img_count++; } ?>
                                </ul>

                            </div>

                        <?php elseif(isset($node->field_audio['und'])):?>
                            <?php print $node ->field_audio['und'][0]['value']; ?>
                        <?php else: ?>
                            <img src="<?php print  $single_image; ?>" alt="">
                        <?php endif;?>
                        <div class="row">
                        <?php if(isset($node->field_layout_mode['und']) && $node->field_layout_mode['und'][0]['value'] == 'fullwidth'): ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
                            <?php else:?>
                            <div class="col-lg-5 col-md-5 col-sm-12 animate-onscroll">
                            <?php endif?>
                                <h6><?php print $title; ?></h6>

                                <table class="project-details">

                                    <tr>
                                        <td><?php print t('Date')?>:</td>
                                        <td><?php print format_date($node->created,'custom','F d, Y');?></td>
                                    </tr>
                                    <?php if(isset($node->field_portfolio_category['und'])):?>
                                        <tr>
                                            <td><?php print t('Category')?>:</td>
                                            <td class="categories"><?php print candidate_format_comma_field('field_portfolio_category', $node); ?></td>
                                        </tr>
                                    <?php endif;?>

                                    <tr>
                                        <td><?php print t('Author')?>:</td>
                                        <td><a href="<?php print $base_path.$link; ?>"><?php print $node ->name; ?></a></td>
                                    </tr>
                                    <?php if(isset($node->field_skills['und'])):?>
                                        <tr>
                                            <td><?php print t('Skills:');?></td>
                                            <td class="categories"><?php print candidate_format_comma_field('field_skills', $node); ?></td>
                                        </tr>
                                    <?php endif;?>

                                    <tr>
                                        <td> <?php print t('Comments');?>:</td>
                                        <td><a href="<?php print $node_url;?>"><?php print $comment_count;?></a></td>
                                    </tr>
                                    <?php if(isset($node->field_portfolio_tags['und'])):?>
                                        <tr>
                                            <td>Tags:</td>
                                            <td class="categories tag"><?php print candidate_format_comma_field('field_portfolio_tags', $node); ?></td>
                                        </tr>
                                    <?php endif;?>

                                    <tr>
                                        <td><?php print t('Project URL')?>:</td>
                                        <td><a href="<?php print $node_url;?>" class="button transparent button-arrow"><?php print t('View Project')?></a></td>
                                    </tr>

                                    <tr>
                                        <td><?php print t('Share this')?>:</td>
                                        <td>
                                            <ul class="social-share">
                                                <li class="facebook"><a href="#" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                                                <li class="twitter"><a href="#" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                                                <li class="google"><a href="#" class="tooltip-ontop" title="Google Plus"><i class="icons icon-gplus"></i></a></li>
                                                <li class="pinterest"><a href="#" class="tooltip-ontop" title="Pinterest"><i class="icons icon-pinterest-3"></i></a></li>
                                                <li class="email"><a href="#" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <?php if(isset($node->field_layout_mode['und']) && $node->field_layout_mode['und'][0]['value'] == 'fullwidth'): ?>
                            <div class="col-lg-8 col-md-8 col-sm-6 animate-onscroll">
                            <?php else:?>
                            <div class="col-lg-7 col-md-7 col-sm-12 animate-onscroll">
                            <?php endif?>
                                <h6><?php print t('Description')?></h6>

                               <?php if(isset($content['body'])): print render($content['body']); endif;?>

                            </div>
                        </div>
        </div>
        <div class="row portfolio-pagination">
            <div class="col-lg-4 col-md-4 col-sm-4 align-left animate-onscroll">
                <?php if(isset($content['flippy_pager']['#list']['prev']) && $content['flippy_pager']['#list']['prev'] != False):?>
                    <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['prev']['nid']);?>" class="button big button-arrow-before">Prev project</a>
                <?php endif;?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 align-center animate-onscroll">
                <a href="<?php print $base_url.'/sortable-1column-sidebar';?>" class="button big"><?php print t('All projects')?></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 align-right animate-onscroll">
                <?php if(isset($content['flippy_pager']['#list']['next']) && $content['flippy_pager']['#list']['next'] != False):?>
                    <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['next']['nid']);?>" class="button big button-arrow">Next project</a>
                <?php endif;?>
            </div>
        </div>
        <!--Related Portfolio-->
                            <?php if(isset($node->field_layout_mode['und']) && $node->field_layout_mode['und'][0]['value'] == 'sidebar'):?>
                                <?php print views_embed_view('block_portfolio','block_2',$node->nid);?>
                            <?php elseif(isset($node->field_layout_mode['und']) && $node->field_layout_mode['und'][0]['value'] == 'fullwidth'):?>
                                <?php print views_embed_view('block_portfolio','block_1',$node->nid);?>
                            <?php else:?>
                                <?php print views_embed_view('block_portfolio','block',$node->nid);?>
                            <?php endif;?>
            <?php endif;?>
<?php endif;?>





