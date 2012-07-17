<?php

function localitee_preprocess_search_result( &$variables ) {

  $variables['node_type'] = drupal_html_class( $variables['result']['type'] );

  // This line (when uncommented) shows the variables on-screen in a nice
  // expandable display
  //dsm ( $variables );
}

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

function localitee_preprocess_search_results(&$variables) {

  // define the number of results being shown on a page
  $itemsPerPage = 10;

  // get the current page
  $currentPage = $_REQUEST['page']+1;

  // get the total number of results from the $GLOBALS
  $total = $GLOBALS['pager_total_items'][0];
    
  // perform calculation
  $start = 10*$currentPage-9;
  $end = $itemsPerPage * $currentPage;
  if ($end>$total) $end = $total;
    
  // set this html to the $variables
  $variables['localitee_search_totals'] = "Displaying $start - $end of $total results";

}