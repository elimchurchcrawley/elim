<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Define $root global variable.
 */
global $theme_root;
$theme_root = base_path() . path_to_theme();

/**
* Helper function to test for panel page config.
*/
function _is_panel_page() {
	$page = &drupal_static(__FUNCTION__);
	if (function_exists("page_manager_get_current_page")) {
		if (!isset($page)) {
			$page = page_manager_get_current_page();
		}
	}
	return $page ? $page : FALSE;
}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function candidate_preprocess_page(&$vars, $hook) {		
	drupal_add_js(drupal_get_path('theme', 'candidate') .'/js/html5shiv.js');
	if (isset($vars['node']->type)) {
        $nodetype = $vars['node']->type;
        $vars['theme_hook_suggestions'][] = 'page__' . $nodetype;
    }
	
	// If this is a panel page, add template suggestions.
	if($panel_page = _is_panel_page()) {
		// Add a generic suggestion for all panel pages.
		$vars['theme_hook_suggestions'][] = 'page__panel';
		// Add the panel page machine name to the template suggestions.
		$vars['theme_hook_suggestions'][] = 'page__' . $panel_page['name'];
		// Add a body class for good measure.
		$body_classes[] = 'page-panel';
	}
	
	$status = drupal_get_http_header("status");
    if ($status == "404 Not Found") {
        $vars['theme_hook_suggestions'][] = 'page__404';
    }
}

function candidate_form_alter(&$form, &$form_state, $form_id) {
  if($form_id == 'commerce_checkout_form_checkout'){
      $form['buttons']['cancel']['#attributes']['class'][0] = 'button';
  }
  if($form_id == 'commerce_checkout_form_review'){
      $form['buttons']['back']['#attributes']['class'][0] = 'button';
  }
  if(stristr($form_id,'simplenews_block_form')){
      $form['submit']['#prefix'] = '<div class = "newsletter-submit">';
      $form['submit']['#suffix'] = '</div>';
      $form['mail']['#prefix'] = '<div class = "newsletter-form">';
      $form['mail']['#suffix'] = '</div>';
      $form['mail']['#attributes']['placeholder'] = 'Email address';
  }
  if ($form_id == 'search_block_form') {
    // HTML5 placeholder attribute
    $form['search_block_form']['#attributes']['placeholder'] = t('Enter text');
  }
  if($form_id == 'comment_node_product_display_form'){
      $form['#attributes']['class'][] = 'row';
      $form['field_product_name']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-6">';
      $form['field_product_name']['#suffix'] = '</div>';
      $form['field_product_email']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-6">';
      $form['field_product_email']['#suffix'] = '</div>';
      $form['subject']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['subject']['#suffix'] = '</div>';
      $form['comment_body']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['comment_body']['#suffix'] = '</div>';
      $form['field_rating']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['field_rating']['#suffix'] = '</div>';
      $form['author']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['author']['#suffix'] = '</div>';
  }

  if($form_id == 'comment_node_blog_form'){
      $form['author']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['author']['#suffix'] = '</div>';

      $form['#attributes']['class'][] = 'row';
      $form['field_blog_email']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-6">';
      $form['field_blog_email']['#suffix'] = '</div>';
      $form['field_blog_name']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-6">';
      $form['field_blog_name']['#suffix'] = '</div>';
      $form['subject']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['subject']['#suffix'] = '</div>';
      $form['comment_body']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
      $form['comment_body']['#suffix'] = '</div>';
  }
  if(stristr($form_id,'webform_client_form')){
      $form['#attributes']['class'][] = 'row custom-contact';
      if(isset($form['submitted']['email_address'])){
          $form['submitted']['email_address']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['email_address']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['first_name'])){
          $form['submitted']['first_name']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['first_name']['#suffix'] = '</div>';
      }

      if(isset($form['submitted']['last_name'])){
          $form['submitted']['last_name']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['last_name']['#suffix'] = '</div>';
      }

      if(isset($form['submitted']['address'])){
          $form['submitted']['address']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['address']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['phone'])){
          $form['submitted']['phone']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['phone']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['subject'])){
          $form['submitted']['subject']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['subject']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['address_2'])){
          $form['submitted']['address_2']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['address_2']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['city'])){
          $form['submitted']['city']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['city']['#suffix'] = '</div>';
      }
      if(isset( $form['submitted']['address_1'])){
          $form['submitted']['address_1']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['address_1']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['your_questions_comments'])){
          $form['submitted']['your_questions_comments']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
          $form['submitted']['your_questions_comments']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['home_phone'])){
          $form['submitted']['home_phone']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['home_phone']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['cell_phone'])){
          $form['submitted']['cell_phone']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['cell_phone']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['how_can_you_help'])){
          $form['submitted']['how_can_you_help']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['how_can_you_help']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['issues'])){
          $form['submitted']['issues']['#prefix'] = '<div class = "col-lg-6 col-md-6 col-sm-12">';
          $form['submitted']['issues']['#suffix'] = '</div>';
      }
      if(isset($form['submitted']['friend_email_addresses'])){
          $form['submitted']['friend_email_addresses']['#prefix'] = '<div class = "col-lg-12 col-md-12 col-sm-12">';
          $form['submitted']['friend_email_addresses']['#suffix'] = '</div>';
      }


  }
}

