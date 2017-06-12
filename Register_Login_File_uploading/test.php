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
 
      queryDB();

      initialDB(1);
      function queryDB(){
        $database = "./phpuploader/../database/users.db";
      $conn = new PDO("sqlite:" . $database);
      $conn->beginTransaction();
      echo "fileversion is: ".$currentVersion."<br>";
      $query = "SELECT fileversion FROM users WHERE username = 'test'";
      $currentversion=0;
      foreach($conn->query($query) as $data){
        $currentversion =$data["fileversion"]; 
      }
      echo "currentVersion: ".$currentversion."<br>";
      }

      function initialDB($currentVersion){
        $database = "./phpuploader/../database/users.db";
      $conn = new PDO("sqlite:" . $database);
      $conn->beginTransaction();
      echo "fileversion is: ".$currentVersion."<br>";
      $update = "UPDATE users SET fileversion = '$currentVersion' WHERE username= 'test'";
      echo $update;
      $conn->exec($update);
      $conn->commit();
      }
?>