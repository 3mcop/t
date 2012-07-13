<?php

function localitee_preprocess_loc_popup_overlay() {
  drupal_add_js(
    'jQuery(document).ready(function(){ jQuery("#frontModal").modal({keyboard:false}) });',
    array('type' => 'inline', 'scope' => 'footer')
  );
}
