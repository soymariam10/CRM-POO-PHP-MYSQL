<?php
//constantes globales desde php hacia la bd
if(!defined("DB_TYPE")){
    define("DB_TYPE","mysql");//aqui se define el motor de bd
}
if(!defined("DB_HOST")){
    define("DB_HOST","localhost"); //aqui se define el nombre del servidor
}
if(!defined("DB_NAME")){
    define("DB_NAME","campus"); //nombre de la base de datos
}
if(!defined("DB_USER")){
    define("DB_USER","campus"); //nombre del usuario php my admin
}
if(!defined("DB_PASSWORD")){
    define("DB_PASSWORD","campus2023"); //password del usuario de php my admin
}
?>