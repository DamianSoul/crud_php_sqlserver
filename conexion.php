<?php
   class Conexion{
    public $host = 'DESKTOP-DG91SSN';
    public $database = "dbPruebaPHP";
    public $user = "sa";
    public $pass = "abcd.1234";
    public $conn;

    public function connect(){
      $connectionInfo = array("Database"=>$this->database,"UID"=>$this->user,"PwD"=>$this->pass);
      $conn = sqlsrv_connect($this->host,$connectionInfo);

      if(!$conn){
        echo "No se pudo conectar";
        die (print_r(sqlsrv_errors,true));
      }
      $this->conn = $conn;
      return  $this->conn;
    }

    public function query($sql){
      $stmt = sqlsrv_query($this->conn,$sql);
      if (!$stmt){
        echo "Error en la ejecucion de la consulta";
        die (print_r(sqlsrv_errors(),true));
      }
      return $stmt;
    }



  }

 ?>
