<?php

/**
 *  Create a new redirect response to the previous location or default location 
 * @param  String  $default default location
 * @param  integer $status  HTTP Status Code
 * @param  array   $headers Hearders
 * @param  boolean $secure  Default false
 * @return Illuminate\Http\RedirectResponse
 */
function redirectBackOrDefault($default=null,	$status = 302, $headers = array(), $secure=false){
	return Redirect::to(Request::header('referer', $default), $status, $headers, $secure);
}
