<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<div class="column'.ElimR_latestpostsc_last().'">'.$row.'</div>';
}
print ($n1 ? '<div class="post_columns">'.$n1.'</div>' : '');
?>