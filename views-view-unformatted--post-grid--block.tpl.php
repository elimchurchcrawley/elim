<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<li'.ElimR_postgrid_last().'>'.$row.'</li>';
}
print ($n1 ? '<div class="post_grid"><h4><span>'.t('Post Grid').'</span></h4><ul>'.$n1.'</ul></div>' : '');
?>