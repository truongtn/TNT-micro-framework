<?php
function require_access($number){
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
    if(@(int)$_SESSION['role']>=$number){
        return 0;
    }else{
        die('403');
    }
}
