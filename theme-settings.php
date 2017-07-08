<?php

drupal_add_css(drupal_get_path('theme', 'candidate') . '/js/theme-setting/spectrum.css');
drupal_add_js(drupal_get_path('theme', 'candidate') . '/js/theme-setting/spectrum.js');
drupal_add_js(drupal_get_path('theme', 'candidate') . '/js/theme-setting/theme_settings.js');

/**
 * Implements hook_form_system_theme_settings_alter()
 */
function candidate_form_system_theme_settings_alter(&$form, &$form_state) {
    $path_theme = drupal_get_path('theme','candidate');
	$bg_image = theme_get_setting('upload_image');
    if (file_uri_scheme($bg_image) == 'public') {
        $bg_image = file_uri_target($bg_image);
    }
    // Main settings wrapper
    $form['options'] = array(
        '#type' => 'vertical_tabs',
        '#default_tab' => 'defaults',
        '#weight' => '-10',
        '#attached' => array(
            'css' => array(drupal_get_path('theme', 'candidate') . '/css/theme-setting/theme-options.css'),
        ),
    );

    // ----------- GENERAL -----------
    $form['options']['general'] = array(
        '#type' => 'fieldset',
        '#title' => t('General'),
    );
    // Breadcrumbs
    $form['options']['general']['breadcrumbs'] = array(
        '#type' => 'checkbox',
        '#title' => 'Breadcrumbs',
        '#default_value' => theme_get_setting('breadcrumbs'),
    );
	// Loader Setting
    $form['options']['general']['loader'] = array(
        '#type' => 'checkbox',
        '#title' => 'On/Off Loader',
        '#default_value' => theme_get_setting('loader'),
    );
	
	// Switcher
    $form['options']['general']['switcher'] = array(
        '#type' => 'checkbox',
        '#title' => 'On/Off Switcher Control',
        '#default_value' => theme_get_setting('switcher'),
    );
    // Animation
    $form['options']['general']['animation'] = array(
        '#type' => 'checkbox',
        '#title' => 'On/Off Animation',
        '#default_value' => theme_get_setting('animation'),
    );
	
	// SOCIALS SETTING

    // Maintenance Time
    $form['options']['general']['maintenance_time'] = array(
        '#type' => 'textfield',
        '#title' => 'Maintenance Time',
        '#description' => 'suggest: 27 August 2017',
        '#default_value' => theme_get_setting('maintenance_time'),
    );
    // ----------- LAYOUT -----------
    $form['options']['layout'] = array(
        '#type' => 'fieldset',
        '#title' => t('Layout'),
    );

    $form['options']['layout']['layout_page'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Page Layout</h3>',
    );

    //Page Layout Container
    $form['options']['layout']['layout_page']['page_wide_layout'] = array(
        '#type' => 'textarea',
        '#title' => 'Page Style: Wide Layout ',
        '#default_value' => theme_get_setting('page_wide_layout'),
    );

    //Page Layout Container
    $form['options']['layout']['layout_page']['page_boxed_layout'] = array(
        '#type' => 'textarea',
        '#title' => 'Page Style: Boxed Layout',
        '#default_value' => theme_get_setting('page_boxed_layout'),
    );
		
	
	// ----------- DESIGN -----------
    $form['options']['design'] = array(
        '#type' => 'fieldset',
        '#title' => 'Design',
    );


	// Layout Option

    $form['options']['design']['layout_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Layout Style</h3>',
    );
	$form['options']['design']['layout_style']['layout_option'] = array(
        '#type' => 'select',
        '#title' => 'Select a layout style:',
        '#default_value' => theme_get_setting('layout_option'),
        '#options' => array(
            'boxed' => 'Boxed',
            'wide' => 'Wide (default)',
        ),
    );

    // Background
    $form['options']['design']['background'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Background Layout</h3>',
    );
    $form['options']['design']['background']['b_checkbox'] = array(
        '#type'    => 'checkbox',
        '#title'   => 'Enable background',
        '#default_value' => theme_get_setting('b_checkbox'),
    );
    $form['options']['design']['background']['d_wrapper'] = array(
        '#type'     => 'container',
        '#states'   => array(
            'visible'   => array(
                ':input[name=b_checkbox]' => array('checked' => TRUE)
            )
        )
    );
	// Background Type
	$form['options']['design']['background']['d_wrapper']['background_type'] = array(
        '#type' => 'select',
        '#title' => 'Background Type',
        '#default_value' => theme_get_setting('background_type'),
        '#options' => array(
            'color' => 'Background Color (default)',
            'image' => 'Background Image',
            'upload' => 'Upload Image',
        ),

    );
	
	// Background Color
    $form['options']['design']['background']['d_wrapper']['background_color'] = array(
		'#type' => 'textfield',
        '#title' => 'Enter a background color:',
        '#default_value' => theme_get_setting('background_color'),
        '#attributes'           => array(
            'class'             =>  array('form-colorpicker')
        ),
		'#states' => array (
          'visible' => array(
            'select[name = background_type]' => array('value' => 'color')
          )
        )

    );

    //Upload Image
    $form['options']['design']['background']['d_wrapper']['upload_image'] = array(
        '#type' => 'textfield',
        '#title' => 'Background image',
        '#default_value' => $bg_image,
        '#states' => array (
            'visible' => array(
                'select[name = background_type]' => array('value' => 'upload')
            )
        )

    );

    $form['options']['design']['background']['background_upload'] = array(
        '#type' => 'file',
        '#title' => 'Upload Background',
        '#description' => 'Upload a new background',
    );
    // Background Image

	$form['options']['design']['background']['d_wrapper']['background_image'] = array(
        '#type' => 'radios',
        '#title' => 'Select a background image:',
        '#default_value' => theme_get_setting('background_image'),
        '#options' => array(
            'bg1' => 'item',
            'bg2' => 'item',
            'bg3' => 'item',
        ),
		'#states' => array (
          'visible' => array(
            'select[name = background_type]' => array('value' => 'image')
          )
        )
    );
    //MULTI COLOR
    $form['options']['design']['color_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Multi Color</h3>',
    );
    $form['options']['design']['color_style']['color_option'] = array(
        '#type' => 'select',
        '#title' => 'Select a Color style:',
        '#default_value' => theme_get_setting('color_option'),
        '#options' => array(
            'blue' => 'Blue',
            'grey' => 'Grey',
            'green' => 'Green',
            'green-yellow' => 'Green Yellow',
            'orange' => 'Orange',
            'orange-red' => 'Orange Red',
            'red' => 'Red',
            'Yellow' => 'Yellow',
            'YellowGreen' => 'Yellow Green',
            'main-color' => 'Default',
            'custom' => 'Custom Color'
        ),
    );
    $form['options']['design']['color_style']['multi_color'] = array(
        '#type' => 'textfield',
        '#title' => 'Select a color:',
        '#default_value' => theme_get_setting('multi_color'),
        '#attributes'           => array(
            'class'             =>  array('form-colorpicker')
        ),
        '#states' => array (
            'visible' => array(
                'select[name = color_option]' => array('value' => 'custom')
            )
        )

    );
    $form['#submit'][] = 'candidate_settings_submit';
}

function candidate_settings_submit($form, &$form_state) {
    // Get the previous value
    $previous = 'public://' . $form['options']['design']['background']['d_wrapper']['upload_image']['#default_value'];
    $file = file_save_upload('background_upload');
    if ($file) {
        $parts = pathinfo($file->filename);
        $destination = 'public://' . $parts['basename'];
        $file->status = FILE_STATUS_PERMANENT;
        if (file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
            $_POST['upload_image'] = $form_state['values']['upload_image'] = $destination;
            if ($destination != $previous) {
                return;
            }
        }
    } else {
        // Avoid error when the form is submitted without specifying a new image
        $_POST['upload_image'] = $form_state['values']['upload_image'] = $previous;
    }
}

?>