
<!--==============================Header================================-->
<?php
include_once("includes/header.inc");
?>

<!--==============================content================================-->
<section id="content">
    <?php if($title):?>
        <section class="section page-heading animate-onscroll">
            <div class="row">
                <div class="<?php if($page['cart']): print 'col-lg-9 col-md-9 col-sm-9'; else:  print 'col-lg-12 col-md-12 col-sm-12'; endif;?>">
                    <?php if($title):?>
                        <h1><?php echo $title; ?></h1>
                    <?php endif;?>
                    <?php if (theme_get_setting('breadcrumbs') == 1): ?>
                        <?php if ($breadcrumb): ?>
                            <div class="breadcrumb">
                                <div class="container">
                                    <div class="row">
                                        <?php print $breadcrumb; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if($page['cart']):?>
                    <div class="col-lg-3 col-md-3 col-sm-3 align-right">
                        <!-- Shopping Cart -->
                        <div class="shopping-cart">
                            <div class="cart-button">
                                <i class="icons icon-basket"></i>
                            </div>
                            <div class="shopping-cart-dropdown">
                                <div class="shopping-cart-content">

                                    <?php print render($page['cart']);?>

                                </div>

                            </div>

                        </div>
                        <!-- /Shopping Cart -->
                    </div>
                <?php endif;?>
            </div>
        </section>
    <?php endif;?>
    <div>
        <?php if ($tabs = render($tabs)): ?>
            <div class="tabs-link">
                <div class="clearfix tabs_conrainer">
                    <?php print render($tabs); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($messages) { print $messages; } ?>
        <?php if ($action_links): ?>
            <div class="tabs-link">
                <div class="clearfix tabs_conrainer">
                    <?php print render($action_links); ?>
                </div>
            </div>
        <?php endif; ?>



        <?php if ($page['content']) : ?>
            <?php print render($page['content']); ?>
        <?php endif; ?>
        <?php if ($page['after_content']) : ?>
            <?php print render($page['after_content']); ?>
        <?php endif; ?>
	</div>
</section>

<!--==============================Footer================================-->
<?php
include_once("includes/footer.inc");
?>