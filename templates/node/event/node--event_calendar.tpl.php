<?php 
	global $base_url;
    $extend_image = '';
	if(isset($content['field_show_type'])){
    $type = $content['field_show_type']['#items'][0]['value'];
	}
	$single_image = 'http://placehold.it/262x148';
	if (!empty($node->field_single_image['und'])) {
		$image = file_create_url($node->field_single_image['und'][0]['uri']);
	    $single_image = file_create_url(image_style_url('image_849x480',$node->field_single_image['und'][0]['uri']));
	    $extend_image = file_create_url(image_style_url('image_1920x490',$node->field_single_image['und'][0]['uri']));
	}
?>

<?php if(!$page):?>

	<div class="blog-post">
				
		<div class="post-image">
					
			<img src="<?php print $single_image; ?>" alt="">
			
			<div class="media-hover">
				<div class="media-icons">
					<a href="<?php print $image; ?>" data-group="media-jackbox" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
					<a href="<?php print $node_url;?>" class="media-icon"><i class="icons icon-link"></i></a>
				</div>
			</div>
															
		</div>
		<!-- Event Meta -->
		<div class="event-meta horizontal">
			
			<div class="event-meta-block col-lg-3 col-md-3 col-sm-6" style="opacity: 1;">
				
				<i class="icons icon-calendar"></i>
				<p class="title"><?php print t('Start Date - End Date')?></p>
				<p>
					<?php if(isset($node->event_calendar_date['und'][0]['value'])):?>
						<?php print date('M jS, Y',strtotime($node->event_calendar_date['und'][0]['value'])); ?>
					<?php endif;?>
					- 
					<?php if(isset($node->event_calendar_date['und'][0]['value2'])):?>
						<?php print date('M jS, Y',strtotime($node->event_calendar_date['und'][0]['value2'])); ?>
					<?php endif;?>												
				</p>
				
			</div>
			
			<div class="event-meta-block col-lg-3 col-md-3 col-sm-6" style="opacity: 1;">
				
				<i class="icons icon-clock"></i>
				<p class="title"><?php print t('Start Time - End Time')?></p>
				<p>
					<?php if(isset($node->event_calendar_date['und'][0]['value'])):?>
						<?php print date('g:i a',strtotime($node->event_calendar_date['und'][0]['value'])); ?>
					<?php endif;?> 
					- 
					<?php if(isset($node->event_calendar_date['und'][0]['value2'])):?>
						<?php print date('g:i a',strtotime($node->event_calendar_date['und'][0]['value2'])); ?>
					<?php endif;?>												
				</p>
				
			</div>
			<?php if(isset($node->field_location['und'])):?>
				<div class="event-meta-block col-lg-3 col-md-3 col-sm-6" style="opacity: 1;">
					
					<i class="icons icon-location"></i>
					<p class="title"><?php print t('Event Location')?></p>
					<p>													
						<?php print $node->field_location['und'][0]['value'];?>
					</p>
					
				</div>
			<?php endif;?>

			<?php if(isset($node->field_cost['und'])):?>
				<div class="event-meta-block col-lg-3 col-md-3 col-sm-6" style="opacity: 1;">
					
					<i class="icons icon-ticket"></i>
					<p class="title">Cost</p>
					<p>												
						<?php print $node->field_cost['und'][0]['value'];?>
					</p>
					
				</div>
			<?php endif;?>
		</div>											
		<div class="event-post-content">
			
			<div class="post-header">
				<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
				<div class="post-meta">
					<span class="categories"><?php print t('in');?> <?php print candidate_format_comma_field('field_event_category', $node); ?></span>
				</div>
			</div>
			
			<div class="post-exceprt">
				
				<?php if(isset($node->body['und'][0]['value'])):?>
					<?php 
						$summary= strip_tags($node->body['und'][0]['value']);
          				$string = (strlen($summary) > 250) ? substr($summary,0,250).'...' : $summary;
         		 		print '<p>'.$string.'</p>';
					?>
					
				<?php endif;?>
									
				<a href="<?php print $node_url; ?>" class="button read-more-button big button-arrow"><?php print t('Read More')?></a>
				
			</div>
			
		</div>
				
	</div>

