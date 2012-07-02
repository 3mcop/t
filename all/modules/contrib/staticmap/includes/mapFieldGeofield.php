<?php

class mapFieldGeofield extends mapFieldBase {
  public function provide_geodata(&$items) {
    $return = array();
    foreach ($items as $item) {
      $return[] = $item['lat'] . ', ' . $item['lon'];
    }
    
    return $return;
  }
}