function candidate_css_alter(&$css) {
    // Remove defaults.css file.
    unset($css[drupal_get_path('module', 'system') . '/defaults.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
    unset($css[drupal_get_path('module', 'user') . '/user.css']);
    //Except these last two
    unset($css['misc/ui/jquery.ui.core.css']);
	unset($css['misc/ui/jquery.ui.theme.css']);
    // .. etc..
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function candidate_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
}

function candidate_preprocess_node(&$vars) {
	//remove the statistics counter from node view
	if(!empty($vars['content']['links']['statistics']['#links']['statistics_counter']['title'])) {
		unset($vars['content']['links']['statistics']['#links']['statistics_counter']['title']);
	}
}

/**
 * Define breadcrumb in theme templates.
 */
function candidate_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.
        $crumbs = '<div>';
        $array_size = count($breadcrumb);
        if ($array_size > 1) {
            $array_size = $array_size - 1;
        }
        $i = 0;
        while ($i < $array_size) {
            $crumbs .= '<span>' . $breadcrumb[$i] . '</span> / ';
            $i++;
        }
        $crumbs .= drupal_get_title() . '</div>';
        return $crumbs;
    }
}

/* MENU ul */
function candidate_menu_tree($variables) {
    return '<nav><ul>' . $variables['tree'] . '</ul></nav>';
}

/* MENU li */
function candidate_menu_link(array $variables) {
    $element = $variables['element'];

    if (empty($element['#localized_options'])) {
        $element['#localized_options'] = array();
    }

    $base_path = preg_replace('/^([A-Za-z0-9_-]+)\/(.*)/', '${1}', drupal_get_path_alias($_GET['q']));

    //Get the current link we're looking at
    $this_link = drupal_get_path_alias($element['#href']);

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    return '<li>' . $output . "</li>\n";
}

/* main menu ul */
function candidate_menu_tree__main_menu($variables) {
    return '<ul id="navigation">' . $variables['tree'] . '</ul>';
}

