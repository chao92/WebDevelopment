<?php
if(count($_POST)>0) {
   /* Form Required Field Validation */
   foreach($_POST as $key=>$value) {
      if($key == sha1) { continue;}
   if(empty($_POST[$key])) {
   $message_reg = ucwords($key) . " field is required";
   break;
   }
   }
   /* Password Matching Validation */
   if($_POST['password1'] != $_POST['password2']){ 
   $message_reg = 'Passwords should be same<br>'; 
   }

   /* Username Validation */
   $_POST['username'] = trim($_POST['username']);
   if(strlen($_POST['username']) <4 || strlen($_POST['username']) >12){ 
    $message_reg = 'Please check username length<br>'; 
   }
   if(!ctype_alnum($_POST['username'])){
    $message_reg = 'Username only contains the a to z , A to Z, 0 to 9<br>'; 
   }

   /* Name Validation */
   $_POST['FirstName'] = trim($_POST['FirstName']);
   $_POST['LastName'] = trim($_POST['LastName']);
   if(strlen($_POST['FirstName']) < 0){ 
    $message_reg = 'Please check firstname length<br>'; 
   }
   if(strlen($_POST['LastName']) < 0){ 
    $message_reg = 'Please check lastname length<br>'; 
   }
   if(!ctype_alpha($_POST['FirstName']) || !ctype_alpha($_POST['LastName'])){
    $message_reg = 'Firstname and lastname only contains the a to z , A to Z<br>'; 
   }

   //echo "<br> username:".$_POST['username']."<br>";
   
   /* Institution Validation */
   $_POST['Institution'] = trim($_POST['Institution']);
   if(strlen($_POST['Institution']) <2 || strlen($_POST['Institution']) >70){ 
    $message_reg = 'Please check institution length<br>'; 
   }
   if(!ctype_alnum(str_replace(' ','',$_POST['Institution']))){
    $message_reg = 'Institution only contains spaces and the a to z , A to Z, 0 to 9<br>'; 
   }

   /* Country Validation */
   $_POST['Country'] = trim($_POST['Country']);
   if(strlen($_POST['Country']) <0){ 
    $message_reg = 'Please check country length<br>'; 
   }
   if(!ctype_alpha(str_replace(' ','',$_POST['Country']))){
    $message_reg = 'Country only contains spaces and the a to z , A to Z<br>'; 
   }

  
   /* Email Validation */
   if(!isset($message_reg)) {
   if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
   $message_reg = "Invalid UserEmail";
   }
   }

   if(!isset($message_reg)) {
    $_POST["op"] = "register";
      $_POST["sha1"] = $_POST["password1"];
      // replace '' with _ for institution
      $_POST['Institution'] = str_replace(' ', '_', $_POST['Institution']);
      require_once("user.php");
      $USER = new User();
     if($_SESSION["registerSuccess"]){
       $message_reg = "You have registered successfully!"; 
         unset($_POST);
     }else{
       $message_reg = "Error: ". $_SESSION["error_message"]; 
     }
   }
}
?>


<!DOCTYPE html>
<html >
   <head>
      <meta charset="UTF-8">
      <script type="text/javascript" src="js/sha1.js"></script>
      <script type="text/javascript" src="js/user.js"></script>
      <title>Sign-Up/Login Form</title>
      <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="form">
         <div class="tab-content">
            <div id="signup">
               <div class="message"><?php if(isset($message_reg)) echo $message_reg; ?></div>
               <form name="frmRegistration" method="post" action="">
                  <input type="hidden" name="op" value="register"/>
                  <input type="hidden" name="sha1" value=""/>
                  <div class="field-wrap">
                     <label>
                     Username (case sensitive and length between 4 and 12)<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
                  </div>
                 
                     <div class="top-row">
                       <div class="field-wrap">
                         <label>
                           First Name <span class="req">*</span>
                         </label>
                         <input type="text"required autocomplete="off" name="FirstName" value="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>"/>
                       </div>
                     
                       <div class="field-wrap">
                         <label>
                           Last Name <span class="req">*</span>
                         </label>
                         <input type="text"required autocomplete="off" name="LastName" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName']; ?>"/>
                       </div>
                     </div>
                  <div class="field-wrap">
                     <label>
                     Institution (length between 2 and 70)<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="Institution" value="<?php if(isset($_POST['Institution'])) echo $_POST['Institution']; ?>"/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Country <span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="Country" value="<?php if(isset($_POST['Country'])) echo $_POST['Country']; ?>"/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Email Address<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     New Password (case sensitive)<span class="req">*</span>
                     </label>
                     <input type="password"required autocomplete="off" name="password1" value=""/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Password Again (case sensitive)<span class="req">*</span>
                     </label>
                     <input type="password"required autocomplete="off" name="password2"/>
                  </div>
                  <!--<input type="button" class="button button-block" onclick="User.processRegistration()" value="register"/>
                     -->
                  <input type="submit" name="submit" value="Get Started" class="button button-block">
               </form>               
            </div>
            <div id="singin">
               </div>
            
         </div>
         <!-- tab-content -->
      </div>
      <!-- /form -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>
   </body>
</html>