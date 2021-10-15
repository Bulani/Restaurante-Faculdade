<?php

namespace Controller;

//use \Model\UsuarioModel;

class HomeController
{

    public function Index()
    {

        $arquivo = "view/HomeView.php";
        include_once("view/IndexView.php");

    } // Index()

}