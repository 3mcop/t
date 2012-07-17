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

function localitee_form_user_login_alter(&$form, &$form_state) {
  $form['actions']['submit']['#attributes'] =
    array( 'class' => array( 'btn', 'btn-success' ) );
}

function localitee_page_alter() {
  if ( drupal_is_front_page() ) {
    drupal_set_title('');
  }
}
