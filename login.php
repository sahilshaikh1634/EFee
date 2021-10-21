<?php
    session_start();
  if(isset($_SESSION['uid']))
    {
       header('location: dashboard.php');
    }
?>  
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Institute Login</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    
<?php    include ("menu.php");  ?>
    
    <div class="form">
      <ul class="tab-group">
          <li class="tab "><a href="index.php">Back</a></li>
      </ul>

         <div id="login">   
          <h1>Institute Login</h1>
          
          <form action="login.php" method="post" autocomplete="off">
          
            <h2>Username :</h2>              
            <div class="field-wrap">
            <input type="text" required autocomplete="off" name="usern" placeholder="Enter Username*"/>
          </div>
          <h2>Password :</h2>          
          <div class="field-wrap">
            <input type="password" required autocomplete="off" name="pass" placeholder="Enter Password*"/>
          </div>
          
          
          
              <button class="button button-block" input type="submit" name="login" value="login" />Log In</button>
          
          </form>

        </div> 
    </div><!-- /form -->
 
        <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
    <script src="js/index.js"></script>

</body>
</html>
<?php 
 
 include('dbcon.php');

 if(isset($_POST['login']))
 {
     $username = $_POST['usern'];
     $password = $_POST['pass'];
     
     $qry ="SELECT * FROM `insti_login` WHERE `uname`='$username' AND `password`='$password';";
     $run = mysqli_query($con , $qry);
     $row = mysqli_num_rows($run);
     if($row <1)
     {
         ?>

         <script>
             
             alert('Username or Password not match !');
             window.open('login.php','_self');
             
         </script>
             <?php
     }
     else 
     {
         $data= mysqli_fetch_assoc($run);
         
         $id=$data['id'];
         
         //session_start();
         
         $_SESSION['uid']=$id;
         //header('location: dashboard.php');
         
         
     }
     
 }
