<?php
  include('conexion.php');
  include('model.departamento.php');

  $conexion = new Conexion();
  $conexion->connect();

  $action = $_POST['action'];

  $departamento = new Departamento();

  switch ($action) {
    case 'Guardar':
      $departamento->setCodDepto($_POST['codDepto']);
      $departamento->setNombreDpto($_POST['nombreDepto']);
      $departamento->setCiudad($_POST['ciudad']);
      $departamento->setDirector($_POST['director']);
      $departamento->save();
      break;
    case 'Buscar':
      $departamento->getDepartamentos();
      break;
    case 'BuscarID':
        $departamento->setCodDepto($_POST['codDepto']);
        $departamento->getDepartamentoById();
        break;
    case 'Borrar':
      $departamento->setCodDepto($_POST['codDepto']);
      $departamento->delete();
      break;
    default:
      // code...
      break;
  }

 ?>
