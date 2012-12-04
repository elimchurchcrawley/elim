<?php
// $Id$

drupal_add_css(path_to_theme().'/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));


global $base_url, $language;

	drupal_add_js('
$(function(){
	$("body").removeClass("coda-slider-no-js");
	$(".coda-slider").children(\'.panel\').hide().end().prepend(\'<p class="loading">Loading...<br /><img src="'.$base_url.'/'.drupal_get_path('theme', 'govideo').'/images/ajax-loader.gif" alt="loading..." /></p>\');
});
	', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));

drupal_add_js('
jQuery(document).ready(function($) {
	// Twitter
	$(\'.widget-twitter\').each(function() {
		$(\'> .tweets\', this).tweet({
			username: $(this).data(\'username\'),
			count:    $(this).data(\'count\'),
			retweets: $(this).data(\'retweets\'),
			template: \'{tweet_text}<br /><small><a href="{tweet_url}">{tweet_relative_time}</a></small>\'
		});
	});
	// Media types
	$(window).resize(function() {
		windowWidth = $(window).width();
		lteTablet = windowWidth < 979;
		lteMobile = windowWidth < 739;
		lteMini   = windowWidth < 479;
		gteDektop = windowWidth >= 979;
		gteTablet = windowWidth >= 739;
		gteMobile = windowWidth >= 479;
		tablet    = lteTablet && gteTablet;
		mobile    = lteMobile && gteMobile;
	}).trigger(\'resize\');
	
	// Navigation main
	$(\'#second_nav ul li:has(ul)\').click(function(e) {
	'.($language->direction ? 'if ((tablet || mobile) && e.pageX - $(this).offset().left <= 45) {' : 'if ((tablet || mobile) && e.pageX - $(this).offset().left >= $(this).width() - 45) {').'
			$(\'> ul\', this).slideToggle(300);
			return false;
		}
	});
	$(\'#nav ul li:has(ul)\').click(function(e) {
	'.($language->direction ? 'if ((tablet || mobile) && e.pageX - $(this).offset().left <= 45) {' : 'if ((tablet || mobile) && e.pageX - $(this).offset().left >= $(this).width() - 45) {').'
			$(\'> ul\', this).slideToggle(300);
			return false;
		}
	});
  if (!(tablet || mobile)) {	
		// Secondary Navigation
	  jQuery("ul.sf-menu").superfish({
		  delay: 500,
		  animation: {opacity:\'show\'},
		  speed: 200,
		  autoArrows: false,
		  dropShadows: false
	  }); 
	
	  // Main Navigation
	  jQuery(\'#nav ul.sf-menu\').superfish({ 
		  delay: 200,
		  animation: {opacity:\'show\', height:\'show\'},
		  speed: \'fast\',
		  autoArrows: false,
		  dropShadows: false
	  });
  }	
});
', array('type' => 'inline',  'scope' => 'footer', 'weight' => 5));

function ElimR_breadcrumb($breadcrumb) {
  /*//drupal_set_message('<pre>'. check_plain(print_r($breadcrumb, 1)) .'</pre>');
  if (!empty($breadcrumb['breadcrumb'])) {
	  $out = '';
    $n = count($breadcrumb['breadcrumb']);
    $i = 1;
	  foreach ($breadcrumb['breadcrumb'] as $data) {
		  if ($i == $n) $out .= $data;
      else $out .= $data;
      $i++;
	  }
	  return $out;
  } */
}

function ElimR_article_first() {
  static $res = 0;
  $out = $res;
  $res = 1;
	return $out;
}

function ElimR_related_last() {
  static $res = 0;
  $res = $res + 1;
	return (($res == 4) ? ' last' : '' );
}

function ElimR_popular_last() {
  static $res = 0;
  if ($res == 5) $res = 0;
  $res = $res + 1;
	return (($res == 5) ? ' class="last"' : '' );
}

function ElimR_recent_last() {
  static $res = 0;
  $res = $res + 1;
	return (($res == 5) ? ' class="last"' : '' );
}

function ElimR_comment_last() {
  static $res = 0;
  $res = $res + 1;
	return (($res == 5) ? ' class="last"' : '' );
}

function ElimR_postgrid_last() {
  static $res = 0;
  if ($res == 8) $res = 0;
  $res = $res + 1;
	return (($res == 8) ? ' class="last"' : '' );
}

function ElimR_latestposts_last() {
  static $res = 0;
  $res = $res + 1;
	return (($res == 3) ? ' last' : '' );
}

function ElimR_latestpostsc_last() {
  static $res = 0;
  $res = $res + 1;
	return (($res == 3) ? ' last' : '' );
}

function ElimR_slide_img($content, $isout = false) {
  static $res = '';
  static $res1 = 1;
  if ($content) {
    $res .= '<li class="tab'.$res1.'"><a href="#'.$res1.'">'.$content.'</a></li>';
    $res1++;
  }
  if ($isout and $res) {
	  return '<ul>'.$res.'</ul>';
  }
}

function ElimR_cslide_img($content, $isout = false) {
  static $res = '';
  static $res1 = 1;
  if ($content) {
    $res .= '<li class="tab'.$res1.'"><a href="#'.$res1.'">'.$content.'</a></li>';
    $res1++;
  }
  if ($isout and $res) {
	  return '<ul>'.$res.'</ul>';
  }
}


function ElimR_set_bic($j) {
  $blocks = block_get_blocks_by_region('banner_in_category_'.$j);
  $block = render($blocks);
  return $block;
}

function ElimR_set_suggestions() {
  $blocks = block_get_blocks_by_region('suggestions');
  $block = render($blocks);
  return $block;
}

function ElimR_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('«')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('»')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
    ));
  }
}



function ElimR_set_tabs($bid, $title, $content, $isout = false) {
  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
  }
  if ($isout and isset($tabs) and is_array($tabs) and count($tabs)) {
	$out_t = '';
	$out_c = '';
	$i = 1;
	foreach ($tabs as $data) {
    $ab = '';
		if ($i == 1) { $ac = ' class="first tab_nav_1"'; }
    elseif ($i == 4) { $ac = ' class="last tab_nav_4"'; $ab = ' tab_tags'; }
    else { $ac = ' class="tab_nav_'.$i.'"'; }
		$out_t .= '<li'.$ac.'><a href="#tabs-'.$data->bid.'">'.$data->title.'</a></li>';
		$out_c .= '<div class="tab'.$ab.'" id="tabs-'.$data->bid.'">'.$data->content.'</div>';
		$i++;
	}
	return '<div class="widget"><div class="tabs"><div class="tab_wrap"><ul class="nav">'. $out_t .'</ul>'.$out_c.'</div></div></div>';
  }
}

function ElimR_set_home_video_right($bid, $title, $content, $isout = FALSE) {
  global $base_url;
  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
  $out_v = ElimR_set_home_video_left(FALSE, TRUE);
	$i = 0;
	foreach ($tabs as $data) {
		if (!$i) $ac = ' class="selected"'; else  $ac = '';
		$out_t .= '<li><a href="#idTab'.$data->bid.'"'.$ac.'><span>'.$data->title.'</span></a></li>';
		$out_c .= '<div id="idTab'.$data->bid.'" class="tabssection"><div class="css-scrollbar simple">'.$data->content.'</div></div>';
		$i++;
	}
	return '<div id="banner">'.$out_v.'<div id="paginate-slider2"><div class="usual"><ul class="idTabs">'. $out_t .'</ul>'.$out_c.'</div></div><div class="clear"></div></div><script type="text/javascript" src="'.$base_url.'/'.drupal_get_path('theme', 'repro').'/js/banner.js"></script>';
  }
}

function ElimR_set_home_video_left($content, $isout = false) {
  static $res = '';
  if ($content) {
    $res .= $content;
  }
  if ($isout and $res) {
	  return '<div id="slider2" class="leftsecbanner">'.$res.'</div>';
  }
}

function ElimR_top($type = 'search') {

 $header = array(
    array('data' => t('Count'), 'field' => 'count', 'sort' => 'desc'),
    array('data' => t('Message'), 'field' => 'message')
  );
  $count_query = db_select('watchdog');
  $count_query->addExpression('COUNT(DISTINCT(message))');
  $count_query->condition('type', $type);

  $query = db_select('watchdog', 'w')->extend('PagerDefault')->extend('TableSort');
  $query->addExpression('COUNT(wid)', 'count');
  $query = $query
    ->fields('w', array('message', 'variables'))
    ->condition('w.type', $type)
    ->groupBy('message')
    ->groupBy('variables')
    ->limit(30)
    ->orderByHeader($header);
  $query->setCountQuery($count_query);
  $result = $query->execute();

  $t = '';
  foreach ($result as $dblog) {
    $a = unserialize($dblog->variables);
    $t .= '<li>'.l($a['%keys']/*.' ('.$dblog->count.')'*/, 'search/node/'.$a['%keys'], array('html' => TRUE)).'</li>';
  }

  return '<div class="topsearches"><h5>'.t('Top Searches').'</h5><ul>'.$t.'</ul><a href="'.url('most_viewed').'" class="buttonone"><span>'.t('Most Viewed Videos').'</span></a><a href="'.url('videos').'" class="buttonone"><span>'.t('Recent Videos').'</span></a></div>';
}


function ElimR_set_background($content, $isout = false) {
  static $res = '';
  if ($content) {
    $res = $content;
  }
  if ($isout and $res) {
    $file = file_create_url($res);
	  return ' style="background-image:url('.$file.');"';
  }
}

function ElimR_get_background($bundle, $field_name = 'field_background', $entity_type = 'taxonomy_term') {
  $datadef = unserialize(
    db_select('field_config', 'f')
    ->fields('f', array('data'))
    ->condition('field_name', $field_name.'_'.$bundle)
    ->range(0, 1)
    ->execute()
    ->fetchField()
  );
  if (isset($datadef['settings']['default_image'])) {
    $file = file_load($datadef['settings']['default_image']);
    $out = $file->uri;
  } else {
    $out = FALSE;
  }
/*
$datacur = unserialize(db_select('field_config_instance', 'f')
      ->fields('f', array('data'))
      ->condition('field_name', $field_name)
      ->condition('entity_type', $entity_type)
      ->condition('bundle', $bundle)
      ->range(0, 1)
      ->execute()
      ->fetchField());
*/
  return $out;
}

function ElimR_get_count_nodes($type = 'video') {
  $n = db_select('node');
  $n->addExpression('COUNT(nid)', 'count');
  $n->condition('type', $type);
  $n->condition('status', 1);
  $n = $n->execute()->fetchField();
  return $n;
}




function ElimR_user_menu_top($logged_in, $front_page) {
  global $user;
  $output = '';
  //<li><a href="#">Mature Warning: On</a></li>
  if (!$logged_in) { 
    $output .= '<li>'.l('Log in','user').'</li>';
    $output .= '<li class="last">'.l('Register','user/register').'</li>';
  } else {
    $output .= '<li>'.l('Log out','user/logout').'</li>';
    $output .= '<li class="last">'.l('Account','user/'.$user->uid).'</li>';
  }
  return '<ul class="sf-menu">'.ElimR_tree_m1().$output .'</ul>';
}

function ElimR_user_menu_cat() {
  return '<ul class="sf-menu">'.ElimR_tree_m0().'</ul>';
}

function ElimR_tree_m0($menu_name = 'main-menu', $type = '') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = ElimR_tree_output_m0($tree,$type);
  }
  return $menu_output[$menu_name];
}

function ElimR_tree_m1($menu_name = 'secondary-menu', $type = '') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = ElimR_tree_output_m0($tree,$type);
  }
  return $menu_output[$menu_name];
}


