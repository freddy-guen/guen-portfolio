<?php
//on démarre d'abord la session
session_start();
//on inclue init.php qui permet d'initialiser le coeur de notre application
require "../app/init.php";

//Creation d'une instance de App
$app = new App();
