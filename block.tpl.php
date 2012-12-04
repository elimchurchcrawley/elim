<?php 
$out = '';
if ($block->region == 'home_content') {
  $out .= '<div id="'.$block_html_id.'" class="grid_8 alpha omega '.$classes.'"'.$attributes.'>';
  //$out .= '<div class="grid_8 alpha omega">';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= render($title_suffix);
	$out .= $content;
  $out .= '</div>';
} elseif (($block->region == 'sidebar_right_top' or $block->region == 'sidebar_right_bottom') and ($block->module != 'block')) { 
  $out .= '<div id="'.$block_html_id.'" class="widget mod1 '.$classes.'"'.$attributes.'>';
  //$out .= '<div class="widget mod1">';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= render($title_suffix);
	$out .= '<div class="tt1">'.$content.'</div>';
  $out .= '</div>';
} elseif ($block->region == 'home_category_one' or $block->region == 'home_category_two' or $block->region == 'home_category_three' or $block->region == 'home_category_four') {
  $out .= '<div id="'.$block_html_id.'" class="category_list '.$classes.'"'.$attributes.'>';
  //$out .= '<div class="category_list">';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= render($title_suffix);
	$out .= $content;
  $out .= '</div>';
} elseif ($block->region == 'sidebar_right_tab') {
  ElimR_set_tabs($block->bid, $block->subject, '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>'.render($title_prefix).render($title_suffix).'<div class="tt1">'.$content.'</div></div>');
} elseif ($block->region == 'sidebar_right_bottom_half_1' or $block->region == 'sidebar_right_bottom_half_2') {
  $out .= '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
} else {
  $out .= '<div id="'.$block_html_id.'" class="widget '.$classes.'"'.$attributes.'>';
  //$out .= '<div class="widget">';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h4><span>'.$block->subject.'</span></h4>';
	$out .= render($title_suffix);
	$out .= '<div class="tt1">'.$content.'</div>';
  $out .= '</div>';
}
print $out;
//print '<pre>'. check_plain(print_r($block, 1)) .'</pre>';

?>