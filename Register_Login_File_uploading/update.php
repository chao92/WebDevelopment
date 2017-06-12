<?php
      ini_set("display_errors", 1);
      ini_set("error_reporting", E_ALL | E_STRICT);

      // create new user
/*
      $username = $_POST["userName"]
      $institution = $_POST["Institution"]
      $firstName = $_POST["FirstName"]
      $lastName = $_POST["LastName"]
      $password = $_POST["Password"]
*/
      require_once("user.php");
      $USER = new User();
      if($_SESSION["updateSuccess"]){
            echo "success";
            print('<a href="http://upload.ucsd-dbmi.org/"> Log in</a>');
      }else{
            echo "fail"."<br>";
            print('<a href="http://upload.ucsd-dbmi.org/"> Back </a>');
      }
      
?>