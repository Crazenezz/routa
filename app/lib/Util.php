<?php

namespace app\lib;

class Util {
    
    public function ucname($string) {

        if (strpos($string, '_') !== false || 
                strpos($string, '\\') !== false || 
                strpos($string, '/') !== false) {
            foreach (array('_', '\\', '/') as $delimiter) {
                if (strpos($string, $delimiter) !== false) {

                    $directory = explode($delimiter, $string);
                    $file = ucfirst($directory[count($directory) - 1]);

                    $path = explode($delimiter, $string);
                    $path[count($path) - 1] = $file;

                    $string = implode($delimiter, $path);
                }
            }
        } else {
            $string = ucfirst($string);
        }

        return $string;
    }
}