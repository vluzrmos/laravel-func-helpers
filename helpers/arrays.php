<?php

/**
 * Combina arrays unidimensionais em um array multidimensional com keys
 * @param array $keys Indices dos arrays
 * @param array $data Dados a serem combinados
 * @return array
 */
function array_combine_values_assoc(array $keys, $data = array()){
  $datas = array_slice(func_get_args(), 1);
  $combined = array();

  foreach($datas[0] as $k => $v){
    $combined[] = array_combine($keys, array_column($datas, $k));
  }

  return $combined;
}
