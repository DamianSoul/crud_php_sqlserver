<?php
  include('conexion.php');

  $conexion = new Conexion();
  $conexion->connect();

  $action = $_POST['action'];


  switch ($action) {
    case 'Guardar':
      $codDepto = $_POST['codDepto'];
      $nombreDpto = $_POST['nombreDepto'];
      $ciudad = $_POST['ciudad'];
      $director = $_POST['director'];
      saveDepartamento($conexion,$codDepto,$nombreDpto,$ciudad,$director);
      break;
    case 'Buscar':
      getDepartamentos($conexion);
      break;
    case 'BuscarID':
        $codDepto = $_POST['codDepto'];
        getDepartamentoById($conexion,$codDepto);
        break;
    case 'Borrar':
      $codDepto = $_POST['codDepto'];
      deleteDepartamento($conexion,$codDepto);
      break;
    default:
      // code...
      break;
  }

  //saveDepartamento($conexion,$codDepto,$nombreDpto,$ciudad,$director);

  function saveDepartamento($conexion,$codDepto,$nombreDpto,$ciudad,$director){
    $sql = "SELECT COUNT(*) AS Cantidad FROM Departamento WHERE codDepto = ".$codDepto;
    $result = $conexion->query($sql);
    $r= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);//sqlsrv_fetch_object($result);
    sqlsrv_free_stmt($result);
    echo $r['Cantidad'];
    //die();
    if ($r['Cantidad']>0){

      $sql = "UPDATE Departamento SET codDepto = ".$codDepto.", nombreDpto = '".$nombreDpto."', ciudad = '".$ciudad."', director = '".$director."' WHERE codDepto = ".$codDepto;
      $result = $conexion->query($sql);
      echo var_dump($result);

    }else{
      $sql = "INSERT INTO Departamento (codDepto,nombreDpto,ciudad,director) VALUES ('".$codDepto."', '".$nombreDpto."', '".$ciudad."', '".$director."')";
      $result = $conexion->query($sql);
      echo var_dump($result);

    }

  }

  function deleteDepartamento($conexion,$codDepto){
    $sql = "DELETE FROM Departamento WHERE codDepto = ".$codDepto;
    $result = $conexion->query($sql);
    echo "OK";
  }

  function getDepartamentos($conexion){
    $sql = "SELECT * FROM Departamento";
    $result = $conexion->query($sql);

    echo '<option value="">-- seleccione --</option>';

    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
        echo '<option value="'.$row['codDepto'].'">'.$row['nombreDpto'].'</option>';
    }
  }

  function getDepartamentoById($conexion,$codDepto){
    $sql = "SELECT * FROM Departamento WHERE codDepto= ".$codDepto;
    $result = $conexion->query($sql);

    $detailDepto='';
    while($row =sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
      $detailDepto .='{"codDepto":"'.$row['codDepto'].'","nombreDpto":"'.$row['nombreDpto'].'","ciudad":"'.$row['ciudad'].'","director":"'.$row['director'].'"}';
    }
    echo $detailDepto;
  }

  function editDepartamento($id){

  }
 ?>
