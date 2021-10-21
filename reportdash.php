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
  <title>Report Dashboard</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>
    <div class="form">
        <h1>Fees Report Dashboard</h1>
      <ul class="tab-group">
          
          <li class="tab "><a href="dashboard.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>          
          <li class="tab"><a href="fees_report4.php">College Report</a></li>
          <li class="tab "><a href="fees_report1.php">Department Wise</a></li>
          <li class="tab "><a href="fees_report2.php">Class Wise</a></li>
          <li class="tab "><a href="fees_report3.php">Class,Department & Divsion wise</a></li>
          <li class="tab "><a href="fees_report.php">Class & Department Wise</a></li>
          <li class="tab "><a href="fees_report5.php">Category Wise</a></li>
          
          
                     
      </ul>

     
    </div><!-- /form -->
 
        <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
  <script src="js/index.js"></script>

</body>
</html>

