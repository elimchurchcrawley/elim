<?php 
/**
 * Themed attachments table
 */
  $header = array(t('File name'), t('Size'));
  $rows = array();
  foreach ($files as $file) {
    if ($file->list) {
      $type = explode('/', $file->filemime);
      // Quick fix. Should use some kind of make_safe_for_css() function.
      $type = str_replace('.', '-'. $type[1]);
      $href = check_url(($file->fid ? file_create_url($file->filepath) : url(file_create_filename($file->filename, file_create_path()))));
      /* To do:
      if (!empty($file->description)) {
        $text = check_plain($file->description) . '<br /><span class="filename">'.$file->filename.'</span>';
      }
      else {
        $text = check_plain($file->filename);
      }
      */
       $text = check_plain($file->description ? $file->description : $file->filename);
      // Because the drupal format_size function doesn't round far enough to be smooth.
      $size = $file->filesize;
      $suffix = t('bytes'); 
      if ($size >= 1024) { 
        $size = round($size / 1024, 0);
        $suffix = t('KB'); 
      } 
      if ($size >= 1024) { 
        $size = round($size / 1024, 0);
        $suffix = t('MB'); 
      } 

      $size = array('data' => t('%size %suffix', array('%size' => $size, '%suffix' => $suffix)), 'class' => 'size');
      
      if ($type == 'jpeg' ) {
        $text = array('data' => l($text, $href, array('title' => 'Right click to download', 'class' => 'thickbox'), $query = NULL, $fragment = NULL, $absolute = FALSE, $html = TRUE), 'class' => $type);
      }
      else {
        $text = array('data' => l($text, $href, array('title' => 'Right click to download'), $query = NULL, $fragment = NULL, $absolute = FALSE, $html = TRUE), 'class' => $type);
      }
      $rows[] = array($text, $size);
    }
  }

  if (count($rows)) {
    print '<div class="attachments">'. theme('table', $header, $rows, array('class' => 'attachments'), 'Downloadable files') .'</div>';
  }