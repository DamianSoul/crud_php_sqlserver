<?php
  echo "Hola Mundo<br />";
  $serverName = "DESKTOP-DG91SSN";
  $connectionInfo = array("Database"=>"dbPruebaPHP","UID"=>"sa","PwD"=>"abcd.1234");
  $conn = sqlsrv_connect($serverName,$connectionInfo);

  if (!$conn){
    echo "Conexión no se pudo establecer.<br />";
    die (print_r(sqlsrv_errors(),true));
  }

  $sql = "SELECT * FROM Departamento";
  $stmt = sqlsrv_query($conn,$sql);
  if (!$stmt){
    echo "Error en la ejecucion de la colsulta";
    die (print_r(sqlsrv_errors(),true));
  }

  while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
      echo $row['codDepto'].", ".$row['nombreDpto'].", ".$row['ciudad'].", ".$row['director']."<br />";
  }

  echo var_dump($stmt).'<hr />';
  sqlsrv_free_stmt($stmt);

  echo "OK";

  echo var_dump($stmt);
    echo "<pre>";


 ?>
