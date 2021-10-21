<?php
    include ('dbcon.php');
    
    $sid = $_GET['sid'];
    
    $sql="SELECT * FROM `student_info` WHERE `sr_no` = '$sid';";
    $run = mysqli_query($con, $sql);
    
    $data= mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Update Student</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
      <ul class="tab-group">
          <li class="tab "><a href="dashboard.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>
      </ul>

         <div id="add">   
          <h1>Update Student Info</h1>
          
          <form action="updatedata.php" method="post"  enctype="multipart/form-data">
           <h3>Enrollment No.</h3>
            <div class="field-wrap">
                 
               
                <input type="number" required  name="enroll" value=<?php echo $data['enroll_no'];?>>
          </div>
          <h3>GR No.</h3>
          <div class="field-wrap">
              
              <input type="number" required  name="gr" value=<?php echo $data['gr_no'];?> >
          </div>
 
              <h3>Name</h3>
          <div class="field-wrap">

              <input type="text" required  name="name" value="<?php echo $data['name'];?>"value = \"\" >
          </div>
 
              <h3>Class</h3>
          <div class="field-wrap">
              
              
                <select name="class" class="tab">
                  <option value="<?php $data['class'];?>" selected> <?php echo $data['class'] ?></option>
                  <option value="First Year">First Year</option>
                  <option value="Second Year">Second Year</option>
                  <option value="Third Year">Third Year</option>
                </select>
          </div>

              <h3> Department</h3>
          <div class="field-wrap">
              
                <select name="dept" class="tab" >
                  <option value="<?php $data['dept'];?>" selected> <?php echo $data['dept'] ?></option> 
                  <option value="Machanical Engineering">Machanical Engineering</option>
                  <option value="Computer Technology">Computer Technology</option>
                  <option value="E&TC Engineering">E&TC Engineering</option>
                  <option value="Civil Engineering">Civil Engineering</option>
                </select>
          </div> 
 
              <h3>Roll No.</h3>
          <div class="field-wrap">

              <input type="number" required  name="roll" value= <?php echo $data['roll_no'];?>>
          </div>
 
               <h3>Total Fee</h3>
          <div class="field-wrap">

              <input type="number" required  name="tfee" value= <?php echo $data['total_fee'];?>>
          </div>
               <h3>Paid Fee</h3>
          <div class="field-wrap">
              <input type="number" required  name="pfee" value= <?php echo $data['paid_fee'];?> >
          </div>
 
               <h3>Remaining Fee</h3>
          <div class="field-wrap">
              <input type="number" required  name="rfee" value= <?php echo $data['remain_fee'];?>>
          </div>

              <h3>Student Image</h3>
          <div class="field-wrap">
              <input type="file" required  name="img" />
          </div>
             
             <input type="hidden" required  name="sid" value=<?php echo $data['sr_no']; ?> />
               
            <button class="button button-block"  input type="submit" name="submit" value="Submit" >Update</button>
          
          </form>

        </div> 
    </div><!-- /form -->
 

    <script src="js/index.js"></script>

</body>
</html>
