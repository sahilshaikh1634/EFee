<?php session_start();      
    if(isset($_POST['search']))
    {
        $_SESSION["cat"] = $_POST['cat'];
        header('location: fees_report_5.php');
    }?>
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
    
   
          <h1>Make Fee Due Report As Category</h1>
          

   <form action="fees_report5.php" method="post" autocomplete="off">




          <h1 style="font-size: 30px; color: #ffffff">Category: </h1>
    
                   
                   <div class="field-wrap">

                         <select name="cat" class="tab">
                           <option value="OPEN">OPEN</option>
                           <option value="OBC">OBC</option>
                           <option value="SBC">SBC</option>
                           <option value="SC">SC</option>
                           <option value="ST">ST</option>
                           <option value="NT">NT</option>
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







