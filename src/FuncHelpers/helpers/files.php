<?php
/**
 * Transforma um formato human readable de tamanho de arquivo em sua precisão em bytes, kbytes, mbytes ....
 * @param  String $str String human readable
 * @param  string $precision precisao da convercao (B, KB|K, MB|M, GB|G, TB|T, EB|E, ZB|Z, YB|Y)
 * @return float 
 */
function filesize_parse($str, $precision="B"){
	$constants = [
		"B"  => 0, ""  => 0,
		"KB" => 1, "K" => 1,
		"MB" => 2, "M" => 2,
		"GB" => 3, "G" => 3,
		"TB" => 4, "T" => 4,
		"PB" => 5, "P" => 5,
		"EB" => 6, "E" => 6,
		"ZB" => 7, "Z" => 7,
		"YB" => 8, "Y" => 8
	];

	$str = Patchwork\Utf8::trim($str);

	$matches = [];
	preg_match("/^(\d+\.\d+|\d+)(GB|KB|B|TB|MB|PB|ZB|YB|K|M|G|T|E|P|Y|Z|)/i", $str, $matches);
	@list(,$size, $mult) = $matches;

	$p=$constants[Str::upper($mult)];
	$precision = $constants[$precision];

	return ($size * pow(2, 10*$p)) / pow(2, 10*$precision);
}

/**
 * Transforma o formato de tamanho de arquivo em bytes para um formato legível por humanos
 * @param  int  $bytes    Tamanho do arquivo em bytes
 * @param  integer $precision Precisão (numero de casas decimais)
 * @return [type]            [description]
 */
function filesize_human($bytes, $precision = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$precision}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}