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
               <h1>Hello <?php echo $USER->username; ?>, please upload a single ZIP file with detailed instructions and your contact information</h1>
               <div class="field-wrap">
                  <label1>
                     Folder: <?php $currentfoldName = 'V'.$USER->fileversion; 
                        echo $USER->username."_".$currentfoldName;
                        ?>
                  </label1>
                  <?php $_SESSION['upload_status'] = task.FileName + " is uploaded!"; ?>
                  <input type="text"required autocomplete="off" name="fileversion" value="" readonly="readonly" />
                  
               </div>
               <!--<input type="email"required autocomplete="off"/>-->
               <!--<p class="forgot"><a href="#">Forgot Password?</a></p>-->
               <!--<input type="button" class="button button-block" value="Log In"/>
                  -->
               <p class="forgot"><a>Allowed file types: <font color="red">zip</font></a></p>
               <p>
               <fieldset>
               <legend> <a font="white">Tasks:</a></legend>
               <input type="checkbox" name="task1" value="1" > <label2>Privacy-preserving output release</label2> <br> 
               <input type="checkbox" name="task2" value="2" > <label2>Secure multiparty computing</label2><br>
               <input type="checkbox" name="task3" value="3" > <label2>Secure outsourcing</label2><br>
               </fieldset>
               </p>

<!--
               <div class="field-wrap">
               <p>Select the corresponding tasks:</p>
               <label1><input type="checkbox" name="task" value="Task1" />Privacy-preserving output release</label1> 
               <label1><input type="checkbox" name="task" value="Task2" />Secure multiparty computing</label1>
               <label1><input type="checkbox" name="task" value="Task3" />Secure outsourcing</label1>
               </div>
-->
               <script type="text/javascript">
                  $(document).ready(function() {
                     $("button").click(function(){
                     var favorite = [];
                     $.each($("input[name='sport']:checked"), function(){            
                        favorite.push($(this).val());
                     });
                     alert("My favourite sports are: " + favorite.join(", "));
                  });
                  });
               </script>
               
               <h1>       
                  <?php
                     $username = $USER->username;
                     $fileversion = $USER->fileversion;
                     $email = $USER->email;
                     
                     //echo $USER->username."<br>";
                     $uploader=new PhpUploader($username,$fileversion,$email);

                     if(){
                        $uploader->ButtonEnabled=ture;
                     }
                     else{
                        $uploader->ButtonEnabled=false;
                     }
                     
                     $uploader->MultipleFilesUpload=false;
                     $uploader->InsertText="Upload File (Max 4GB)";
                     
                     $uploader->MaxSizeKB=4194304;
                     $uploader->AllowedFileExtensions="zip";
                     //echo $userdirectory."<br>";
                     $arr = array($userdirectory,$currentfoldName);
                     $fullpath = join('/', $arr);
                     //Where'd the files go?
                     $uploader->SaveDirectory=$fullpath;
                     $uploader->Render();
                  ?>
               </h1>
               <script type='text/javascript'>    

                  function CuteWebUI_AjaxUploader_OnTaskComplete(task)
                  {
                    //confirm('is this good');
                    alert(task.FileName + " is uploaded!");                       
                    location.reload();
                  }
               </script>
               <form action="logout.php" id="logout" method="post">
                  <input type="hidden" name="op" value="logout"/>
                  <input type="hidden" name="username"value="<?php echo $USER->username; ?>" />
                  <button class="button button-block"/>Log out</button>
               </form>
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
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>

   </body>
</html>