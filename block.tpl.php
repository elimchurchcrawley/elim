<?php 
$out = '';
if ($block->region == 'home_content') { 
  $out .= '<div class="grid_8 alpha omega">';
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= $content;
  $out .= '</div>';
} elseif (($block->region == 'sidebar_right_top' or $block->region == 'sidebar_right_bottom') and ($block->module != 'block')) { 
  $out .= '<div class="widget mod1">';
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= $content;
  $out .= '</div>';
} elseif ($block->region == 'home_category_one' or $block->region == 'home_category_two' or $block->region == 'home_category_three' or $block->region == 'home_category_four') {
  $out .= '<div class="category_list">';
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= $content;
  $out .= '</div>';
} elseif ($block->region == 'sidebar_right_tab') {
  elim_set_tabs($block->bid, $block->subject, $content);
} elseif ($block->region == 'sidebar_right_bottom_half_1' or $block->region == 'sidebar_right_bottom_half_2') {
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= $content;
} else {
  $out .= '<div class="widget">';
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= $content;
  $out .= '</div>';
}
print render($title_suffix);
print $out;
//print '<pre>'. check_plain(print_r($block, 1)) .'</pre>';


?>