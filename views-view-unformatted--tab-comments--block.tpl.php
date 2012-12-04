<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<li'.ElimR_comment_last().'>'.$row.'</li>';
}
print ($n1 ? '<ul>'.$n1.'</ul>' : '');
?>