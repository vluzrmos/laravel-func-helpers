<?php 

namespace FuncHelpers;

/*
|--------------------------------------------------------------------------
| Application Helpers
|--------------------------------------------------------------------------
|
|
*/

/**
 * Adiciona um helper
 * @param string $helper
 * @return mixed
 */
function load_helper($helper){
  $file = snake_case($helper);
  return require_once __DIR__."/helpers/{$file}.php";
};

/**
 * Adiciona todos os helpers
 */
function load_all_helpers(){
  foreach(glob(__DIR__."/helpers/*.php") as $helper){
    require_once($helper);
  }
}

