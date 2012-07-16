<?php

function localitee_preprocess_loc_popup_overlay() {
  drupal_add_js(
    'jQuery(document).ready(function(){ jQuery("#frontModal").modal({keyboard:false}) });',
    array('type' => 'inline', 'scope' => 'footer')
  );
}

function localitee_preprocess_page(){
	drupal_add_js(drupal_get_path('theme', 'localitee') . '/js/bootstrap.js');	
	drupal_add_js(drupal_get_path('theme', 'localitee') . '/js/system.js');	
}

function localitee_form_user_login_block_alter(&$form, &$form_state) {
	
	dsm($form);
}