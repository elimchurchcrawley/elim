<?php
/**
 * @file
 * Zen theme's implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation. $language->dir
 *   contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $jump_link_target: The HTML ID of the element that the "Jump to Navigation"
 *   link should jump to. Defaults to "main-menu".
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can contain one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a Blog entry, this would be "node-type-blog".
 *     Note that the machine name of the content type will often be in a short
 *     form of the human readable label.
 *   The following only apply with the default sidebar_first and sidebar_second
 *   block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see zen_preprocess_html()
 * @see template_process()
 */
$data_uri = arg(0);
$page_boxed_layout = theme_get_setting('page_boxed_layout');
$display_page_boxed_layout = explode(',',$page_boxed_layout);
$page_wide_layout = theme_get_setting('page_wide_layout');
$display_page_wide_layout = explode(',',$page_wide_layout);
$safari = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? true : false;
$chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;
$layout_option = theme_get_setting('layout_option');
$b_checkbox = theme_get_setting('b_checkbox');
$animation = theme_get_setting('animation');
$color_option = theme_get_setting('color_option');
$code_color = theme_get_setting('multi_color');
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9" lang="<?php print $language->language; ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php print $language->language; ?>"><!--<![endif]-->
<head>
    <?php print $head; ?>
    <?php
    global $theme_root;
    global $base_url;
    ?>
    <title><?php print $head_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <!--[if IE 9]>
    <link rel="stylesheet" href="<?php echo $theme_root; ?>/css/ie9.css">
    <![endif]-->
    <?php print $styles; ?>
    <?php ?>
    <?php if($color_option != 'custom'):?>
    <link rel="stylesheet" href="<?php echo $theme_root; ?>/css/color/<?php print $color_option;?>.css">
    <?php else:?>
        <style>
        a,.blue,a:hover,.banner-rotator-content h5,.issue-block:hover .issue-content h4,
        .event-item:hover h6 a,.filter-dropdown>li>span{
            color:<?php print $code_color;?>;
        }
        #newsletter,.newsletter-form input[type="submit"],#navigation li:hover,
        #navigation li:hover>span,
        #navigation li:hover>a,
        #navigation>li.current-menu-item,
        #navigation>li.current-menu-item>span,
        #navigation>li.current-menu-item>a,.banner-rotator-content a.button:hover,.event-calendar td:hover{
            background:<?php print $code_color;?>;
        }
        .upcoming-events>li:hover .date>span,.banner-rotator-content,.newsletter-form .newsletter-submit .icons,.owl-header .carousel-arrows span:hover,
        .issue-icon,.event-item:hover .date>span
        {
            background: <?php print $code_color;?>;
            color: #fff;
        }
        .newsletter-form .newsletter-submit .icons,#navigation>li:hover>a,
        #navigation>li:hover>span,
        #navigation>li.current-menu-item>a,
        #navigation>li.current-menu-item>span{
            border-top:1px solid <?php print $code_color;?>;
            border-bottom:1px solid <?php print $code_color;?>;
        }
        .newsletter-form .newsletter-submit:hover .icons,
        .newsletter-form .newsletter-submit:hover input{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
        }
        .owl-header .carousel-arrows span:hover,.banner-rotator-content a.button,.banner-rotator-content a.button:hover{
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
        }
        .issue-block:hover .issue-icon{
            color:<?php print $code_color;?>;
            background:#fff;
        }
        .issue-block:hover a.button{
            color:#fff;
            background:<?php print $code_color;?>;
            border-top-color:transparent;
        }
        .event-calendar td:hover .events li{
            border-color:<?php print $code_color;?>;
        }
        .filter-dropdown>li>span:hover,
        .filter-dropdown.opened>li>span{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
        }

        .filter-dropdown ul li:hover,
        .filter-dropdown ul li.active-filter{
            color:<?php print $code_color;?>;
        }

        .filter-select + div.chosen-with-drop .chosen-single{
            background:<?php print $code_color;?>;
            color:#fff;
        }

        .filter-select + div .chosen-results>li.result-selected,
        .filter-select + div .chosen-results>li:hover{
            color:<?php print $code_color;?>;
            background:none;
        }

        .active-sort>button{
            background:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            border-top-color:#80bef0;
            color:#fff;
        }
        .media-item:hover .media-format>div{
            background:<?php print $code_color;?>;
            color:#fff;
        }
        .media-format>div{
            background:#e2eaf2;
            color:<?php print $code_color;?>;
        }
        .media-caption h2{
            color:<?php print $code_color;?>;
        }
        .col-lg-3 .media-button a.button,
        .col-lg-9 .col-lg-4 .media-button a.button{
            color:<?php print $code_color;?>;
        }
        .col-lg-3 .media-button a.button:hover,
        .col-lg-9 .col-lg-4 .media-button a.button:hover{
            background:none;
            color:<?php print $code_color;?>;
        }

        .col-lg-3 .media-button a.button:hover:after,
        .col-lg-9 .col-lg-4 .media-button a.button:hover:after{
            color:<?php print $code_color;?>;
        }

        .media-caption span.tags{
            color:<?php print $code_color;?>;
            font-size:13px;
        }
        .post-side-meta .post-format{
            background:#e2eaf2;
            color:<?php print $code_color;?>;}
        .post-side-meta .post-format:hover{
            background:<?php print $code_color;?>;
            color:#fff;
        }
        .post-side-meta .post-comments{
            background:#fafbfd;
            color:<?php print $code_color;?>;
        }
        .shopping-cart:hover .cart-button{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            color:#fff;
        }
        .shopping-cart-content{
            background:#fafbfd;
            border:3px solid <?php print $code_color;?>;}
        .shop-product-gallery .fullscreen-icon:hover{
            background:<?php print $code_color;?>;
        }
        .shop-product-content h2{
            color:<?php print $code_color;?>;
        }
        .sidebar-box a.button.transparent:hover:after{
            color:<?php print $code_color;?>;
        }
        .banner h4{
            color:<?php print $code_color;?>;}
        .banner:hover{
            background:<?php print $code_color;?>;}
        .banner:hover .icons{
            color:#9ccbf8;
        }

        .banner:hover .icons.icons-fadeout{
            color:#9ccbf8;}
        .image-banner a{
            background:<?php print $code_color;?>;
            color:#fff;
            border-bottom:1px solid <?php print $code_color;?>;
        }
        .image-banner:hover a{
            background:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
        }
        .image-banner:hover img{
            border-bottom-color:<?php print $code_color;?>;}
        .image-banner img{
            border-bottom:1px solid #80bff0;
        }
        a.tag{
            color:<?php print $code_color;?>;
        }
        a.tag:hover{
            background:<?php print $code_color;?>;
            color:#fff;
        }
        .category-box a{
            color:<?php print $code_color;?>;
        }
        .category-box a:hover{
            background:#fff;
            color:<?php print $code_color;?>;
        }

        .category-box a:hover:before{
            color:<?php print $code_color;?>;
        }

        .responsive-calendar .day.calendar-event a{
            color:<?php print $code_color;?>;
        }

        .menu li a:hover,
        .menu li a:hover:before{
            color:<?php print $code_color;?>;
        }
        #button-to-top:hover{
            background:<?php print $code_color;?>;
            color:#fff;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
        }
        .customize-box{
            background:<?php print $code_color;?>;
        }
        .customize-box-button{
            background:<?php print $code_color;?>;
        }
        .customize-box.opened .customize-box-button,
        .customize-box-button:hover{
            background:<?php print $code_color;?>;
            border-top:1px solid <?php print $code_color;?>;
            border-bottom:1px solid <?php print $code_color;?>;
        }
        .customize-box input[type="radio"] + label{
            background:<?php print $code_color;?>;}

        .customize-box input[type="radio"]:checked + label,
        .customize-box input[type="radio"] + label:hover{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
        }
        .background-image input[type="radio"] + label{
            border:2px solid <?php print $code_color;?>!important;
        }
        .background-image input[type="radio"]:checked + label{
            border:2px solid <?php print $code_color;?>!important;
        }
        ::selection {
            background: <?php print $code_color;?>; /* Safari */
            color:#fff;
        }
        ::-moz-selection {
            background: <?php print $code_color;?>; /* Firefox */
            color:#fff;
        }
        a.button,
        button{	background:#e2eaf2;
            color:<?php print $code_color;?>;
        }
        a.button.transparent,
        button.transparent{
            color:<?php print $code_color;?>;
        }

        a.button.transparent:hover,
        button.transparent:hover{
            color:<?php print $code_color;?>;
        }
        a.button.transparent:hover:after,
        button.transparent:hover:after{
            color:<?php print $code_color;?>;
        }

        a.button:hover,
        button:hover,
        a.button.active-button,
        button.active-button{
            background:<?php print $code_color;?>;
            color:#fff;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            text-decoration:none;
        }
        .tooltip-inner{
            background:<?php print $code_color;?>;}
        .tooltip.top .tooltip-arrow{
            border-top-color:<?php print $code_color;?>;
        }

        .tooltip.left .tooltip-arrow{
            border-left-color:<?php print $code_color;?>;
        }

        .tooltip.bottom .tooltip-arrow{
            border-bottom-color:<?php print $code_color;?>;
        }

        .tooltip.right .tooltip-arrow{
            border-right-color:<?php print $code_color;?>;
        }
        .accordion-header{
            color:<?php print $code_color;?>;}
        .accordion-active .accordion-header,
        .accordion-header:hover{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            color:#fff;
        }
        .tab-header li{
            color:<?php print $code_color;?>;
        }

        .tab-header li.active-tab,
        .tab-header li:hover{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            color:#fff;
        }
        .tab-header li a{
            color:<?php print $code_color;?>;
        }
        blockquote{
            border-left:3px solid <?php print $code_color;?>;
            color:<?php print $code_color;?>;}
        blockquote.link-quote{
            border-left-color:<?php print $code_color;?>;
        }
        input[type="submit"],
        input[type="reset"]{
            color:<?php print $code_color;?>;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover{
            background:<?php print $code_color;?>;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            color:#fff;
            text-decoration:none;
        }
        .increase-button:hover,
        .decrease-button:hover{
            color:#fff;
            background:<?php print $code_color;?>;
            border-color:<?php print $code_color;?>;
        }
        .dropcap.blue{
            color:<?php print $code_color;?>;
        }
        .dropcap.squared.blue{
            color:#fff;
            background:<?php print $code_color;?>;
        }
        .highlight{
            color:#fff;
            background:<?php print $code_color;?>;
        }
        .audio-player{
            background:<?php print $code_color;?>;
            color:#97acc3;
        }
        .audio-play-button{
            border-right:1px solid <?php print $code_color;?>;}
        .audio-progress-wrapper{
            border:1px solid #808ca4;
            background:<?php print $code_color;?>;}
        .audio-buffer-bar{
            background:#416c9e;}
        .audio-progress-bar{
            background:<?php print $code_color;?>;}
        .audio-volume{
            border-left:1px solid <?php print $code_color;?>;}
        .volume-bar{
            border:1px solid #808ca4;
            background:<?php print $code_color;?>;}
        .audio-volume-progress{
            background:<?php print $code_color;?>;}
        .pricing-header{
            color:<?php print $code_color;?>;
        }

        .most-popular .pricing-header{
            background:<?php print $code_color;?>;}
        .most-popular .pricing-header span{
            color:#4377ae;
        }
        .pricing-price,ul.pager li.page-numbers a,.sidebar-box .view-archives li:hover,.sidebar-box .view-archives li:hover a{
            color:<?php print $code_color;?>;
        }
        ul.pager li.page-numbers a:hover{
            background:<?php print $code_color;?>;
            color:#fff;
            border-top-color:<?php print $code_color;?>;
            border-bottom-color:<?php print $code_color;?>;
            text-decoration:none;
        }
        .sidebar-box .view-archives li{color: <?php print $code_color;?>;}
        #navigation > li.active-trail,
        #navigation a.active-trail:after,
        #navigation a.active-trail,
        #navigation > li.active-trail > span,
        #navigation > li.active-trail > a{
            text-decoration:none;
            background:<?php print $code_color;?>;
            color:#fff;
            border-right-color:transparent;
            border-left-color:transparent;
        }
        #navigation > li.active-trail > a{
            border-top: 1px solid <?php print $code_color;?>;
            border-bottom: 1px solid <?php print $code_color;?>;
        }
        ul.tabs_nav > li > a{
            color: <?php print $code_color;?>;
            background: #e2eaf2;
        }
        ul.tabs_nav > li > a:hover{
            background: <?php print $code_color;?>;
            color: #fff;
        }
        .pager .pager-current a{
            background: <?php print $code_color;?>;
            color: #fff;
            border-top-color: <?php print $code_color;?>;
            border-bottom-color: <?php print $code_color;?>;
            text-decoration: none;
        }
        .tags >a:after{content: ', '; color: <?php print $code_color;?>;}
        .view-calendar ul.pager{list-style: none; margin: 0;}
        .view-calendar ul.pager li{padding: 0;}
        .view-calendar ul.pager li a{
            color: <?php print $code_color;?>;
        }
        .view-calendar ul.pager .date-prev a,.view-calendar ul.pager .date-next a{margin: 0;font-weight: normal;font-size: 13px}
        .view-calendar ul.pager li a:hover{
            background: <?php print $code_color;?>;
            color: #fff;
            border-top-color: <?php print $code_color;?>;
            border-bottom-color: <?php print $code_color;?>;
            text-decoration: none;
        }
        .custom-plus:hover{background: <?php print $code_color;?>;color: #fff;border-radius: 0 3px 3px 0;}
        .custom-minus:hover{background: <?php print $code_color;?>;color: #fff;border-radius: 3px 0 0 3px;}

        .line-item-summary-view-cart a:hover,.tabs-link a:hover,.tabs-link ul li.active a{
            background: <?php print $code_color;?>;
            color: #fff;
            border-top-color: <?php print $code_color;?>;
            border-bottom-color: <?php print $code_color;?>;
            text-decoration: none;
        }
        .line-item-summary-view-cart a,.line-item-summary-checkout a,.tabs-link a{
            color:<?php print $code_color;?>;
        }

        .simplenews-subscribe input.form-submit{
            background: <?php print $code_color;?>;
        }
        .simplenews-subscribe input.form-submit:hover{
            background: <?php print $code_color;?>;
        }
        .customer_profile_billing label{display: block;width: 100%}
        .checkout-cancel,.cus-tag a,.view-portfolio .view-filters .views-exposed{padding-top: 0}
        .view-portfolio .view-filters .views-exposed-widget{padding-top: 0}
        .view-portfolio .view-filters .views-exposed-widget:last-child,.view-portfolio .view-filters .views-widget-sort-order{padding-right: 0}
        .view-portfolio .view-filters .views-exposed-widget input{margin-top: 0;padding: 4px 15px;font-size: 14px}
        .view-filters select{
            color: <?php print $code_color;?>;
        }
        .cus-tag a:hover{
            background:<?php print $code_color;?>;
            color:#fff;
        }
        .view-portfolio .views-widget-sort-by select{
            background: <?php print $code_color;?>;
            border-bottom-color: <?php print $code_color;?>;
            border-top-color: #80bef0;
            color: #fff;
        }
        .view-filters select option{background: #fff;color: #333}
        .view-filters select:hover{
            background: <?php print $code_color;?>;
            color: #fff;
            border-top-color: <?php print $code_color;?>;
            border-bottom-color: <?php print $code_color;?>;
            text-decoration: none;
        }
        .related-products input.form-submit,.view-shop-front-page input.form-submit,.view-product-block input.form-submit{
            background: none;
        }
        input[id^='edit-edit-delete']:hover{
            background: #a82512;
        }
        .line-item-summary-checkout a{
            background:#a82512;
            border-top-color:#be2e17;
            border-bottom-color:#911f0f;
            color:#fff;
        }
        #navigation li.donate-button>a{
            color:#fff;
            padding:18px 10px;
            background:transparent;
            font-size:18px;
            border-top:1px solid #be2e17;
            border-bottom:1px solid #911f0f;
        }
        .banner.donate-banner{
            background:#ede1e2;
            padding:20px 18px 20px 20px;
        }
        /*MAIN COLOR*/
        .boxed-layout #main-header>.container{
            background: #274472;
        }
        #main-header{
            background:#274472;
            color:#e2eaf2;
        }
        #main-footer,
        #lower-footer{
            background:#274472;
            color:#e2eaf2;

        }

        #main-header blockquote:before{
            color:#50688c;
        }
        #main-header blockquote:after{
            color:#50688c;
        }
        .block-simplenews{
            background:#324e79;}
        /**/
        @media(max-width:991px){
            #menu-button:hover{
                background:<?php print $code_color;?>;
                border-bottom-color:transparent;
            }
        }
        </style>
    <?php endif;?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <link href="<?php echo $theme_root; ?>/css/jackbox-ie8.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo $theme_root; ?>/css/ie.css">
    <![endif]-->
    <!--[if gt IE 8]>
    <link href="<?php echo $theme_root; ?>/css/jackbox-ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo $theme_root; ?>/css/fontello-ie7.css">
    <![endif]-->
    <!-- Stylesheets -->
    <style type="text/css">
        .no-fouc{display:none;}
        <?php if($safari && !$chrome)
        {print '.media-hover .media-icons {
            top:50%;
        position: absolute;
        left: 50%;
        margin-left: -55px;
    }';}?>
    </style>
    <?php print $scripts; ?>
    <?php if (theme_get_setting('loader') == 1) : ?>
        <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('html').addClass('no-fouc');
                    "use strict";
                    jQuery('html').show();
                    var window_w = jQuery(window).width();
                    var window_h = jQuery(window).height();
                    var window_s = jQuery(window).scrollTop();
                    jQuery("body").queryLoader2({
                        backgroundColor: '#f2f4f9',
                        barColor: '#63b2f5',
                        barHeight: 4,
                        percentage:false,
                        deepSearch:true,
                        minimumTime:1000,
                        onComplete: function(){
                            jQuery('.animate-onscroll').filter(function(index){

                                return this.offsetTop < (window_s + window_h);

                            }).each(function(index, value){

                                var el = jQuery(this);
                                var el_y = jQuery(this).offset().top;

                                if((window_s) > el_y){
                                    jQuery(el).addClass('animated fadeInDown').removeClass('animate-onscroll');
                                    setTimeout(function(){
                                        jQuery(el).css('opacity','1').removeClass('animated fadeInDown');
                                    },2000);
                                }

                            });

                        }
                    });

                });
        </script>
    <?php endif; ?>
    <?php if($animation == 1):?>
        <script type="text/javascript" src="<?php print $theme_root;?>/js/animation.js"></script>
    <?php endif;?>
    <!-- jQuery -->
