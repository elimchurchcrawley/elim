<?php

function ElimR_form_system_theme_settings_alter(&$form, $form_state) {

  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advansed Theme Settings'),
  );

  $form['advansed_theme_settings']['socacc'] = array(
    '#type' => 'fieldset',
    '#title' => t('Accounts'),
  );

  $form['advansed_theme_settings']['socacc']['tm_ac_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter'),
    '#default_value' => theme_get_setting('tm_ac_twitter'),
  );

/*$form['advansed_theme_settings']['socacc']['tm_ac_feedburner'] = array(
    '#type' => 'textfield',
    '#title' => t('Feed Burner'),
    '#default_value' => theme_get_setting('tm_ac_feedburner'),
  );
  
  $form['advansed_theme_settings']['socacc']['tm_ac_flickr'] = array(
    '#type' => 'textfield',
    '#title' => t('Flickr'),
    '#default_value' => theme_get_setting('tm_ac_flickr'),
  );
*/
}
