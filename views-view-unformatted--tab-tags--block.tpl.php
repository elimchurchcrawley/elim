<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print ($n1 ? $n1.'<div class="clear"></div>' : '');
?>