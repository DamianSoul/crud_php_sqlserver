<?php
private function connect ($DATABASE_NAME,$IP,$PUERTO,$USER,$PASS){

      $connectionString = 'ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE='.$DATABASE_NAME.';HOSTNAME='.$IP.';PORT='.$PUERTO.';PROTOCOL=TCPIP;';

      try {
          $db = new PDO($connectionString, $USER, $PASS);


      } catch (PDOException $e) {
        echo 'Fallo la conexion: ' . $e->getMessage();
      }
      return $db;
  }
?>
