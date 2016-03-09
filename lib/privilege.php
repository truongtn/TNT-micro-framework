 <?php
function require_access($level){
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
    if(@(int)$_SESSION['role']>=$level){
        return 0;
    }else{
        die('403');
    }
}
function set_role($level){
    $_SESSION['role'] = $level;
    return 0;
}
