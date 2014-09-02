<?php

namespace app\lib;

class View {

    public static function show($page) {
        $viewFile = PATH_VIEW.$page.'.php';
        if (file_exists($viewFile))
            include $viewFile;
        else
            include PATH_VIEW.'404.php';
    }
}
?>
