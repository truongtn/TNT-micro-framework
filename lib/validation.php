<?php
function safe_routing($content){
    if(ctype_alnum($content))
        return $content;
    else
        return '';
}
function csrf(){
    include_once ROOT_PATH.'lib/csrf-magic/csrf-magic.php';
}
?>
