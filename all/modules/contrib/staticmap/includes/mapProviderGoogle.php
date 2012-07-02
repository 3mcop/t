<?php

class mapProviderGoogle extends mapProviderBase {
  public $api_uri = 'http://maps.google.com/maps/api/staticmap?';

  public function build_params(&$items, &$settings) {    
    $parameters = array(
      'size' => $settings['preset']['mapsize'],
      'maptype' => $settings['preset']['maptype'],
      'markers' => implode('|', $items),
      'sensor' => 'false',
    );
    
    $premier_id = variable_get('staticmap_google_premier', '');
    if ($premier_id) {
      $parameters['client'] = $premier_id;
    }

    return $parameters;
  }
  
  public function preset_form_alter(&$form_state, $preset_data) {
    $form = array();
    
    $form['maptype'] = array(
      '#type' => 'select',
      '#title' => t('Map Type'),
      '#default_value' => (!empty($preset_data['maptype'])) ? $preset_data['maptype'] : '',
      '#options' => array(
        'roadmap' => t('Roadmap'),
        'satellite' => t('Satellite'),
        'hybrid' => t('Hybrid'),
        'terrain' => t('Terrain'),
      ),
    );
    
    return $form;
  }
}