<?php else:?>
	<?php if(!empty($node->field_style_mode) && $node->field_style_mode['und'][0]['value']=='style2'):?>
		<section class="section full-width full-width-image animate-onscroll">		
				<img src="<?php print $extend_image;?>" alt="">			
		</section>
		<section class="section full-width-bg gray-bg">
				
				<div class="row">
				
					<div class="col-lg-12 col-md-12 col-sm-12">
						
						<!-- Event Single -->
						<div class="event-single">
							
							<div class="row">
								
								<div class="col-lg-12 col-md-12 col-sm-12">
									
									<!-- Event Meta -->
									<div class="event-meta horizontal">
										
										<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll">
											
											<i class="icons icon-calendar"></i>
											<p class="title"><?php print t('Start Date - End Date')?></p>
											<p>
												<?php if(isset($node->event_calendar_date['und'][0]['value'])):?>
													<?php print date('M jS, Y',strtotime($node->event_calendar_date['und'][0]['value'])); ?>
												<?php endif;?>
												- 
												<?php if(isset($node->event_calendar_date['und'][0]['value2'])):?>
													<?php print date('M jS, Y',strtotime($node->event_calendar_date['und'][0]['value2'])); ?>
												<?php endif;?>												
											</p>
											
										</div>
										
										<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll" >
											
											<i class="icons icon-clock"></i>
											<p class="title"><?php print t('Start Time - End Time')?></p>
											<p>
												<?php if(isset($node->event_calendar_date['und'][0]['value'])):?>
													<?php print date('g:i a',strtotime($node->event_calendar_date['und'][0]['value'])); ?>
												<?php endif;?> 
												- 
												<?php if(isset($node->event_calendar_date['und'][0]['value2'])):?>
													<?php print date('g:i a',strtotime($node->event_calendar_date['und'][0]['value2'])); ?>
												<?php endif;?>												
											</p>
											
										</div>
										<?php if(isset($node->field_location['und'])):?>
											<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll">
												
												<i class="icons icon-location"></i>
												<p class="title"><?php print t('Event Location')?></p>
												<p>													
													<?php print $node->field_location['und'][0]['value'];?>
												</p>
												
											</div>
										<?php endif;?>
										<?php if(isset($node->field_cost['und'])):?>
											<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll">
												
												<i class="icons icon-ticket"></i>
												<p class="title"><?php print t('Cost');?></p>
												<p>												
													<?php print $node->field_cost['und'][0]['value'];?>
												</p>
												
											</div>
										<?php endif;?>
									</div>
									<!-- /Event Meta -->
									<?php if(isset($node->field_map['und'][0]['value'])):?>
										<div class="event-image animate-onscroll" >
											
												<?php print $node->field_map['und'][0]['value'];?>
																				
										</div>
									<?php endif;?>	
									<!-- Event Meta -->
									<div class="event-meta horizontal">
										<?php if(isset($node->field_organizer['und'][0]['value'])):?>
											<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll" >
												
												<i class="icons icon-user"></i>
												<p class="title"><?php print t('Organizer')?></p>
												<p>
													<?php print $node->field_organizer['und'][0]['value'];?>	
												</p>
												
											</div>
										<?php endif;?>
										<?php if(isset($node->field_phone['und'][0]['value'])):?>
											<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll">
												
												<i class="icons icon-phone"></i>
												<p class="title"><?php print t('Phone')?></p>
												<p>
													<?php print $node->field_phone['und'][0]['value'];?>	
												</p>
												
											</div>
										<?php endif;?>
										<?php if(isset($node->field_email['und'])):?>
											<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll">
												
												<i class="icons icon-mail-alt"></i>
												<p class="title"><?php print t('Email')?></p>
												<p>
													<a href="mailto:<?php print $node->field_email['und'][0]['value'];?>"><?php print $node->field_email['und'][0]['value'];?></a>
												</p>
												
											</div>
										<?php endif;?>
										<?php if(isset($node->field_website['und'][0]['value'])):?>
											<div class="event-meta-block col-lg-3 col-md-3 col-sm-6 animate-onscroll">
												
												<i class="icons icon-globe"></i>
												<p class="title"><?php print t('Website')?></p>
												<p>
													<a href="<?php print $node->field_website['und'][0]['value'];?>"><?php print $node->field_website['und'][0]['value'];?></a>										
												</p>
												
											</div>
										<?php endif;?>	
									</div>
									<!-- /Event Meta -->
									
									
									<div class="row event-details">
										
										<div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
											
											<h6><?php print t('Event Details')?></h6>
											
											<table class="project-details">
										
												<tbody><tr>
													<td><?php print t('Category:')?></td>
													<td class="categories"><?php print candidate_format_comma_field('field_event_category', $node); ?></td>
												</tr>
												
												<tr>
													<td><?php print t('Tags:')?></td>
													<td class="categories tag"><?php print candidate_format_comma_field('field_event_tags', $node); ?></td>
												</tr>
												
												<tr>
													<td><?php print t('Share this:')?></td>
													<td>
														<ul class="social-share">
															<li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v2.html" class="tooltip-ontop" title="" data-original-title="Facebook" target="_blank"><i class="icons icon-facebook"></i></a></li>
															<li class="twitter"><a href="https://twitter.com/home?status=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v2.html" class="tooltip-ontop" title="" data-original-title="Twitter" target="_blank"><i class="icons icon-twitter"></i></a></li>
															<li class="google"><a href="https://plus.google.com/share?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v2.html" class="tooltip-ontop" title="" data-original-title="Google Plus" target="_blank"><i class="icons icon-gplus"></i></a></li>
															<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v2.html" class="tooltip-ontop" title="" data-original-title="Pinterest" target="_blank"><i class="icons icon-pinterest-3"></i></a></li>
															<li class="email"><a href="#" class="tooltip-ontop" title="" data-original-title="Email"><i class="icons icon-mail"></i></a></li>
														</ul>
													</td>
												</tr>
												
											</tbody></table>
											
										</div>
										
										<div class="col-lg-8 col-md-8 col-sm-6 animate-onscroll">
											
											<h6><?php print t('Description')?></h6>
									
											<?php if(isset($node->body['und'][0]['value'])):?>
												<?php print $node->body['und'][0]['value'];?>
											<?php endif;?>
											
										</div>
										
									</div>
									
									
								</div>
								
							</div>
						
						</div>
						<!-- /Event Single -->
						
						
							<div class="row event-pagination">

								<div class="col-lg-4 col-md-4 col-sm-4 align-left animate-onscroll">
	                            <?php if(isset($content['flippy_pager']['#list']['prev']) && $content['flippy_pager']['#list']['prev'] != False):?>
	                                <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['prev']['nid']);?>" class="button big button-arrow-before">Prev event</a>
	                            <?php endif;?>
		                        </div>


		                        <div class="col-lg-4 col-md-4 col-sm-4 align-center animate-onscroll">
		                            <a href="<?php print $base_url.'/event-created';?>" class="button big"><?php print t('All events')?></a>
		                        </div>
		                         <div class="col-lg-4 col-md-4 col-sm-4 align-right animate-onscroll">
		                            <?php if(isset($content['flippy_pager']['#list']['next']) && $content['flippy_pager']['#list']['next'] != False):?>

		                                <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['next']['nid']);?>" class="button big button-arrow">Next event</a>
		                            <?php endif;?>
		                        </div>
							
								
							
							</div>
						
					</div>
					
					
					
				
				</div>
				
		</section>		
		<!-- RELATED EVENTS -->	
		<?php
			$view = views_get_view_result('event_block', 'related_event');
			$result = count($view);
			if ($result) {
				echo '<section class="section full-width-bg">';
			 	print views_embed_view('event_block', 'related_event');
			 	echo '</section>';
			}
		?>
		
	<?php else:?>
		<section class="section full-width full-width-map">
			<?php if(isset($node->field_map['und'][0]['value'])):?>
				<?php print $node->field_map['und'][0]['value'];?>
			<?php endif;?>
		</section>
		<section class="section full-width-bg gray-bg">
					
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<!-- Event Single -->
							<div class="event-single">
								
								<div class="row">
									
									<div class="col-lg-9 col-md-9 col-sm-8 animate-onscroll">
										
										<div class="event-image">
											<img src="<?php print $single_image;?>" alt="">
										</div>
										
										<h6><?php print t('Description')?></h6>
										<?php if(isset($node->body['und'][0]['value'])):?>
											<?php print $node->body['und'][0]['value'];?>
										<?php endif;?>
										
									</div>
									
									<div class="col-lg-3 col-md-3 col-sm-4">
										
										<!-- Event Meta -->
										<div class="event-meta">
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-calendar"></i>
												<p class="title"><?php print t('Start Date - End Date')?></p>
												<p>
													<?php if(isset($node->event_calendar_date['und'][0]['value'])):?>
														<?php print date('M jS, Y',strtotime($node->event_calendar_date['und'][0]['value'])); ?>
													<?php endif;?>
													- 
													<?php if(isset($node->event_calendar_date['und'][0]['value2'])):?>
														<?php print date('M jS, Y',strtotime($node->event_calendar_date['und'][0]['value2'])); ?>
													<?php endif;?>
												</p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-clock"></i>
												<p class="title"><?php print t('Start Time - End Time')?></p>
												<p>
													<?php if(isset($node->event_calendar_date['und'][0]['value'])):?>
														<?php print date('g:i a',strtotime($node->event_calendar_date['und'][0]['value'])); ?>
													<?php endif;?> 
													- 
													<?php if(isset($node->event_calendar_date['und'][0]['value2'])):?>
														<?php print date('g:i a',strtotime($node->event_calendar_date['und'][0]['value2'])); ?>
													<?php endif;?>
												</p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-location"></i>
												<p class="title"><?php print t('Event Location')?></p>
												<p>	
													<?php if(isset($node->field_location['und'])):?>
														<?php print $node->field_location['und'][0]['value'];?>
													<?php endif;?>
												</p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-ticket"></i>
												<p class="title"><?php print t('Cost')?></p>
												<p>												
													<?php if(isset($node->field_cost['und'])):?>
														<?php print $node->field_cost['und'][0]['value'];?>
													<?php endif;?>
												</p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-folder-open"></i>
												<p class="title"><?php print t('Category')?></p>
												<p class="categories"><?php print candidate_format_comma_field('field_event_category', $node); ?></p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll" >
												
												<i class="icons icon-tags"></i>
												<p class="title"><?php print t('Tags')?></p>
												<p class="categories tag"><?php print candidate_format_comma_field('field_event_tags', $node); ?></p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll" >
												
												<i class="icons icon-user"></i>
												<p class="title"><?php print t('Organizer')?></p>
												<p>												
													<?php if(isset($node->field_organizer['und'])):?>
														<?php print $node->field_organizer['und'][0]['value'];?>
													<?php endif;?>
												</p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-phone"></i>
												<p class="title"><?php print t('Phone')?></p>
												<p>												
													<?php if(isset($node->field_phone['und'])):?>
														<?php print $node->field_phone['und'][0]['value'];?>
													<?php endif;?></p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll" >
												
												<i class="icons icon-mail-alt"></i>
												<p class="title"><?php print t('Email')?></p>
												<p>												
													<?php if(isset($node->field_email['und'])):?>
														<a href="mailto:<?php print $node->field_email['und'][0]['value'];?>"><?php print $node->field_email['und'][0]['value'];?></a>
													<?php endif;?></p>
												
											</div>
											
											<div class="event-meta-block animate-onscroll">
												
												<i class="icons icon-share"></i>
												<p class="title"><?php print t('Share This')?></p>
												<ul class="social-share">
													<li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v1.html" class="tooltip-ontop" title="" data-original-title="Facebook" target="_blank"><i class="icons icon-facebook"></i></a></li>
													<li class="twitter"><a href="https://twitter.com/home?status=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v1.html" class="tooltip-ontop" title="" data-original-title="Twitter" target="_blank"><i class="icons icon-twitter"></i></a></li>
													<li class="google"><a href="https://plus.google.com/share?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v1.html" class="tooltip-ontop" title="" data-original-title="Google Plus" target="_blank"><i class="icons icon-gplus"></i></a></li>
													<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=file%3A%2F%2F192.168.1.23%2Fatdev%2Fhtml%2Fcandidate%2Fevent-post-v1.html" class="tooltip-ontop" title="" data-original-title="Pinterest" target="_blank"><i class="icons icon-pinterest-3"></i></a></li>
													<li class="email"><a href="#" class="tooltip-ontop" title="" data-original-title="Email"><i class="icons icon-mail"></i></a></li>
												</ul>
												
											</div>
											
											
										</div>
										<!-- /Event Meta -->
										
									</div>
									
								</div>
							
							</div>
							<!-- /Event Single -->
							
							
							<div class="row event-pagination">

								<div class="col-lg-4 col-md-4 col-sm-4 align-left animate-onscroll">
	                            <?php if(isset($content['flippy_pager']['#list']['prev']) && $content['flippy_pager']['#list']['prev'] != False):?>
	                                <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['prev']['nid']);?>" class="button big button-arrow-before">Prev event</a>
	                            <?php endif;?>
		                        </div>


		                        <div class="col-lg-4 col-md-4 col-sm-4 align-center animate-onscroll">
		                            <a href="<?php print $base_url.'/event-created';?>" class="button big"><?php print t('All events')?></a>
		                        </div>
		                         <div class="col-lg-4 col-md-4 col-sm-4 align-right animate-onscroll">
		                            <?php if(isset($content['flippy_pager']['#list']['next']) && $content['flippy_pager']['#list']['next'] != False):?>

		                                <a href="<?php print $base_url.'/'.drupal_get_path_alias('node/'.$content['flippy_pager']['#list']['next']['nid']);?>" class="button big button-arrow">Next event</a>
		                            <?php endif;?>
		                        </div>
							
								
							
							</div>
							
						</div>

					</div>
					
		</section>
		<!-- RELATED EVENTS -->
		<?php
			$view = views_get_view_result('event_block', 'related_event');
			$result = count($view);
			if ($result) {
				echo '<section class="section full-width-bg">';
			 	print views_embed_view('event_block', 'related_event');
			 	echo '</section>';
			}
		?>
	<?php endif;?>
<?php endif;?>	