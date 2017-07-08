<?php
global $base_url;
$single_image = ' ';
$multimedia = array();

if(!empty($node->field_product_multimedia['und'])){
    $multimedia = $node->field_product_multimedia['und'];
    $single_image = $node->field_product_multimedia['und'][0]['uri'];
}
$price = '';
if (isset($content['product:commerce_price'])){
    if($price = $content['product:commerce_price']['#items'][0] > 0){
        $price = $content['product:commerce_price']['#items'][0];
        $price_display = commerce_currency_format($price['amount'], $price['currency_code']);
    }

}
$regular_price = '';
if(isset($content['product:field_regular_price']['#items'])){
    $regular_price = $content['product:field_regular_price']['#items'][0]['amount'];
    if($regular_price > 0){
        $value_regular_price = $content['product:field_regular_price']['#items'][0];
        $regular_price_display = commerce_currency_format($value_regular_price['amount'], $value_regular_price['currency_code']);
    }
}
$product_attributes = '';
if(!empty($node->field_product_attributes)){
    $product_attributes = $node->field_product_attributes;
    $product_attributes_display = $product_attributes['und'][0]['value'];
}
$product = '';
if (isset($node->field_product_selection['und'])) {
$product = commerce_product_load($node->field_product_selection['und'][0]['product_id']);
$id = $product->product_id;
    if(!empty($product->commerce_stock['und'])){
        $stock = $product->commerce_stock['und'][0]['value'];
    }
}
$count = count($multimedia);
?>
<?php if(!$page):?>
    <div class="shop-item animate-onscroll">
            <div class="shop-image">
                <a href="<?php print $node_url;?>">
                    <?php if(isset($content['product:field_regular_price'])):?>
                        <?php if($regular_price > 0):?>
                            <div class="shop-ribbon-sale"></div>
                        <?php endif;?>
                    <?php endif;?>
                    <?php if(!empty($node->field_product_multimedia['und'])):?>
                    <?php if($count > 1):?>
                        <div class="shop-featured-image">
                            <img src="<?php print file_create_url($multimedia[0]['uri']);?>" alt="">
                        </div>
                        <div class="shop-hover">
                            <img src="<?php print file_create_url($multimedia[1]['uri']);?>" alt="">
                        </div>
                    <?php else:?>
                        <div class="shop-featured-image">
                            <img src="<?php print file_create_url($multimedia[0]['uri']);?>" alt="">
                        </div>
                    <?php endif;?>
                    <?php endif;?>
                    <?php if(isset($stock) && $stock == 0):?>
                        <div class="shop-ribbon-stock"></div>
                    <?php else:?>
                        <?php if(isset($product_attributes_display) && $product_attributes_display == 'new'):?>
                            <div class="shop-ribbon-new"></div>
                        <?php endif;?>
                    <?php endif;?>

                </a>
            </div>
            <div class="shop-content c-product">

                <h4><a href="<?php print $node_url;?>"><?php print $title;?></a></h4>

                <div class="price animate-onscroll"><?php if(isset($regular_price) && $regular_price > 0):?><del><?php print render($content['product:field_regular_price']);?></del>&nbsp;<?php endif;?>
                <?php if(isset($content['product:commerce_price'])): print render($content['product:commerce_price']); endif;?></div>
                <div class="c-rating read-only" data-score="0">
                    <?php if(isset($content['field_rating'])): print render($content['field_rating']); endif;?>
                </div>
                <?php if(isset($content['field_product_selection'])): print render($content['field_product_selection']); endif;?>
                <a href="<?php print $node_url;?>" class="button details-button button-arrow transparent"><?php print t('Details');?></a>
            </div>
        </div>
<?php else:?>
    <div class="shop-single">
        <!-- Product Gallery -->
        <div class="shop-product-gallery animate-onscroll">
            <div class="main-image">
                <?php if(isset($content['product:field_regular_price'])):?>
                    <?php if($regular_price > 0):?>
                        <div class="shop-ribbon-sale"></div>
                    <?php endif;?>
                <?php endif;?>
                <img class="cloud-zoom-image" src="<?php print file_create_url($single_image);?>" alt="">
                <?php if(isset($product_attributes_display) && $product_attributes_display == 'new'):?>
                <div class="shop-ribbon-new"></div>
                <?php endif;?>

                <div class="fullscreen-icon">
                    <i class="icons icon-resize-full"></i>
                </div>
            </div>
            <ul class="slider-navigation">
                <?php foreach($multimedia as $key => $value):?>
                    <li>
                        <a href="<?php print file_create_url($value['uri']);?>" class="jackbox" data-group="shop-product-gallery">
                            <img src="<?php print file_create_url($value['uri']);?>" alt="">
                        </a>
                    </li>
                <?php endforeach?>
            </ul>
        </div>
        <!-- /Product Gallery -->
        <!-- Shop Product Content -->
        <div class="shop-product-content">
            <h2 class="animate-onscroll"><?php print $title;?></h2>
            <div class="custom-rating read-only animate-onscroll">
                <?php if(isset($content['field_rating'])):?><?php print render($content['field_rating']);?>
                    <a class="c-review" href="#tab1">(<?php print $node->field_rating['und'][0]['count'];?>) <?php print t('Reviews');?></a>
                <?php endif;?>
            </div>
            <div class="price animate-onscroll"><?php if(isset($regular_price) && $regular_price > 0):?><del><?php print render($content['product:field_regular_price']);?></del>&nbsp;<?php endif;?>
                <?php if(isset($content['product:commerce_price'])): print render($content['product:commerce_price']); endif;?></div>
            <?php if(isset($content['body']) && !empty($content['body']['#items'][0]['summary'])): print $content['body']['#items'][0]['summary']; endif;?>
            <?php if(isset($content['field_product_selection'])): print render($content['field_product_selection']); endif;?>

            <p class="animate-onscroll"><?php print t('Categories:');?> <?php print candidate_format_comma_field('field_product_category', $node); ?></p>

            <ul class="social-share animate-onscroll">
                <li><?php print t('Share this:');?></li>
                <li class="facebook"><a href="#" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                <li class="twitter"><a href="#" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                <li class="google"><a href="#" class="tooltip-ontop" title="Google Plus"><i class="icons icon-gplus"></i></a></li>
                <li class="pinterest"><a href="#" class="tooltip-ontop" title="Pinterest"><i class="icons icon-pinterest-3"></i></a></li>
                <li class="email"><a href="#" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
            </ul>

        </div>
        <!-- /Shop Product Content -->

    </div>
    <div class="tabs style2 product-single-tabs animate-onscroll">

        <div class="tab-header">
            <ul>
                <li><a href="#tab1"><h6><?php print t('Description');?></h6></a></li>
                <li><a href="#tab2"><h6><?php print t('Reviews');?></h6></a></li>
            </ul>
        </div>

        <div class="tab-content">

            <div id="tab1" class="tab">
                <?php if(isset($content['body']) && !empty($content['body']['#items'][0]['value'])): print $content['body']['#items'][0]['value']; endif;?>
            </div>

            <div id="tab2" class="tab">
                <?php if ($comment == COMMENT_NODE_OPEN) : ?>
                    <?php  print render($content['comments']); ?>
                <?php endif;?>
            </div>

        </div>
    </div>
    <div class="row related-products">
        <?php print views_embed_view('product_block','block',$node->nid);?>
    </div>

<?php endif;?>

