<?php

session_start();
         
         if(isset($_SESSION['uid']))
         {
             echo "";
         }
         else 
         {
             header('location: login.php');
         }
?>
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Institute Dashboard</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>
    <div class="form">
        <h1>Institute Dashboard</h1>
      <ul class="tab-group">
          <li class="tab "><a href="login.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>          
          <li class="tab "><a href="addstudent.php">Add Student</a></li>
          <li class="tab "><a href="updatestudent.php">Update Student</a></li>
          <li class="tab "><a href="delstudent.php">Delete Student</a></li>
          <li class="tab"><a href="changeps.php">Change Password</a></li> 
          <li class="tab"><a href="reportdash.php">Report Genration</a></li> 
      </ul>

     
    </div><!-- /form -->
 
        <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
  <script src="js/index.js"></script>

</body>
</html>