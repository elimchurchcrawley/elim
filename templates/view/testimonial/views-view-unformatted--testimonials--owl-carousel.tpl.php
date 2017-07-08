<div class="owl-carousel-container testimonial-carousel animate-onscroll">
	<div class="owl-carousel" data-max-items="1">
		<?php if (!empty($title)): ?>
		  <h3><?php print $title; ?></h3>
		<?php endif; ?>
		<?php foreach ($rows as $id => $row): ?>
		  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
		    <?php print $row; ?>
		  </div>
		<?php endforeach; ?>
	</div>
	<div class="owl-header">
								
		<div class="carousel-arrows">
			<span class="left-arrow"><i class="icons icon-left-dir"></i></span>
			<span class="right-arrow"><i class="icons icon-right-dir"></i></span>
		</div>
		
	</div>
						
</div>
