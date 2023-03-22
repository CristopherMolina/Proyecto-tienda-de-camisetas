<?php

function controllers_autoload($classname) {
    require_once 'controllers/'.$classname.'.php';
}

spl_autoload_register('controllers_autoload');

?>