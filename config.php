//*estas clases para conectarnos a la base de datos con el paradigma OOP*//
//* 
<?php
/*se utiliza la sentencia require para traer las constantes del archivo externo*/
require_once('db.php');
/*aqui se declaran cada uno de los atributos de la clase*/
class Config{
    /*este es un modificador de acceso: exciten privados y protected*/
    private $id;//los privados no pueden ser accedidos fuera de la clase 
    private $nombres;
    private $direccion;
    private $logros;
    protected $dbCnx; //solo las clases heredadas pueden acceder a este miembro, restringe el acceso*/
    /*esto es mapear las columnas de la tabla con los atributos de la clase, es lo mismo que hace un orm(laravel)*/

//sigue el constructor, aqui es donde se inicilizan los valores de las propiedades del objeto, en cero o en vacios
    public function __construct($id=0, $nombres="", $direccion="", $logros=""){
        $this->id = $id;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->logros = $logros;
        //PDO: (Php Data Object) es el objeto de datos de php por defecto, todas las conexiones a la base de datos se hacen desde mysqli o pdo.
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.":dbname=".DB_NAME, DB_USER, DB_PASSWORD,[PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC]);
        //este fragmento de cofigo hace referencia: this llama a la instancia la actual de la clase, new: crea una instacia de conexion PDO.
        //lo que está dentro de ()hace referencia a las constantes que explican tipo de bd, servidor,nombre bd,nombre user myadmin,contraseña del user myadmin
        // y lo que está en [] establece el modo de recuperacion de la consulta y lo devuelve como un array asociativo
    }
    
}

?>