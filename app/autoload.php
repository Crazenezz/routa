<?php
    
    /**
     * Will be trigger, if call 'new class_name'
     *
     * @param string className
    **/
    function loader($className) {
        $className = ucname($className);
        
        $className = preg_replace('/_/', '-', $className);
        
        $fileName = PATH_BASE . str_replace('\\', 
            DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (!empty($fileName))
            include $fileName;
            
        return null;
    }
    
    function ucname($string) {

        foreach (array('_', '\\') as $delimiter) {
            if (strpos($string, $delimiter) !== false) {
            
                $directory = explode($delimiter, $string);
                $file = ucfirst($directory[count($directory) - 1]);
                
                $path = explode($delimiter, $string);
                $path[count($path) - 1] = $file;
                
                $string = implode($delimiter, $path);
            }
        }
        
        return $string;
    }
    
    spl_autoload_register('loader');
    
?>
