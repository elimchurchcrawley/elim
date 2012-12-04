<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<div class="column'.ElimR_latestposts_last().'">'.$row.'</div>';
}
print ($n1 ? '<div class="post_columns"><h4><span>'.t('Latest Posts').'</span></h4>'.$n1.'<div class="clear"></div></div>' : '');
?>