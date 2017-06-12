<?php
   $database = "../database/users.db";
   $conn = new PDO("sqlite:" . $database);
   $conn->beginTransaction();
   
   //$conn->commit();
   
   
   ?>
<!DOCTYPE HTML>
<html>
   <title>Current Uploaded User Information</title>
   <meta name="robots" content="noindex, nofollow" />
   <head>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
      <div class="maindiv">
         <div class="divA">
            <div class="title">
               <h2>User Information</h2>
            </div>
            <div class="divB">
               <div class="divD">
                  <p>UserName</p>
                  <hr/>
                  <?php
                     //Establishing Connection with Server
                                        $query = "SELECT username FROM users";
                                       foreach($conn->query($query) as $data) { 
                                           $username = $data["username"]; 
                                           //echo $username;
                                           echo "<b><a href=\"readphp.php?id={$data["username"]}\">{$data["username"]}</a></b>";
                                           echo "<br />";
                                       }
                                       ?>
               </div>
               <?php
                  if (isset($_GET['id'])) {
                      $id = $_GET['id'];
                      $query = "select username, institution, email, fileversion from users where username='$id'";
                      //echo $query;
                      foreach($conn->query($query) as $data) {
                      } 
                    }  
                  ?>

               <div class="form">
                  <h2>---Details---</h2>
                  <hr/>
                  <br><br>
                  <!-- Displaying Data Read From Database -->
                  <span>Name:</span> <?php echo $data["username"]; ?>
                  <br><br>   
                  <span>Institution:</span> <?php echo $data["institution"]; ?>
                  <br><br>       
                  <span>E-mail:</span> <?php echo $data["email"]; ?>
                  <br><br>                
                  <span>Current uploaded file:</span> <?php echo $data["fileversion"]-1; ?>
                  <br><br>                
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <!-- Right Side Advertisement Div---->             
        <!-- <div class="formget"><a href=http://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>-->
         </div>
      </div>
   </body>
</html>
