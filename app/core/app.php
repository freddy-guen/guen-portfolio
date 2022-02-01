<?php

/**
 * Class App
 */
Class App {

    private $controller = "home"; //controlleur par défaut à déclencher
    private $method = "index"; //methode principale à déclencher
    private $params = []; //différents paramètres qu'on pourrait avoir pendant l'appel à index

    /**
     * App constructor.
     */
    public function __construct()
    {
        $url = $this->splitURL();  //on récupère l'url saisie
        //Si un fichier controlleur du même nom existe
        if(file_exists("../app/controllers/". strtolower($url[0]) .".php"))
        {
            //tranformation du premier caractère en majuscule
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }

        require "../app/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //le reste de l'url représente les paramètres
        $this->params = array_values($url);
        //On lance/démarre la classe et la méthode en utilisant
        call_user_func_array([$this->controller ,$this->method], $this->params);
    }

    /**
     * fonction permettant de découper l'URL
     */
    private function splitURL()
    {
        //Si l'url existe on y accède, sinon on envoie vers la page d'accueil
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        //On filtre avec le délémiteur '/'
        return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL);
    }


}
