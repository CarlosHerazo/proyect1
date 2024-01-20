<?php 

class Views{
    public function getView($controlador, $vista)
    {
        $controlador = get_class($controlador);
        if($controlador == "Home"){
            $vista = "page/".$vista.".php";
        }else{
            $vista = "page/".$controlador."/". $vista.".php";
        }
        require $vista;
    }
}