<?php
// $Id$
/*
 * Copyright © 2012 New Signature
 *
 * This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * You can contact New Signature by electronic mail at labs@newsignature.com -or- by U.S. Postal Service at 1100 H St. NW, Suite 940, Washington, DC 20005.
 */
/** 
 * @file Webform Component information for an address field type 
 */

/**
 * Specify the default properties of a component.
 * 
 * @return
 *   An array defining the default structure of a component.
 */
function _webform_defaults_addressfield() {
  return array (
    'name'      => '',
    'form_key'  => NULL,
    'mandatory' => 0,
    'pid'       => 0,
    'weight'    => 0,
    'extra'     => array (
      'title_display'             => 0,
      'private'                   => FALSE,
      'attributes'                => array (),
      'description'               => '',
      'available_countries'       => array(),
    ),
  );
}

/**
 * Generate the form for editing a component.
 * Create a set of form elements to be displayed on the form for editing this
 * component. Use care naming the form items, as this correlates directly to the
 * database schema. The component "Name" and "Description" fields are added to
 * every component type and are not necessary to specify here (although they
 * may be overridden if desired).
 *
 * @param $component
 *   A Webform component array.
 *
 * @return
 *   An array of form items to be displayed on the edit component page
 */
function _webform_edit_addressfield($component) {
  $form = array ();
  
  $form['extra']['available_countries'] = array(
    '#type' => 'select',
    '#multiple' => TRUE,
    '#title' => t('Available countries'),
    '#description' => t('If no countries are selected, all countries will be available.'),
    '#options' => _addressfield_country_options_list(),
    '#default_value' => $component['extra']['available_countries'],
  );
  return $form;
}

/**
 * Render a Webform component to be part of a form.
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   If editing an existing submission or resuming a draft, this will contain
 *   an array of values to be shown instead of the default in the component
 *   configuration. This value will always be an array, keyed numerically for
 *   each value saved in this field.
 * @param $filter
 *   Whether or not to filter the contents of descriptions and values when
 *   rendering the component. Values need to be unfiltered to be editable by
 *   Form Builder.
 *
 * @see _webform_client_form_add_component()
 */
function _webform_render_addressfield($component, $value = NULL, $filter = TRUE) {
  $element = array (
    '#type'             => 'fieldset',
    '#title'            => $filter ? _webform_filter_xss($component['name']) : $component['name'],
    '#title_display'    => $component['extra']['title_display'] ? $component['extra']['title_display'] : 'before',
    '#attributes'       => $component['extra']['attributes'],
    '#theme_wrappers'   => array ( 'webform_element' ),
    '#description'      => $filter ? _webform_filter_descriptions($component['extra']['description']) : $component['extra']['description'],
    '#required'         => $component['mandatory'],
    '#weight'           => $component['weight'],
    '#translatable'     => array (
      'title',
      'description',
    ),
  );
  
  $available = !empty($component['extra']['available_countries']) ? $component['extra']['available_countries'] : NULL;
    
  // Get the current address
  $address = $component['value'];
  if ( isset($value) ) {
    $address = $value[0];
  }
  if (empty($address)) {
    $address = addressfield_default_values($available);
  }
  
  // Generate the address form.
  $context = array(
    'mode' => 'form',
  );
  $element += addressfield_generate($address, array('address'), array('mode' => 'form'));
  
  if (!empty($available)) {
    $element['country']['#options'] = array_intersect_key($element['country']['#options'], $available);
  }
  unset($element['country']['#element_validate']);
  
  $form_state = array();
  drupal_alter('field_widget_addressfield_standard_form', $element, $form_state, $context); 
  
  return $element;
}

/**
 * Display the result of a submission for a component.
 * The output of this function will be displayed under the "Results" tab then
 * "Submissions". This should output the saved data in some reasonable manner.
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   An array of information containing the submission result, directly
 *   correlating to the webform_submitted_data database table schema.
 * @param $format
 *   Either 'html' or 'text'. Defines the format that the content should be
 *   returned as. Make sure that returned content is run through check_plain()
 *   or other filtering functions when returning HTML.
 *
 * @return
 *   A renderable element containing at the very least these properties:
 *    - #title
 *    - #weight
 *    - #component
 *    - #format
 *    - #value
 *   Webform also uses #theme_wrappers to output the end result to the user,
 *   which will properly format the label and content for use within an e-mail
 *   (such as wrapping the text) or as HTML (ensuring consistent output).
 */
