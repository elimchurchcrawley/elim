<!-- Header -->
<header id="header" class="animate-onscroll">
	<!-- Main Header -->
	<div id="main-header">
		<div class="container">
		<div class="row">
			<!-- Logo -->
			<div id="logo" class="col-lg-3 col-md-3 col-sm-3">
				<a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Logo'); ?>"></a>
			</div>
			<!-- /Logo -->
			<!-- Main Quote -->
			<div class="col-lg-5 col-md-4 col-sm-4">
			</div>
			<!-- /Main Quote -->
			<!-- Newsletter -->
            <?php if($page['header_right']):?>
			<div class="col-lg-4 col-md-5 col-sm-5">
                <?php print render($page['header_right']);?>
			</div>
            <?php endif;?>
			<!-- /Newsletter -->
		</div>
		</div>
	</div>
	<!-- /Main Header -->

	<!-- Lower Header -->
    <?php if($page['menu']):?>
	<div id="lower-header">
		<div class="container">
        <div id="menu-button">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span><?php print t('Menu');?></span>
        </div>
        <?php print render($page['menu']);?>
		</div>
	</div>
    <?php endif;?>
	<!-- /Lower Header -->
</header>
<!-- /Header -->