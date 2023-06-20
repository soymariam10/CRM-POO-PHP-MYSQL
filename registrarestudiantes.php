<?php
//isset: se utiliza para verificar si una variable esta definida y si tiene un valor asignado
//este es un array asociativo, ya que tiene varios elementos
if(isset($_POST['guardar'])){
    //require_once: se utiliza para incluir y ejecutar un archivo y que solo se incluya una vez
    require_once("config.php");
    //ua vez tengamos nuestra clase debemos instanciar esa clase, crear un objeto de tipo config
    $config = new Config();
    //este es un objeto de tipo configuracion de la bd, metodos y recursos, una vez tenemos la instancia procedemos a apalancar en setter para modificar
    $config -> setNombres($_POST['nombres']);
    $config -> setDireccion($_POST['direccion']);
    $config -> setLogros($_POST['logros']);

    $config->insertData();

    echo"<script> alert('Los datos fueron guardados satisfactoriamente');document.location='estudiantes.php'</script>";
    }
?>