<?php 

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
function require_helper($helper){
  return require_once __DIR__."/helpers/{$helper}.php";
};

/**
 * Adiciona todos os helpers
 */
function require_all_helpers(){
  foreach(glob(__DIR__."/helpers/*.php") as $helper){
    require_once($helper);
  }
}

require_all_helpers();