/* main menu li */
function candidate_menu_link__main_menu(array $variables) {
    $front_page = drupal_is_front_page();
    $element = $variables['element'];
    
    if (empty($element['#localized_options']))
    {
        $element['#localized_options'] = array();
    }

    //Not sure if this is the cleanest method, but it should allow us to follow
    //the active-trail across menu items, based on path.

    //Get the start of the current path (e.g. admin/build/modules would be admin)
    $base_path = preg_replace('/^([A-Za-z0-9_-]+)\/(.*)/', '${1}', drupal_get_path_alias($_GET['q']));

    //Get the current link we're looking at
    $this_link = drupal_get_path_alias($element['#href']);

    //If the
	if($base_path == $this_link)
	{
       $element['#localized_options']['attributes']['class'][] = 'current';
	}

    $sub_menu = '';
	$addClass = '';
    if ($element['#below']) {
        foreach ($element['#below'] as $key => $val) {
            if (is_numeric($key)) {
                $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner'; 
            }
        }
        $element['#below']['#theme_wrappers'][0] = 'menu_tree__main_menu_inner';
        $sub_menu = drupal_render($element['#below']);
    }
	$addClass = '';
	if (strpos(url($element['#href']), 'nolink')) {
		$output = '<a href="javascript:void(0)" class="nolink">' . $element['#title'] . '</a>';
	} elseif(($element['#href'] == '<front>')){
        $element['#title'] = ' ';
        $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    }else {
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	}
    return '<li ' .$addClass . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/* inner ui */
function candidate_menu_tree__main_menu_inner($variables) {
	$output = '<ul>' . $variables['tree'] . '</ul>';
    return $output;
}

/* inner ui */
function candidate_menu_tree__main_menu_inner_home($variables) {
	$output = '<ul>' . $variables['tree'] . '</ul>';
    return $output;
}

/* inner li */
function candidate_menu_link__main_menu_inner($variables) {
    $element = $variables['element'];
    $sub_menu = '';
	$addClass = '';
    if ($element['#below']) {
        foreach ($element['#below'] as $key => $val) {
            if (is_numeric($key)) {
                $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner'; 
            }
        }
        $element['#below']['#theme_wrappers'][0] = 'menu_tree__main_menu_inner_inner';  
        $sub_menu = drupal_render($element['#below']);
		$addClass = '';
    }

	if (strpos(url($element['#href']), 'nolink')) {
		$output = '<a href="javascript:void(0)" class="nolink">' . $element['#title'] . '</a>';
	} else {
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	}

    return '<li '.$addClass.'>' . $output . $sub_menu . '</li>';
}

/* inner ui */
function candidate_menu_tree__main_menu_inner_inner($variables) {
	$output = '<ul>' . $variables['tree'] . '</ul>';
    return $output;
}


/**
 * Apply alternate UL class to Drupal tabs.
 */
function candidate_menu_local_tasks(&$variables) {
    $output = '';

    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="tabs_nav clearfix">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="tabs_nav clearfix">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }

    return $output;
}

function candidate_pagination($node, $mode = 'n') {
    if (!function_exists('prev_next_nid')) {
        return NULL;
    }

	if(isset($node->nid)) {
		switch ($mode) {
			case 'p':
				$n_nid = prev_next_nid($node->nid, 'prev');
				$link_text = "Previous post";
				break;

			case 'n':
				$n_nid = prev_next_nid($node->nid, 'next');
				$link_text = "Next post";
				break;

			default:
				return NULL;
		}

		if ($n_nid) {
			$n_node = '';
			$n_node = node_load($n_nid);

			switch ($n_node->type) {
				case 'art_portfolio':
					$id = $n_node->nid;
					return $id;

				case 'blog':
					$id = $n_node->nid;
					return $id;
				
				case 'article':
					$html = l($link_text, 'node/' . $n_node->nid);
					return $html;
			}
		}
	}
}

function candidate_get_term_name($tid) {
    $term = taxonomy_term_load($tid);
	return $term->name;
}

function candidate_format_comma_field($field_category, $node, $limit = NULL) {

    if (module_exists('i18n_taxonomy')) {
        $language = i18n_language();
    }

    $category_arr = array();
    $category = '';
    $field = field_get_items('node', $node, $field_category);

    if (!empty($field)) {
        foreach ($field as $item) {
            $term = taxonomy_term_load($item['tid']);


            if ($term) {
                if (module_exists('i18n_taxonomy')) {
                    $term_name = i18n_taxonomy_term_name($term, $language->language);

                    // $term_desc = tagclouds_i18n_taxonomy_term_description($term, $language->language);
                } else {
                    $term_name = $term->name;
                    //$term_desc = $term->description;
                }

                $category_arr[] = l($term_name, 'taxonomy/term/' . $item['tid']);
            }

            if ($limit) {
                if (count($category_arr) == $limit) {
                    $category = implode(', ', $category_arr);
                    return $category;
                }
            }
        }
    }
    $category = implode(' ', $category_arr);

    return $category;
}

