<!-- Footer -->
<footer id="footer">
	
	<!-- Main Footer -->
	<div id="main-footer">
		
		<div class="row">
            <?php if($page['footer_box1']):?>
			<div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
				<?php print render($page['footer_box1']); ?>
			</div>
            <?php endif;?>
            <?php if($page['footer_box2']):?>
			<div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
				<?php print render($page['footer_box2']); ?>
				
			</div>
            <?php endif;?>
			<?php if($page['footer_box3']):?>
			<div class="col-lg-4 col-md-4 col-sm-6 twitter-widget-area animate-onscroll">
				<?php print render($page['footer_box3']);?>
			</div>
            <?php endif;?>
            <?php if($page['footer_box4']):?>
			<div class="col-lg-3 col-md-3 col-sm-6 animate-onscroll">
				<?php print render($page['footer_box4']); ?>
			</div>
            <?php endif;?>

		</div>
		
	</div>
	<!-- /Main Footer -->

	<!-- Lower Footer -->
    <?php if($page['footer_bottom']):?>
	<div id="lower-footer">
		<div class="row">
			<?php print render($page['footer_bottom']); ?>
		</div>
	</div>
    <?php endif;?>
	<!-- /Lower Footer -->
	

</footer>
<!-- /Footer -->