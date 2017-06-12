<?php
  // ini_set("display_errors", 1);
  // ini_set("error_reporting", E_ALL | E_STRICT);
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
      <table border="2">
         <thead>
            <tr>
               <th>UserName</th>
               <th>Name</th>
               <th>Institution</th>
               <th>Country</th>
               <th>Email</th>
               <th>Uploaded files count</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $query = "select username, firstname, lastname, institution, country, email, fileversion from users";
               //echo $query;
               foreach($conn->query($query) as $data) {
                  if (empty($data["firstname"])) {
                    $data["firstname"]="unknow";
                  }
                  if (empty($data["lastname"])) {
                    $data["lastname"]="unknow";
                  }
                  echo "<tr><td>{$data['username']}</td><td>{$data['firstname']}</td><td>{$data['institution']}</td><td>{$data['country']}</td><td>{$data['email']}</td><td>{$data['fileversion']}</td></tr>\n";
                 
               } 
               
               ?>
         </tbody>
      </table>
   </body>
</html>
