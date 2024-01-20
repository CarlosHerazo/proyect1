<?php 

class Home extends Controllers{

    public function index()
    {
        $this ->views->getView($this, "index");
    }
}

?>