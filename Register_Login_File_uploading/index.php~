<?php
// This sends a persistent cookie that lasts a day.
session_start();
if (time()>$_SESSION['time']+2){
session_destroy();
session_start();
$_SESSION['time'] = time();
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
         <ul class="tab-group">
            <li class="tab active"><a href="#singin">Log In</a></li>
            <li class="tab "><a href="#signup">Sign Up</a></li>  
         </ul>
         <div class="tab-content">
            <div id="singin">
               <!--<h1><a font="ref">Site is under maintenance, please visit us later</a></h1> -->
               <h1>Welcome to submit your solution by 09/14/2016 </br> Account registration will be closed after 09/7/2016</h1>
               <div class="message"><?php if(isset($_SESSION["error_message"])) echo $_SESSION["error_message"]; ?></div>
               <form action="logintaskselect.php" id="login" method="post">
                  <input type="hidden" name="op" value="login"/>
                  <input type="hidden" name="sha1" value=""/>
                  <div class="field-wrap">
                     <label>
                     Username<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="username" value=""/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Password<span class="req">*</span>
                     </label>
                     <input type="password"required autocomplete="off" name="password1" value=""/>
                  </div>
                  
                  <!--<input type="button" class="button button-block" value="Log In"/>
                     -->
                  <button type="submit" class="button button-block" onclick="User.processLogin()"/>Log In</button>
               </form>

               <div> </br><a class="button button-block" href="http://www.humangenomeprivacy.org/2016/competition-tasks.html"> Return to our competition</a> </div>
            </div>
            <div id="signup" style=" overflow: hidden;">
               <iframe src="reg.php" scrolling="no" style="height: 800px; border: 0px none; width: 600px; margin-top: -60px; margin-left: -40px; "></iframe>
            </div>
         </div>
         <!-- tab-content -->
      </div>
      <!-- /form -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>
   </body>
</html>
