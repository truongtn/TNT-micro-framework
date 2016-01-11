<?php

function render(){
    $args = func_get_args();
    foreach($args as $value){
        if(!is_array($value)){
            $arg[] = $value;
        }else{
            foreach($value as $key=>$value_temp){
                $value_temp = htmlentities($value_temp);
                $new_value[$key] = $value_temp;
            }
            $arg[] = $new_value;
        } 
    }
    require_once TEMPLATES_PATH.$arg[0];
}
