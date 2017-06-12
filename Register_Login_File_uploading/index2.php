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
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#singin">Log In</a></li>
            
         </ul>
         <div class="tab-content">
            <div id="signup">
               <h1>Sign Up for Free</h1>
               <form action="registration.php" id="registration" method="post">
                  <input type="hidden" name="op" value="register"/>
                  <input type="hidden" name="sha1" value=""/>
                  <div class="field-wrap">
                     <label>
                     UserName<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Institution<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="Institution" value=""/>
                  </div>
                  <!--
                     <div class="top-row">
                       <div class="field-wrap">
                         <label>
                           First Name
                         </label>
                         <input type="text"required autocomplete="off" name="FirstName"/>
                       </div>
                     
                       <div class="field-wrap">
                         <label>
                           Last Name
                         </label>
                         <input type="text"required autocomplete="off" name="LastName"/>
                       </div>
                     </div>
                     -->
                  <div class="field-wrap">
                     <label>
                     Email Address<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="email" value=""/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     New Password<span class="req">*</span>
                     </label>
                     <input type="password"required autocomplete="off" name="password1" value=""/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Password again<span class="req">*</span>
                     </label>
                     <input type="password"required autocomplete="off" name="password2"/>
                  </div>
                  <!--<input type="button" class="button button-block" onclick="User.processRegistration()" value="register"/>
                     -->
                  <button type="submit" class="button button-block" onclick="User.processRegistration()"/>Get Started</button>
               </form>
            </div>
            <div id="singin">
               <h1>Welcome Back!</h1>
               <form action="login.php" id="login" method="post">
                  <input type="hidden" name="op" value="login"/>
                  <input type="hidden" name="sha1" value=""/>
                  <div class="field-wrap">
                     <label>
                     UserName<span class="req">*</span>
                     </label>
                     <input type="text"required autocomplete="off" name="username" value=""/>
                  </div>
                  <div class="field-wrap">
                     <label>
                     Password<span class="req">*</span>
                     </label>
                     <input type="password"required autocomplete="off" name="password1" value=""/>
                  </div>
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  <!--<input type="button" class="button button-block" value="Log In"/>
                     -->
                  <button type="submit" class="button button-block" onclick="User.processLogin()"/>Log In</button>
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