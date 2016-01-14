<?php
require_once 'config.php';
require_once 'lib/render.php';
require_once 'lib/redirect.php';
require_once 'lib/validation.php';
require_once 'lib/privilege.php';
require_once 'lib/db.php';
require_once 'lib/random.php';

require_once 'views.php';
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if(isset($_GET['page'])){
    $page = safe_routing($_GET['page']);
    if( function_exists($page."Controller") ){
        eval($page."Controller();");
    }else{
        render('404.html');
    }   
}else{
    render('index.html');
}

    
    
