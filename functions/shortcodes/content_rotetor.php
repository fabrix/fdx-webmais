<?php
// **************************************************************************
// Content Rotetor:     [~[aaaaa;bbbb;cccc;dddd]~]
// **************************************************************************

add_filter('the_content','exec_spin');
function spinParse($pos, &$data) {
	$startPos = $pos;
	global $startChar, $endChar, $divideChar;
 	while ($pos++ < strlen($data)) {
 		if (substr($data, $pos, strlen($startChar)) == $startChar) {
			spinParse($pos, $data);
		} elseif (substr($data, $pos, strlen($endChar)) == $endChar) {
			$entirespinner = substr($data, $startPos+strlen($startChar), ($pos - $startPos)-strlen($endChar));
			$data = str_replace($startChar.$entirespinner.$endChar,spinProcess($entirespinner),$data);
			$pos = -1;
		}
	}
	return $data;
}
function spinProcess($input) {
	global $divideChar;
	$txt = split($divideChar,$input);
	$selection = $txt[mt_rand(0,count($txt)-1)];
	return $selection;
}
function exec_spin($text) {
	global $startChar, $endChar, $divideChar;
  $startChar = '[~[';
  $endChar =  ']~]';
  $divideChar =  ';';
return spinParse(-1, $text);
}
?>