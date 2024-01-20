<?php 
    spl_autoload_register(function($class){
        if(file_exists("Config/App/".$class.".php")){
            require "Config/App/".$class.".php";
        }
    })

?>