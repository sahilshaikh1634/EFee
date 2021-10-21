<?php 
/* Main page with two forms: sign up and log in */
    session_start(); 
    
?>
<?php


    if(isset($_POST['submit']))
    {

            $eroll= $_POST['enroll'];

            include ('dbcon.php');

            $_SESSION["a"] = $eroll;
            $sql="SELECT * FROM `student_info` WHERE `enroll_no`='$eroll'";
            $run= mysqli_query($con, $sql);
            
            if(mysqli_num_rows($run)>0)
            {
                header('location: function.php');
            }
            else
            {   ?>
                <script> 
                        alert('No Student Found.');
                      window.open('index.php','_self');
              </script><?php
            }
    }        
 
?>
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2041887309144780",
    enable_page_level_ads: true
  });
</script>
  <title>efee home page</title>
  <link rel="icon" type="image/gif/png" href="efee/efeeandro.png">
  <?php include 'css/css.html'; ?>
</head>

<?php 

?>
<body> 

<?php    include ("menu.php");  ?>

  <div class="form">
       <ul class="tab-group">
        <li class="tab "><a href="login.php">Institute Login</a></li>
      </ul>
      <h1></h1>
          
        <div id="search">   
          <h1>Search Student Info</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          
              <h2>Enrollment No :</h2> 
            <div class="field-wrap">
              <input type="number" required autocomplete="off" name='enroll' placeholder="Enter Enrollment No*"/>
            </div>
        
           
              <button type="submit" class="button button-block" name="submit" value="Search" />Search</button>
          
          </form>

       
        
            </div><!-- tab-content -->
      
        </div> <!-- /form -->
        



        <div>
            <footer>Copyright &copy; e-fee_Official</footer>
        </div>
  

    <script src="js/index.js"></script>

</body>
</html>