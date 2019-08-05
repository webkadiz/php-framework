<?php

namespace pl\util;

class Util {
    static function rrmdir($dir) {
        if (is_dir($dir)) { 
            $objects = scandir($dir); 
            foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                     if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); 
                    else unlink($dir."/".$object); 
                } 
            } 
            reset($objects); 
            rmdir($dir); 
       }
    }

    static function dump(...$vars) {
        echo '<pre>';
        foreach($vars as $var) var_dump($var);
        echo '==============================';
        echo '</pre>';
    }

    static function dirname($path) {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    static function basename($path) {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    static function filename($path) {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    static function ext($path) {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    function strtocamel($str) {
	    $strParts = explode('_', $str);
	    $resStr = array_shift($strParts);

	    foreach ($strParts as $strPart) {
		    $resStr .= ucfirst($strPart);
	    }

	    return $resStr;
    }

    function strtounder($str) {
	    $strChars = str_split($str);

	    $index = 0;
	    foreach ($strChars as $char) {
		    if (ctype_upper($char)) {
			    $str = substr($str, 0, $index) . '_' . strtolower($char) . substr($str, $index + 1);
			    $index++;
		    }
		    $index++;
	    }

	    return $str;
    }

}