<?php

namespace app\lib;

class Util {
    
    public function ucname($string) {
        if (strpos($string, '_') !== false || 
            strpos($string, '\\') !== false || 
            strpos($string, '/') !== false ||
            strpos($string, '-') !== false) {
            foreach (array('_', '\\', '/', '-') as $delimiter) {
                if (strpos($string, $delimiter) !== false) {

                    $directory = explode($delimiter, $string);
                    
                    if ($delimiter == '/') {
                        $directory[count($directory) - 1] = ucfirst(
                            $directory[count($directory) - 1]);
                            
                        $file = $directory;
                    } else {
                        $file = $this->ucfirst_r($directory);
                    }
                    
                    $string = implode($delimiter, $file);
                }
            }
        } else {
            $string = ucfirst($string);
        }
        
        return $string;
    }
    
    public function ucfirst_r($strings = array()) {
        foreach($strings as &$string) {
            $string = ucfirst($string);
        }
        
        return $strings;
    }
    
    public function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || 
                (is_array($item) && 
                $this->in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }
}
