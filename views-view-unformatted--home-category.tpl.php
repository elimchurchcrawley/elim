<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<li'.elim_popular_last().'>'.$row.'</li>';
}
print ($n1 ? '<ul>'.$n1.'</ul>' : '');
?>