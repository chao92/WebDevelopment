<?php
      //$database = "./database/users.db";
/*
      $database = "./phpuploader/../database/users.db";
      $conn = new PDO("sqlite:" . $database);
      $conn->beginTransaction();
      //$currentVersion = $USER->fileversion;
      $currentVersion = 1;
      echo "fileversion is: ".$currentVersion."<br>";
      $update = "select users SET fileversion = '$currentVersion' WHERE username= 'test'";
      echo $update;
      $conn->exec($update);
      $conn->commit();
*/
      ini_set("display_errors", 1);
      ini_set("error_reporting", E_ALL | E_STRICT);
      
      $database = "./database/users.db";
      $conn = new PDO("sqlite:" . $database);
      $conn->beginTransaction();
      $insert = "INSERT INTO users (username, firstname, lastname, email, password, token, role, active, last, institution, country, fileversion) ";
      $insert .= "VALUES ('COMSYS', '', '', 'jens.hiller@comsys.rwth-aachen.de', 'COMSYS-rfc2016-iDASH', '2f90b74ef0f67bdcb719d5cea486d89d', 'user', 'true', '" . time() . "','Communication_and_Distributed_Systems_____RWTH_Aachen_University', 'Germany', 1) ";
      $conn->exec($insert);
      $conn->commit();
?>