function _webform_display_addressfield($component, $value, $format = 'html') {
  return array (
    '#title'          => $component['name'],
    '#weight'         => $component['weight'],
    '#theme'          => $format == 'html' ? 'addressfield_formatter' : 'addressfield_formatter__linear',
    '#theme_wrappers' => $format == 'html' ? array ( 'webform_element' ) : array ( 'webform_element_text' ),
    '#post_render'    => array ( 'webform_element_wrapper' ),
    '#component'      => $component,
    '#format'         => $format,
    '#address'        => isset( $value[0] ) ? $value[0] : NULL,
  );
}

/**
 * A hook for changing the input values before saving to the database.
 * Webform expects a component to consist of a single field, or a single array
 * of fields. If you have a component that requires a deeper form tree
 * you must flatten the data into a single array using this callback
 * or by setting #parents on each field to avoid data loss and/or unexpected
 * behavior.
 * Note that Webform will save the result of this function directly into the
 * database.
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   The POST data associated with the user input.
 *
 * @return
 *   An array of values to be saved into the database. Note that this should be
 *   a numerically keyed array.
 */
function _webform_submit_addressfield($component, $value) {
  return array(serialize($value));
}

/**
 * Calculate and returns statistics about results for this component.
 * This takes into account all submissions to this webform. The output of this
 * function will be displayed under the "Results" tab then "Analysis".
 *
 * @param $component
 *   An array of information describing the component, directly correlating to
 *   the webform_component database schema.
 * @param $sids
 *   An optional array of submission IDs (sid). If supplied, the analysis will
 *   be limited to these sids.
 * @param $single
 *   Boolean flag determining if the details about a single component are being
 *   shown. May be used to provided detailed information about a single
 *   component's analysis, such as showing "Other" options within a select list.
 *
 * @return
 *   An array of data rows, each containing a statistic for this component's
 *   submissions.
 */
function _webform_analysis_addressfield($component, $sids = array (), $single = FALSE) {
  // TODO Update this function
  
  // Generate the list of options and questions.
  $query = db_select('webform_submitted_data', 'wsd')
    ->fields('wsd', array ('data'))
    ->condition('nid', $component['nid'])
    ->condition('cid', $component['cid']);
    
  if ( count($sids) ) {
    $query->condition('sid', $sids, 'IN');
  }
  $non_blanks = 0;
  $submissions = 0;
  $results = $query->execute();
  foreach ($results as $row) {
    if ( drupal_strlen(trim($row->data)) > 0 ) {
      $non_blanks++;
    }
    $submissions++;
  }
  $rows[0] = array (
    t('Left Blank'),
    ( $submissions - $non_blanks )
  );
  $rows[1] = array (
    t('User entered value'),
    $non_blanks
  );
  return $rows;
}

/**
 * Return the result of a component value for display in a table.
 * The output of this function will be displayed under the "Results" tab then
 * "Table".
 *
 * @param $component
 *   A Webform component array.
 * @param $value
 *   An array of information containing the submission result, directly
 *   correlating to the webform_submitted_data database schema.
 *
 * @return
 *   Textual output formatted for human reading.
 */
function _webform_table_addressfield($component, $value) {
  if (!empty($value[0])) {
    return theme('addressfield_formatter', array( 'address' => $value[0] ));
  }
  return '';
}

/**
 * Return the header for this component to be displayed in a CSV file.
 * The output of this function will be displayed under the "Results" tab then
 * "Download".
 *
 * @param $component
 *   A Webform component array.
 * @param $export_options
 *   An array of options that may configure export of this field.
 *
 * @return
 *   An array of data to be displayed in the first three rows of a CSV file, not
 *   including either prefixed or trailing commas.
 */
function _webform_csv_headers_addressfield($component, $export_options) {
  $header = array ();
  $header[0] = array('');
  $header[1] = array();
  $header[2] = array($component['name']);
    
  return $header;
}

/**
 * Format the submitted data of a component for CSV downloading.
 * The output of this function will be displayed under the "Results" tab then
 * "Download".
 *
 * @param $component
 *   A Webform component array.
 * @param $export_options
 *   An array of options that may configure export of this field.
 * @param $value
 *   An array of information containing the submission result, directly
 *   correlating to the webform_submitted_data database schema.
 *
 * @return
 *   An array of items to be added to the CSV file. Each value within the array
 *   will be another column within the file. This function is called once for
 *   every row of data.
 */
function _webform_csv_data_addressfield($component, $export_options, $value) {
  if (!empty($value[0])) {
    return theme('addressfield_formatter__linear', array( 'address' => $value[0] ));
  }
  return '';
}