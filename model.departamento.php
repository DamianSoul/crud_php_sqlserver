<?php

   class Departamento {

    private $codDepto;
    private $nombreDpto;
    private $ciudad;
    private $director;

    public function Departamento(){

    }

    public function getCodDepto(){
      return $this->codDepto;
    }

    public function getNombreDpto(){
      return $this->nombreDpto;
    }

    public function getCiudad(){
      return $this->ciudad;
    }

    public function getDirector(){
      return $this->director;
    }

    public function setCodDepto($codDepto){
      $this->codDepto = $codDepto;
    }

    public function setNombreDpto($nombreDpto){
      $this->nombreDpto = $nombreDpto;
    }

    public function setCiudad($ciudad){
      $this->ciudad = $ciudad;
    }

    public function setDirector($director){
      $this->director = $director;
    }

    public function save(){
      $codDepto = $this->getCodDepto();
      $nombreDpto = $this->getNombreDpto();
      $ciudad = $this->getCiudad();
      $director = $this->getDirector();

      $conexion = new Conexion();
      $conexion->connect();

      $sql = "SELECT COUNT(*) AS Cantidad FROM Departamento WHERE codDepto = ".$codDepto;
      $result = $conexion->query($sql);
      $r= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);//sqlsrv_fetch_object($result);
      sqlsrv_free_stmt($result);
      echo $r['Cantidad'];

      if ($r['Cantidad']>0){
        $sql = "UPDATE Departamento SET codDepto = ".$codDepto.", nombreDpto = '".$nombreDpto."', ciudad = '".$ciudad."', director = '".$director."' WHERE codDepto = ".$codDepto;
        echo $conexion->query($sql);
      }else{
        $sql = "INSERT INTO Departamento (codDepto,nombreDpto,ciudad,director) VALUES (".$codDepto.", '".$nombreDpto."', '".$ciudad."', '".$director."')";
        echo $conexion->query($sql);
      }
    }

    public function getDepartamentos(){

      $conexion = new Conexion();
      $conexion->connect();

      $sql = "SELECT * FROM Departamento";
      $result = $conexion->query($sql);

      echo '<option value="">-- seleccione --</option>';

      while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
          echo '<option value="'.$row['codDepto'].'">'.$row['nombreDpto'].'</option>';
      }
    }

    public function getDepartamentoById(){
      $codDepto = $this->getCodDepto();

      $conexion = new Conexion();
      $conexion->connect();

      $sql = "SELECT * FROM Departamento WHERE codDepto= ".$codDepto;
      $result = $conexion->query($sql);

      $detailDepto='';
      while($row =sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
        $detailDepto .='{"codDepto":"'.$row['codDepto'].'","nombreDpto":"'.$row['nombreDpto'].'","ciudad":"'.$row['ciudad'].'","director":"'.$row['director'].'"}';
      }
      echo $detailDepto;
    }

    public function delete(){
      $codDepto = $this->getCodDepto();

      $conexion = new Conexion();
      $conexion->connect();

      $sql = "DELETE FROM Departamento WHERE codDepto = ".$codDepto;
      $conexion->query($sql);
      echo "OK";
    }

  }

 ?>
