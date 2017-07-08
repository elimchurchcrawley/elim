<?php

/**
 * @file
 * Implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 * @see bartik_process_maintenance_page()
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!-->
<html class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<?php global $theme_root; ?>
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,300italic,700,700italic,900' rel='stylesheet' type='text/css'>
<link rel='stylesheet' href='<?php echo $theme_root; ?>/css/colors/<?php echo theme_get_setting('skins'); ?>.css' type='text/css' media='all' />
</head>
<body id="maintenance">

<div class="container">
    <div class="mmode text-center">
        <header id="header" class="animate-onscroll">
            <!-- Main Header -->
            <div id="main-header">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div id="logo" class="col-lg-12 col-md-12 col-sm-12">
                            <?php if ($logo): ?>
                                <a href="<?php print $front_page; ?>"><img width="169" height="46" src="<?php print $logo; ?>" alt="<?php print t('Logo'); ?>"></a>
                            <?php else: ?>
                                <h1><?php print $site_name; ?></h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="title">
            <h1><?php print t('We Are Working On <span>Candidate Drupal</span>'); ?></h1>
            <p class="lead"><?php print $content; ?></p>
        </div>

        <div id="countdown">
            <div class="stat f-container">
                <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="milestone-counter">
                        <span class="green days stat-count highlight">0</span>
                        <div class="green milestone-details"><?php print t('Days'); ?></div>
                    </div>
                </div>
                <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="milestone-counter">
                        <span class="hours stat-count highlight">0</span>
                        <div class="milestone-details"><?php print t('Hours'); ?></div>
                    </div>
                </div>
                <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="milestone-counter">
                        <span class="red minutes stat-count highlight">0</span>
                        <div class="red milestone-details"><?php print t('Minutes'); ?></div>
                    </div>
                </div>
                <div class="f-element col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="milestone-counter">
                        <span class="yellow seconds stat-count highlight">0</span>
                        <div class="yellow milestone-details"><?php print t('Seconds'); ?></div>
                    </div>
                </div>
            </div><!-- stat -->
        </div><!-- end countdown -->
    </div><!-- mmode -->
</div><!-- container -->

<script src="<?php echo $theme_root; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $theme_root; ?>/js/countdown.js"></script>

<script>
    // countdown script
    jQuery("#countdown").countdown({
        date: "<?php echo theme_get_setting('maintenance_time'); ?> 12:00:00", // add your date here.
        format: "on"
    });
</script>

</body>
</html>
