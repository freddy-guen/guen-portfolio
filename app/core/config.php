<?php

//Le titre du site
define('WEBSITE_TITLE', "Freddy Guen");

//Variables pour la connexion à la base de données
define('DB_TYPE','mysql');
define('DB_NAME','deffay_db');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');

/*protocal type http ou https*/
define('PROTOCAL','http');

/*root and asset paths*/
$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "/", $path);

define('ROOT', str_replace("app/core", "public", $path));  //racine contenant le dossier public
define('ASSETS', str_replace("app/core", "public/assets", $path)); //assets contenant le dossier assets

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/
/**
 * A true pour permettre le rapport d'erreurs
 * A false lorsqu'on met le site en ligne => on arrête les rapports d'erreurs
 */
define('DEBUG',true);

if(DEBUG)
{
    ini_set("display_errors",1);
}else{
    ini_set("display_errors",0);
}
