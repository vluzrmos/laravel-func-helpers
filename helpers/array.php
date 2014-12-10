<?php

/**
 * Combina arrays unidimensionais em um array multidimensional com keys
 * @param array $keys Indices dos arrays
 * @param array $data Dados a serem combinados
 * @return array
 * @example
 * <code>
 *  $names = array('john', 'willian', 'matheus');
 *  $last_names = array('doel', 'shaks', 'kelvin');
 *  $keys = array('first_name', 'last_name');
 *  print_r(array_combine_values_assoc($keys, $names, $last_names));
 * 
 *  // retornará
 *  [
 *    ["first_name" => "john", "last_name"=>"doel"],
 *    ["first_name" => "willian", "last_name"=>"shaks"],
 *    ["first_name" => "matheus", "last_name"=>"kelvin"]
 *  ]
 * </code>
 */
function array_combine_values_assoc(array $keys, $data = array()){
  $datas = array_slice(func_get_args(), 1);
  $combined = array();

  foreach($datas[0] as $k => $v){
    $combined[] = array_combine($keys, array_column($datas, $k));
  }

  return $combined;
}
