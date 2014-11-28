<?php

namespace app\lib;

class View {

    public static function show($page, $params = []) {
        $viewFile = PATH_VIEW.$page.'.php';
        
        if (file_exists($viewFile)) {
            extract($params);
            include $viewFile;
        } else {
            include PATH_VIEW.'404.php';
        }
    }
    
    public static function contents($page, $params = []) {
        ob_start();
        $viewFile = PATH_VIEW.$page.'.php';
        if (file_exists($viewFile)) {
            extract($params);
            include $viewFile;
            $contents = ob_get_contents();
        } else {
            include PATH_VIEW.'404.php';
        }
        ob_end_clean();
        
        return $contents;
    }
}
