<?php

/**
 * Class Controller
 */
Class Controller
{
    /**
     * Fonction à appeler lorsqu'on veut passer une vue
     * @param $view : la vue à passer
     * @param array $data : les données qu'on veut passer à la vue
     */
    protected function view($view,$data = [])
    {
        /**
         * si un fichier du nom $view.phtml existe on l'inclu
         * Sinon on signale que la page n'existe pas => 404 error
         */
        if(file_exists("../app/views/". $view .".phtml"))
        {
            include "../app/views/". $view .".phtml";
        }else{
            include "../app/views/404.phtml";
        }
    }

    /**
     * Fonction permettant de charger un modèle
     * @param $model : nom du model à charger
     * @return bool : le model s'il existe. Sinon on retourne false
     */
    protected function loadModel($model)
    {
        if(file_exists("../app/models/". $model .".php"))
        {
            include "../app/models/". $model .".php";
            //on instancie la classe
            return $model = new $model();
        }
        return false;
    }
}


