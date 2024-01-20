<?php 

class Controllers{


    public function __construct()
    {
        $this ->views = new Views();
        $this -> cargarModel();
    }


    public function cargarModel()
    {
        $model = get_class($this)."Model";
        $ruta = "model/".$model.".php";
        if(file_exists($ruta)){
            require $ruta;
            $this->$model = new $model();
        }
    }

}


?>