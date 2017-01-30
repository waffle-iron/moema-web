<?php

ini_set('default_charset','UTF-8');
date_default_timezone_set('America/Sao_Paulo');

set_error_handler("error_handler", E_ALL);

function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

?>