function ElimR_tree_output_m0($tree,$type) {
  $output = '';
  $items = array();
  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  foreach ($items as $i => $data) {
    //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  //if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
    //if ($data['link']['link_path'] == '<front>') $d = ' id="menu_home"'; else $d = '';
    if ($data['below']) {
	  $output .= '<li class="innn"><a href="'.url($data['link']['href']).'" class="inna">'.$data['link']['title'].'</a><ul>'.ElimR_tree_output_m0($data['below'],$type)."</ul></li>";
    }
    else {
	  $output .= '<li><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
    }
  }
  return $output ?  $output : '';
}

function ElimR_tw_js() {
	return '
	<script type="text/javascript">
	(function ($) {
	  $(function(){
	    var opts={fbId:\''.theme_get_setting('tm_ac_feedburner').'\',fbCount:-1,twId:\''.theme_get_setting('tm_ac_twitter').'\',twCount:-1,};
	    var twCount=\'\';
	    var fbCount=\'\';
	    var fbUrl=\'\';
	    var twUrl=\'\';
	    function doTwCount(count){$("#tw-count").html(twCount+\'&nbsp;\');}
	    function doFbCount(count){$("#fb-count").html(fbCount+\'&nbsp;\');}
	    $(document).ready(function($){
	      fbUrl=\'http://pipes.yahoo.com/pipes/pipe.run\';
	      twUrl=\'http://twitter.com/users/show.json\';
	      if(opts.twCount==-1){$.ajax({type:\'GET\',url:twUrl,data:{\'screen_name\':opts.twId},dataType:\'jsonp\',success:function(jsonData){twCount=jsonData.followers_count;doTwCount(twCount);}});}
	      if(opts.fbCount==-1){$.getJSON(fbUrl+\'?_id=b47b5cb1a615935b43858618ebe5ee32&uri=\'+opts.fbId+\'&_render=json&_callback=?\',function(data){fbCount=data.value.items[0].circulation;doFbCount(fbCount);});}
	    });
	  });
	})(jQuery)
  </script>';
}



function ElimR_menu_tree($tree) {
  return '<ul>'. $tree['tree'] .'</ul>';
}

function ElimR_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  } //else {
    //$element['#localized_options']['attributes']['class'] += 'staticlinks';
  //}
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . $sub_menu ."</li>\n";
}

/**
 * Generate the HTML output for a menu item and submenu.
 *
 * @ingroup themeable
 */
 
function ElimR_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  return '<li>'. $link . $menu ."</li>\n";
}


/* Node */
function ElimR_get_node($type = 'type') {
	static $node = false;
	if (!$node and arg(0) == 'node' and is_numeric(arg(1))){
		$node = db_fetch_array(db_query('SELECT * FROM {node} where nid = %d',arg(1)));
	}	
  return $node[$type];
}

function ElimR_get_node_style() {
	static $node = false;
	if (!isset($node) and arg(0) == 'node' and is_numeric(arg(1)) and !arg(2)){
		$node = node_load(arg(1));
		return $node->field_style[0]['value'];
	} else {
		return 'n';
	} 
}

/*
function ElimR_get_tax_link($vid = 1) {
	$out = '';
	$result = db_query('SELECT * FROM {term_data} where vid = %d',$vid);
	while ($term = db_fetch_object($result)) {
		$out .= l($term->name, 'taxonomy/term/'.$term->tid).' ';
	}	
  return $out;
}
*/

function ElimR_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= ' ...';
  }

  return $string;
}


