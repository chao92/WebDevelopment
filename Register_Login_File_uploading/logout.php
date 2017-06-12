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

      if (!$USER->authenticated) {
      //echo "db: ".$USER->database."<br>";
      //echo "login user fileversion ".$USER->fileversion."<br>";
      //echo "Yes";
      //header("Location: main.php");
            header("Location: index.php");
      /*echo "<script type='text/javascript'>alert ('<?php echo $USER->database; ?>');</script>";*/
      }   
?>