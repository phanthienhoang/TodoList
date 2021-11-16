<?php

    //************************************
    // Description: setting directory structure
    //************************************
    define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR);
    define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
    define('VIEW', APP . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
    define('MODEL', APP . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR);
    define('CORE', APP . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
    define('CONTROLLER', APP . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR);

    // define('PUBLIC' , ROOT . 'public' . DIRECTORY_SEPARATOR );
    // define('IMAGES' , ROOT . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR);

    $modules = [ROOT, APP, CORE, MODEL, CONTROLLER];
    set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
    // autoloading
    spl_autoload_register('spl_autoload', false);
    // run application
    new Application;
