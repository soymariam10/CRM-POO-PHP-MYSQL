<?php
//este es el modulo que procesa el borrado con el boton borrar


require_once("config.php");

$record = new Config();
//isset para confirmar si el parametro existe, llamado id
if(isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req']=="delete"){
        $record -> setId($_GET['id']);
        $record -> delete();
        echo"<script>alert('Dato borrado satisfactoriamente');document.location='estudiantes.php'</script>";
        }   
    }

?>