<?php session_start(); 

    if(isset($_POST['search']))
    {
        $_SESSION["class"] = $_POST['class'];
        header('location: fees_report_2.php');
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
    
   
          <h1>Make Fee Due Report As Class</h1>
      <ul class="tab-group">
          <li class="tab "><a href="reportdash.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>          
              
      </ul>

   <form action="fees_report2.php" method="post" autocomplete="off">




          <h1 style="font-size: 30px; color: #ffffff">Class: </h1>
    
                    <div class="field-wrap">

                           <select name="class" class="tab">
                             <option value="First Year">First Year</option>
                             <option value="Second Year">Second Year</option>
                             <option value="Third Year">Third Year</option>
                           </select>
                     </div> 


            <button class="button button-block" input type="submit" name="search" value="search" />Search</button>


    </form>

   </div> 
  


<?php


 ?>
    
    <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
    <script src="js/index.js"></script>

</body>
</html>






