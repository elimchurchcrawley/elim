<?php print render($page['header']); 
global $base_url;
?>
   <div id="header">
        <div id="top">
            <div class="container_12">
                <div class="grid_3">
                </div><!--grid_3-->
                <div class="grid_9">
                    <div id="second_nav"><?php print elim_user_menu_top($logged_in, $front_page) ?></div>
                </div><!--grid_9-->
                <div class="clear"></div>
            </div><!--container_12-->
        </div><!--top-->
        <div id="bottom">
            <div class="container_12">
                <div class="grid_5">
                  <div id="logo"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a></div>
                </div><!--grid_5-->
                <div class="grid_7">
                  <div id="header_advert"><?php if (isset($page['header_advert'])) { echo render($page['header_advert']); } ?></div>
                </div><!--grid_7-->
                <div class="grid_12">
                    <div id="nav"><?php print elim_user_menu_cat() ?><div class="clear"></div></div>
                </div><!--grid_12-->
                <div class="clear"></div>	
            </div><!--container_12-->
        </div><!--bottom-->
    </div><!--header-->

    <div id="the_body">
        <div class="container_12">
            <div class="grid_8">
                <?php if (isset($page['home_slide_show'])) { echo ' <div class="grid_8 alpha omega">'.render($page['home_slide_show']).'</div>'; } ?>
                <?php if (isset($messages)) { print '<div class="clear"></div>'.$messages.'<div class="clear"></div>'; } ?>
                <?php if (isset($page['home_content'])) { echo render($page['home_content']); } ?>
                <div class="grid_8 alpha omega">
                    <div class="grid_4 alpha"><?php if (isset($page['home_category_one'])) { echo render($page['home_category_one']); } ?></div>
                    <div class="grid_4 omega"><?php if (isset($page['home_category_two'])) { echo render($page['home_category_two']); } ?></div>
                </div>
                <div class="grid_8 alpha omega">
                    <div class="grid_4 alpha"><?php if (isset($page['home_category_three'])) { echo render($page['home_category_three']); } ?></div>
                    <div class="grid_4 omega"><?php if (isset($page['home_category_four'])) { echo render($page['home_category_four']); } ?></div>
                </div>
            </div>

            <div class="grid_4">
				        <div id="sidebar">
                  <?php if (isset($page['sidebar_right_top'])) { echo render($page['sidebar_right_top']); } ?>
                  <?php if (isset($page['sidebar_right_tab'])) { render($page['sidebar_right_tab']); print elim_set_tabs(false, false, false, true); } ?>
                  <?php if (isset($page['sidebar_right_bottom'])) { echo render($page['sidebar_right_bottom']); } ?>
                  <div class="widget">
                    <?php if (isset($page['sidebar_right_bottom_half_1'])) { echo '<div class="half">'.render($page['sidebar_right_bottom_half_1']).'</div>'; } ?>
                    <?php if (isset($page['sidebar_right_bottom_half_2'])) { echo '<div class="half last">'.render($page['sidebar_right_bottom_half_2']).'</div>'; } ?>
                  </div>
                </div><!--sidebar-->
            </div><!--grid_4-->
            <div class="clear"></div>
        </div><!--container_12-->
    </div><!--the_body-->

    <div id="footer">    
    	<div id="footer_border"></div>
        <div class="container_12">
            <div class="grid_3"><?php if (isset($page['footer_one'])) { echo render($page['footer_one']); } ?></div>
            <div class="grid_3">
              <div class="widget">
                <h4><span><?php print t('Twitter'); ?></span></h4>
                <ul id="twitter_update_list"></ul>
                <?php print elim_tw_js(); ?>
              </div><!--widget-->
              <?php if (isset($page['footer_two'])) { echo render($page['footer_two']); } ?>
            </div><!--grid_3-->
            <div class="grid_3"><?php if (isset($page['footer_three'])) { echo render($page['footer_three']); } ?></div>
            <div class="grid_3"><?php if (isset($page['footer_four'])) { echo render($page['footer_four']); } ?></div>
            <div class="clear"></div>
        </div><!--container_12-->
        <div id="footer_bottom">
            <div class="container_12">
                <div class="grid_6"><?php if (isset($page['footer_copyright'])) { echo render($page['footer_copyright']); } ?></div>
                <div class="grid_6"><p class="right"></p></div>
                <div class="clear"></div>
            </div><!--container_12-->
    	</div><!--footer_bottom-->
    </div><!--footer-->
