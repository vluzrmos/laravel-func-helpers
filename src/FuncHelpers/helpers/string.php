<?php

/**
 * Alias to Lang::get
 * @return String [description]
 */
function t() {
  return call_user_func_array("Lang::get", func_get_args());
}

/**
 * Alias to Str::words
 * @param $str
 * @param int $limit
 * @param string $end
 * @see \Illuminate\Support\Str
 * @return mixed
 */
function str_words($str, $limit = 100, $end = '...'){
  return call_user_func_array('Str::words', func_get_args());
}

/**
 * Transforma o nome da classe na sintaxe separada por ponto
 * @param  String|Object $className Nome da classe ou Objeto
 * @return String Nome da classe separada por ponto (separa os nampespaces por ponto)
 */
function class_dotcase($className){
  if(is_object($className)){
    $className = get_class($className);
  }

  $namespaced = array_where(explode('\\',$className), function($i, $v){ return !empty($v); });
  array_walk($namespaced, function(&$value){ $value = lcfirst($value);});

  return implode('.', $namespaced);
}

/**
 * Cria tags &lt;a&gt; para os hiperlinks na string
 * @param $str string contendo hiperlinks
 * @param array $attrs attributos que devem ser adicionados às tags &lt;a&gt;
 * @return mixed
 */
function str_autolink($str, $attrs = []){
  $attrs = array_merge([
    "target" => "_blank",
  ], $attrs);

  return preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\" ".HTML::attributes($attrs).">\\0</a>", $str);
}

/**
 * Verifica se uma dada string é um email
 * @param $str String contendo um email
 * @return bool
 */
function is_email($str){
  return filter_var($str, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Encripta uma string com uma dada key
 * @param $str
 * @return string
 */
function encrypt($str) {
  return Crypt::encrypt($str);
}

/**
 * Decripta uma string
 * @param $str
 * @return string
 */
function decrypt($str) {
  return Crypt::decrypt($str);
}