function candidate_video_info($video_id, $type) {
	// Handle Youtube
	if ($type == "youtube") {
		$data['video_type'] = 'youtube';
		$data['video_id'] = $video_id;
		$xml = simplexml_load_file("http://gdata.youtube.com/feeds/api/videos?q=".$video_id);
		$getxml = simplexml_load_file("http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=".$video_id."&format=xml");
		
		foreach ($xml->entry as $entry) {
			// get nodes in media: namespace
			$media = $entry->children('http://search.yahoo.com/mrss/');
			
			// get video player URL
			$attrs = $media->group->player->attributes();
			$watch = $attrs['url']; 
			
			// get video thumbnail
			$data['thumb_1'] = $media->group->thumbnail[0]->attributes(); // Thumbnail 1
			$data['thumb_2'] = $media->group->thumbnail[1]->attributes(); // Thumbnail 2
			$data['thumb_3'] = $media->group->thumbnail[2]->attributes(); // Thumbnail 3
			$data['thumb_large'] = $media->group->thumbnail[3]->attributes(); // Large thumbnail
			$data['tags'] = $media->group->keywords; // Video Tags
			$data['cat'] = $media->group->category; // Video category
			$attrs = $media->group->thumbnail[0]->attributes();
			$thumbnail = $attrs['url']; 
			
			// get <yt:duration> node for video length
			$yt = $media->children('http://gdata.youtube.com/schemas/2007');
			$attrs = $yt->duration->attributes();
			$data['duration'] = $attrs['seconds'];
			
			// get <yt:stats> node for viewer statistics
			$yt = $entry->children('http://gdata.youtube.com/schemas/2007');
			$attrs = $yt->statistics->attributes();
			$data['views'] = $viewCount = $attrs['viewCount']; 
			$data['title']=$getxml->title;
			$data['info']=$entry->content;
			
			// get <gd:rating> node for video ratings
			$gd = $entry->children('http://schemas.google.com/g/2005'); 
			if ($gd->rating) {
				$attrs = $gd->rating->attributes();
				$data['rating'] = $attrs['average']; 
			} else { 
				$data['rating'] = 0;
			}
			
			$s = $data['duration'][0];
			if ($s < 86400) {
                if ($s < 60) {
                    $date = '00:'.$s;
                } else {
                    $m = intval($s / 60);
                    if ($m < 60) {
                        $date = $m . ':' . ($s - $m*60);
                    }
                }
            }
			$data['time'] = $date;
		} // End foreach
	} // End Youtube

	// Handle Vimeo
	else if ($type == "vimeo") {
		$data['video_type'] = 'vimeo';
		$data['video_id'] = $video_id;
		$xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$video_id.".xml");
			
		foreach ($xml->video as $video) {
			$data['id']=$video->id;
			$data['title']=$video->title;
			$data['info']=$video->description;
			$data['url']=$video->url;
			$data['upload_date']=$video->upload_date;
			$data['mobile_url']=$video->mobile_url;
			$data['thumb_small']=$video->thumbnail_small;
			$data['thumb_medium']=$video->thumbnail_medium;
			$data['thumb_large']=$video->thumbnail_large;
			$data['user_name']=$video->user_name;
			$data['urer_url']=$video->urer_url;
			$data['user_thumb_small']=$video->user_portrait_small;
			$data['user_thumb_medium']=$video->user_portrait_medium;
			$data['user_thumb_large']=$video->user_portrait_large;
			$data['user_thumb_huge']=$video->user_portrait_huge;
			$data['likes']=$video->stats_number_of_likes;
			$data['views']=$video->stats_number_of_plays;
			$data['comments']=$video->stats_number_of_comments;
			$data['duration']=$video->duration;
			$data['width']=$video->width;
			$data['height']=$video->height;
			$data['tags']=$video->tags;
			
			$s = $data['duration'][0];
			if ($s < 86400) {
                if ($s < 60) {
                    $date = '00:'.$s;
                } else {
                    $m = intval($s / 60);
                    if ($m < 60) {
                        $date = $m . ':' . ($s - $m*60);
                    }
                }
            }
			$data['time'] = $date;
		} // End foreach
	} // End Vimeo

	// Set false if invalid URL
	else { $data = false; }
	
	return $data;

}

