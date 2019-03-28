<?php
    include_once 'config.php';
    include_once 'core/Controller.php';
    include_once 'core/View.php';
    include_once 'core/Model.php';
    include_once 'core/Router.php';
    session_start();
    // $_SESSION['login'] = 'den';
    // session_destroy();
    router::init();