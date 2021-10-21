<?php session_start(); 
      
    if(isset($_POST['search']))
    {
        $_SESSION["class"] = $_POST['class'];
        $_SESSION["dept"] = $_POST['dept'];
        header('location: fees_report_final.php');
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
    
         <div id="login">   
          <h1>Make Fee Due Report as Class & Department</h1>
    <ul class="tab-group">
          <li class="tab "><a href="reportdash.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>          
              
      </ul>

   <form action="fees_report.php" method="post" autocomplete="off">

     

       
          <h2>Class: </h2>
             
                    <div class="field-wrap">

                           <select name="class" class="tab">
                             <option value="First Year">First Year</option>
                             <option value="Second Year">Second Year</option>
                             <option value="Third Year">Third Year</option>
                           </select>
                     </div>

          <h2>Department: </h2>
               
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
  
        </div>

    
    <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
    <script src="js/index.js"></script>

</body>
</html>






