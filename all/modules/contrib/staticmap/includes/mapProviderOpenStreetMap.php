<?php

class mapProviderOpenStreetMap extends mapProviderBase {
  public $api_uri = 'http://ojw.dev.openstreetmap.org/StaticMap/?';

  public function build_params(&$items, &$settings) {    
    $parameters = array(
      'show' => 1,
      'layer' => $settings['preset']['maptype'],
      'z' => 12,
    );

    foreach ($items as $key => $item) {
      // @TODO: This only works with lat/lon points
      $parts = explode(',', $item);
      $parameters['mlat' . $key] = $parts[0];
      $parameters['mlon' . $key] = $parts[1];
      
      if ($key == 0) {
        $parameters['lat'] = $parts[0];
        $parameters['lon'] = $parts[1];
      }
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
        'mapnik' => t('Mapnik'),
        'osmarender' => t('OSMA Render'),
        'cycle' => t('Cycle'),
        'skiing' => t('Skiing'),
        'maplint' => t('Map Lint'),
        'cloudmade_1' => t('Cloudmade 1'),
        'cloudmade_2' => t('Cloudmade 2'),
        'cloudmade_999' => t('Cloudmade 999'),
        'cloudmade_5' => t('Cloudmade 5'),
        'cloudmade_998' => t('Cloudmade 998'),
      ),
    );
    
    return $form;
  }
}