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
  $username = "";
  if ($USER->authenticated) {
    $username = $USER->username;
    //echo "Yes";
    //header("Location: main.php");
    /*echo "<script type='text/javascript'>alert ('<?php echo $USER->username; ?>');</script>";*/
  } else {
    //echo "No";
    header("Location: index.php");
  }
  //echo "<script type='text/javascript'>alert('create new user');</script>";
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
      <li class="tab"><a href="#setting">Setting</a></li>
        
      </ul>
      
      <div class="tab-content">
        <div id="upload">   
          <h1><?php echo $username ?><h1>
          <!--<h1>Upload your file</h1>-->
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
    <!--<input type="button" class="button button-block" value="Log In"/>
          -->
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>      
        <div id="setting">   
          <h1>Setting your account</h1>
          
          <form action="registration.php" id="registration" method="post">

          <input type="hidden" name="op" value="register"/>
          <input type="hidden" name="sha1" value=""/>

          <div class="field-wrap">
            <label>
              UserName<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="username" value=""/>
          </div>

          <div class="field-wrap">
            <label>
              Institution<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="Institution"/>
          </div>

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="FirstName"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="LastName"/>
            </div>
          </div>

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
          <button type="submit" class="button button-block" onclick="User.processRegistration()"/>Update</button>
          
          </form>

        </div>
        
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
  </body>
</html>