function candidate_item_list($vars) {
    if (isset($vars['attributes']['class']) && is_array($vars['attributes']['class']) && in_array('pager', $vars['attributes']['class'])) {
        foreach ($vars['items'] as $i => &$item) {
            if (in_array('pager-current', $item['class'])) {
                $item['data'] = '<a class="button" href="javascript: void(0);"><span>' . $item['data'] . '</span></a>';
            } elseif (in_array('pager-item', $item['class'])) {
                $item['class'] = array('page-numbers');
                $item['data'] = $item['data'];

            } elseif (in_array('pager-next', $item['class'])) {
                $data = explode(' ',$item['data']);
                $data_display = explode('>',$data[5]);
                $item['class'] = array('next page-numbers');
                $item['data'] = '<a role="button" '.$data_display[0].' class="button"><i class="icons icon-right-dir"></i></a>';

            } elseif (in_array('pager-last', $item['class'])) {

                $item['class'] = array('page-numbers');
                $item['data'] = '<a role="button" '.$data_display[0].' class="button"><i class="icons icon-fast-forward"></i></a>';
            } elseif (in_array('pager-first', $item['class'])) {
                $data = explode(' ',$item['data']);
                $data_display = explode('>',$data[5]);
                $item['class'] = array('page-numbers first');
                $item['data'] =  '<a role="button" '.$data_display[0].' class="button"><i class="icons icon-fast-backward"></i></a>';;
            } elseif (in_array('pager-previous', $item['class'])) {
                $data = explode(' ',$item['data']);
                $data_display = explode('>',$data[5]);
                $item['class'] = array('prev page-numbers');
                $item['data'] =  '<a role="button" '.$data_display[0].' class="button"><i class="icons icon-left-dir"></i></a>';
            } elseif (in_array('pager-ellipsis', $item['class'])) {
                $item['class'] = array('disabled');
                $item['data'] = $item['data'];
            }
        }
        return '<div class="numeric-pagination">' . theme_item_list($vars) . '</div>';
    }
    return theme_item_list($vars);
}

function candidate_panels_default_style_render_region($vars) {
    $output = '';
    $output .= implode('', $vars['panes']);
    return $output;
}

function candidate_comment_view_alter(&$build) {
    // Remove the <a id="xxx"></a> links from the comment which are solved
    $build['#prefix'] = preg_replace("/<\\/?a(\\s+.*|>)/", "", $build['#prefix']);
}

function candidate_panels_flexible($vars) {

  $css_id = $vars['css_id'];
  $content = $vars['content'];
  $settings = $vars['settings'];
  $display = $vars['display'];
  $layout = $vars['layout'];
  $handler = $vars['renderer'];

  panels_flexible_convert_settings($settings, $layout);

  $renderer = panels_flexible_create_renderer(FALSE, $css_id, $content, $settings, $display, $layout, $handler);

  $output = "<div class=\"panel-flexible " . $renderer->base['canvas'] . " clearfix\" $renderer->id_str>\n";
  $output .= "<div class=\"panel-flexible-inside " . $renderer->base['canvas'] . "-inside\">\n";

  $output .= panels_flexible_render_items($renderer, $settings['items']['canvas']['children'], $renderer->base['canvas']);

  // Wrap the whole thing up nice and snug
  $output .= "</div>\n</div>\n";

  return $output;

}
