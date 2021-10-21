<?php
             session_start();
             
                      
                $eroll=$_SESSION["a"];
        
                include ('dbcon.php');
                
                $sql="SELECT * FROM `student_info` WHERE `enroll_no`='$eroll'";
                $run= mysqli_query($con, $sql);
                
                $data= mysqli_fetch_assoc($run);
             
             if(isset($_POST['submit']))
             {
                 if($data['remain_fee']<=0)
                 {
                     echo "<script>alert('Your Fee Is Already Paid.')</script>";
                 }
                 else 
                 {
                     header('location: PayUMoney_form.php');
                 }
             }
             
                  
   


            
            ?>
                    <html>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <head>
                      <title>Student info</title>
                      <?php include 'css/css.html'; ?>
                    </head>
                    <body>
                        <?php    include ("menu.php");  ?>
             
                        <div class="form">

                     <div id="show">   
                      <h1>STUDENT INFOMATION</h1>

                      <form action="function.php" method="post" autocomplete="off" enctype="multipart/form-data">
                          <div class="field-wrap" align="center">
                            <img src="dataimg/<?php echo $data['stud_img']; ?>" style="max-width: 150px"/>
                      </div>  
                       
                       
                       
                       
                      <div class="field-wrap">

                          <h2>Enrollment No. :  <?php echo $data['enroll_no'] ?></h2>
                      </div>
                       
                       
                       
                       
                      <div class="field-wrap">

                          <h2>GR No. :  <?php echo $data['gr_no'] ?></h2>
                      </div>

                      
                       
                      <div class="field-wrap">

                          <h2>Name :   <?php echo $data['name'] ?></h2>
                      </div>

                       
                      <div class="field-wrap">

                          <h2>Class :  <?php echo $data['class'] ?></h2>
                      </div>

                       
                      <div class="field-wrap">

                            <h2> Department :  <?php echo $data['dept'] ?></h2>
                      </div> 

                          
                      <div class="field-wrap">

                          <h2>Roll No. :  <?php echo $data['roll_no'] ?></h2>
                      </div>

                           
                      <div class="field-wrap">

                          <h2>Total Fee :  <?php echo $data['total_fee'] ?></h2>
                      </div>
                           
                      <div class="field-wrap">
                          <h2>Paid Fee :  <?php echo $data['paid_fee'] ?></h2>
                      </div>

                           
                      <div class="field-wrap">
                          <h2>Remaining Fee :  <?php echo $data['remain_fee'] ?></h2>
                      </div>



                        <button class="button button-block"  input type="submit" name="submit" value="submit" />Pay Fees Now</button>

                      </form>

                    </div> 
                </div><!-- /form -->
                
                 <div>
                    <footer>Copyright &copy; e-fee_Official</footer>
                </div>

                <script src="js/index.js"></script>
                
                </body>
                </html>
<?php
     $_SESSION["nam"] = $data['name']; 
     ?>

