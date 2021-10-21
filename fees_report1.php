<?php session_start();  

    if(isset($_POST['search']))
    {
        $_SESSION["dept"] = $_POST['dept'];
        header('location: fees_report_1.php');
    }
    
?>
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Report Genration</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>

    <div class="form">
    
   
          <h1>Make Fee Due Report as Department</h1>
    <ul class="tab-group">
          <li class="tab "><a href="reportdash.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>          
              
      </ul>

   <form action="fees_report1.php" method="post" autocomplete="off">




          <h1 style="font-size: 30px; color: #ffffff">Department: </h1>
    
                    <div class="field-wrap">
                            <select name="dept" class="tab">
                            <option value="Machanical Engineering">Machanical Engineering</option>
                            <option value="Computer Technology">Computer Technology</option>
                            <option value="E&TC Engineering">E&TC Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Information Technology">Information Technology</option>
                          </select>
                    </div> 


            <button class="button button-block" input type="submit" name="search" value="search" />Search</button>


    </form>

   </div> 
  


    
    <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
    <script src="js/index.js"></script>

</body>
</html>






