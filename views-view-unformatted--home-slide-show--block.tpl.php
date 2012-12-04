<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
if ($n1) {
?>
<div id="slider">
  <div id="coda_slider">
    <div class="item">
      <div class="coda-slider preload" id="coda-slider-1">
        <?php print $n1; ?>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>

  <div id="slider_nav">
    <div id="coda-nav-1" class="coda-nav">
      <?php print ElimR_slide_img(false, true); ?>
    </div>
  </div>
  <div class="clear"></div>
</div>
<?php } ?>