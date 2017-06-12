<?php
   session_start();
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
    require_once("phpuploader/include_phpuploader.php");
    require_once("user.php");
    $USER = new User();
   
    if ($USER->authenticated) {
      //echo "fileversion is ".$USER->fileversion."<br>";
      //echo "db: ".$USER->database."<br>";
      //echo "login user fileversion ".$USER->fileversion."<br>";
      //echo "Yes";
      //header("Location: main.php");
      /*echo "<script type='text/javascript'>alert ('<?php echo $USER->database; ?>');</script>";*/
$baseFold = "/media/workspace/genomeprivacy_upload/";
$userFoldName = $USER->institution."_".$USER->username;
$userdirectory = $baseFold.$userFoldName;
if(!file_exists($userdirectory))
{
mkdir($userdirectory,0777,true);
}
$_SESSION['time'] = time();
}else{
//echo "No";
//echo $_SESSION["error_message"];
$_SESSION['time'] = time();
header("Location: index.php");
}
/*echo "<script type='text/javascript'>alert('create new user');</script>";*/
?>
<!DOCTYPE html>
<html >
   <head>
      <meta charset="UTF-8">
      <script type="text/javascript" src="js/sha1.js"></script>
      <script type="text/javascript" src="js/user.js"></script>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>

      <title>Main Page</title>
      <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>   
      <div class="form">
         <ul class="tab-group">
            <li class="tab active"><a href="#upload">Upload</a></li>
            <li class="tab"><a href="#setting">Account Info</a></li>
         </ul>
         <div class="tab-content">
            <div id="upload">
               <h1>Hello <?php echo $USER->username; ?>, please select the tasks before uploading and viewing your account information</h1>
               
               <!--<input type="email"required autocomplete="off"/>-->
               <!--<p class="forgot"><a href="#">Forgot Password?</a></p>-->
               <!--<input type="button" class="button button-block" value="Log In"/>
                  -->
               <!-- <p class="forgot"><a>Allowed file types: <font color="red">zip</font></a></p> -->
              
               <form action="validateTask.php" id="validate" method="post">
                  <fieldset>
                     <legend> <a font="white">Tasks:</a></legend>
                     <input type="checkbox" name="task[]" value="1" class="taskselect"> <label2>Privacy-preserving output release</label2> <br> 
                     <input type="checkbox" name="task[]" value="2" class="taskselect"> <label2>Secure multiparty computing</label2><br>
                     <input type="checkbox" name="task[]" value="3" class="taskselect"> <label2>Secure outsourcing</label2><br>
                     
                     <input type="hidden" name="op" value="validateTask"/>
                     <input type="submit" class="button button-block" value="Continue"/>
                  </fieldset>
               </form>
               <script type="text/javascript">
                  
                      //form submit handler
                      $('#validate').submit(function (e) {
                          //check atleat 1 checkbox is checked
                          if (!$('.taskselect').is(':checked')) {
                              //prevent the default form submit if it is not checked
                              e.preventDefault();
                          }
                      })
               
               </script>

<!--
               <div class="field-wrap">
               <p>Select the corresponding tasks:</p>
               <label1><input type="checkbox" name="task" value="Task1" />Privacy-preserving output release</label1> 
               <label1><input type="checkbox" name="task" value="Task2" />Secure multiparty computing</label1>
               <label1><input type="checkbox" name="task" value="Task3" />Secure outsourcing</label1>
               </div>
-->
               
               
               
            </div>

            <div id="setting">
               <h1>Your account information</h1>
               <form action="update.php" id="update" method="post">
                  <input type="hidden" name="op" value="update"/>
                  <input type="hidden" name="sha1" value=""/>
                  <div class="field-wrap">
                     <label1>
                        Username: <?php echo $USER->username; ?>
                     </label1>
                     <input type="text"required autocomplete="off" name="username" value="" readonly="readonly" />
                  </div>
                  <div class="field-wrap">
                     <label1>
                        Institution: <?php echo $USER->institution; ?>
                     </label1>
                     <input type="text"required autocomplete="off" name="Institution" value="" readonly="readonly"/>
                  </div>
                  <div class="field-wrap">
                     <label1>
                        Email Address: <?php echo $USER->email; ?>
                     </label1>
                     <input type="text"required autocomplete="off" name="email" value=""/>
                  </div>
                  <!--<button type="submit" class="button button-block" onclick="User.processUpdate()"/>Update</button> -->
               </form>
            </div>
         </div>
         <!-- tab-content -->
      </div>
      <!-- /form -->
      

   </body>
</html>