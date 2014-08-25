<?php
    
    /**
     * Will be trigger, if call 'new class_name'
     *
     * @param string className
    **/
    function loader($className) {
        $className = preg_replace('/_/', '-', $className);
        
        $fileName = PATH_LIB . str_replace('\\', 
            DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (!file_exists($fileName))
            $fileName = controller_checker($className);
        
        if (!empty($fileName))
            include $fileName;
            
        return null;
    }
    
    /**
     * If file doesn't exist on PATH_LIB, check on PATH_CONTROLLER
     *
     * @param string fileName
    **/
    function controller_checker($fileName) {
        $fileName = PATH_CONTROLLER . str_replace('\\', 
            DIRECTORY_SEPARATOR, $fileName) . '.php';
        
        if (file_exists($fileName))
            return $fileName;
            
        return null;
    }
    
    spl_autoload_register('loader');
    
?>
