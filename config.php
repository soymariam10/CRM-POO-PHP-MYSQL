//*estas clases para conectarnos a la base de datos con el paradigma OOP*//
//* 
<?php
/*se utiliza la sentencia require para traer las constantes del archivo externo*/
require_once('db.php');
/*aqui se declaran cada uno de los atributos de la clase*/
class Config{
    /*este es un modificador de acceso: existen privados y protected*/
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
//siguen los getter y los setter, aqui es donde se solicita y se muestra la informacion


    //el metodo set o setter: se utiliza para asignarle el valor a una propiedad privada de una clase
        public function setId($id){
        //public function se utiliza para definir un metodo publico en una clase
            $this-> id =$id;
        //id: es el parametro antes mencionado con el que vamos a llamar la proppiedad
        }

  //el valor this se utiliza dentro de un arreglo para hacer referencia al objeto actual, es decir para acceder a las propiedades y metodos dentro de la misma clase
    

    //el metodo get: se utiliza para obtener el valor de una propiedad
        public function getId(){
            return $this->id; //return: del valor del id
        }

        public function setNombres($nombres){
            $this-> nombres = $nombres;
        }
        public function getNombres(){
            return $this->nombres;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function getdireccion(){
            return $this->direccion;
        }

        public function setLogros($logros){ 
            $this-> logros = $logros;
        }
        public function getLogros (){
            return $this-> logros;
        }
// ahora especificamos el guardar o el registro de datos, aqui es donde hacemos la insersion a la tabla campers
        public function inserData(){ 
            try {
                //insert data tiene las declaraciones/sentencias SQL preparada
                //prepare es donde especificamos la consulta inser into
                $stm = $this -> dbCnx -> prepare("INSERT INTO campers (nombres, direccion, logros) values(?,?,?)"); //los values son los parametros que va a recibir
                //this: corresponde al objeto actual y procedemos a llamar la conecion en este caso corresponde a dbcnx por que lo estoy heredando del pdo
                $stm -> execute([$this->nombres, $this->direccion, $this->logros]);

            } catch (Exception $e) {
                return $e -> getMessage();
            }

    }
    
}

?>