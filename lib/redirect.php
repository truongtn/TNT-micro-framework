<?php

function redirect(){
    $arg = func_get_args();
    header('Location: '.$arg[0]);
}
