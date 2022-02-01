<?php

/**
 * Class Database
 */
Class Database
{
    /**
     * Fonction permettant de se connecter à la base de données
     * @return PDO
     */
    public function db_connect()
    {
        try{
            $string = DB_TYPE .":host=". DB_HOST .";dbname=". DB_NAME. ";";
            return $db = new PDO($string, DB_USER, DB_PASS);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * Fonction permettant de lire dans la base de données
     * @param $query : la requête à exécuter au niveau de la BD
     * @param array $data : les paramètres de la requête
     * @return array|bool : données à retournées
     */
    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if(count($data) == 0){
            $stm = $DB->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $check = $stm->execute($data);
        }

        if($check)
        {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0)
            {
                return $data;
            }
            return false;
        }else{
            return false;
        }
    }

    /**
     * Fonction permettant d'écrire dans la BD
     * @param $query : requête d'écriture à exécuter
     * @param array $data : les paramètres de la requête
     * @return bool : valeur à retourner
     */
    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if(count($data) == 0){
            $stm = $DB->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $check = $stm->execute($data);
        }

        if($check)
        {
            return true;
        }else{
            return false;
        }
    }
}
