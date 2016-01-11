<?php
function safe_routing($content){
    if(ctype_alnum($content))
        return $content;
    else
        return '';
}
?>