<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Change Password</title>
  <?php include 'css/css.html'; ?>
</head>


<body>
<?php    include ("menu.php");  ?>
    
  <div class="form">
       <ul class="tab-group">
           <li class="tab "><a href="dashboard.php">Back</a></li>
      </ul>
      <h1></h1>
          
        <div>   
          <h1>Change Password</h1>
          
          <form action="changeps.php" method="post" autocomplete="off">
          
          
              <h2>Change Password</h2> 
              <div class="field-wrap">
                <input type="password" required autocomplete="off" name='change' placeholder="Enter New Password*"/>
              </div>
        
           
              <button type="submit" class="button button-block" name="submit" value="change" >Change Password</button>
          
          </form>

       
        
            </div><!-- tab-content -->
      
        </div> <!-- /form -->
        
        <div>
            <footer>Copyright &copy; e-fee_Official</footer>
        </div>
 

    <script src="js/index.js"></script>

</body>
</html>

<?php

    if(isset($_POST['submit']))
    {

            $ch= $_POST['change'];

            include ('dbcon.php');

     
    }        
?>