</head>
<body class="sticky-header-on tablet-sticky-header <?php print $classes; ?> <?php if((theme_get_setting('layout_option') == 'boxed' && !in_array($data_uri, $display_page_wide_layout)) || (theme_get_setting('layout_option') == 'wide' && in_array($data_uri, $display_page_boxed_layout))) { echo 'boxed-layout'; } ?>" <?php print $attributes;?>
      style="<?php if($b_checkbox == '1' && in_array($data_uri,$display_page_boxed_layout)):?>
          <?php if(theme_get_setting('background_type') == 'color') : ?>background:<?php print theme_get_setting('background_color'); ?>
          <?php elseif(theme_get_setting('background_type') == 'image'):?>background-image:url(<?php print $theme_root;?>/img/background/<?php print theme_get_setting('background_image');?>.jpg);
          <?php elseif(theme_get_setting('background_type') == 'upload'):?>background-image:url(<?php print file_create_url(theme_get_setting('upload_image'));?>);
          <?php endif; ?>
      <?php endif;?>">
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Container -->
<div class="container">
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
    <!-- Back To Top -->
    <a href="#" id="button-to-top"><i class="icons icon-up-dir"></i></a>
    <?php
    if (theme_get_setting('switcher') == 1) {
        include_once("includes/template_switcher.inc");
    }
    ?>
</div>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $theme_root; ?>/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo $theme_root; ?>/js/script_ie.js"></script>
<![endif]-->
</body>

</html>

