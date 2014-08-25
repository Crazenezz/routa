<?php
    
    /**
     * Will be trigger, if call 'new class_name'
     *
     * @param string className
    **/
    function loader($className) {
        $className = strtolower($className);
        
        $className = preg_replace('/_/', '-', $className);
        
        $fileName = PATH_BASE . str_replace('\\', 
            DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (!empty($fileName))
            include $fileName;
            
        return null;
    }
    
    spl_autoload_register('loader');
    
?>
