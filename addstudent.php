<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Add Student</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>
    <div class="form">
      <ul class="tab-group">
          <li class="tab "><a href="dashboard.php">Back</a></li>
          <li class="tab"><a href="logout.php">Logout</a></li>
      </ul>

         <div id="add">   
          <h1>Add Student</h1>
          
          <form action="addstudent.php" method="post" autocomplete="off" enctype="multipart/form-data">
           <h2>Enrollment No.</h2>
            <div class="field-wrap">
                 
               
                <input type="number" required autocomplete="off" name="enroll" placeholder="Enter Enrollment no.*"/>
          </div>
          <h2>GR No.</h2>
          <div class="field-wrap">
              
              <input type="number" required autocomplete="off" name="gr" placeholder="Enter GR no.*"/>
          </div>
 
              <h2>Name</h2>
          <div class="field-wrap">

              <input type="text" required autocomplete="off" name="name" pattern="[A-Za-z]+" placeholder="Enter Name*"/>
          </div>
              
           <h2>Division</h2>
          <div class="field-wrap">
              
                <select name="div" class="tab">
                  <option value="A">A</option>
                  <option value="B">B</option>
                </select>
          </div>
           
           <h2>Category</h2>
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
 
              <h2>Class</h2>
          <div class="field-wrap">
              
                <select name="class" class="tab">
                  <option value="First Year">First Year</option>
                  <option value="Second Year">Second Year</option>
                  <option value="Third Year">Third Year</option>
                </select>
          </div>

              <h2> Department</h2>
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
 
              <h2>Roll No.</h2>
          <div class="field-wrap">

              <input type="number" required autocomplete="off" name="roll" placeholder="Enter Roll no.*"/>
          </div>
 
               <h2>Total Fee</h2>
          <div class="field-wrap">

              <input type="number" required autocomplete="off" name="tfee" placeholder="Enter Total Fees*"/>
          </div>
               <h2>Paid Fee</h2>
          <div class="field-wrap">
              <input type="number" required autocomplete="off" name="pfee" placeholder="Enter Paid Fees*"/>
          </div>


              <h2>Student Image</h2>
          <div class="field-wrap">
              <input type="file" required autocomplete="off" name="img"/>
          </div>

            <button class="button button-block"  input type="submit" name="submit" value="Submit" />Submit</button>
          
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

if(isset($_POST['submit']))
{
    include('dbcon.php');
    $eroll=$_POST['enroll'];
    $grno=$_POST['gr'];
    $name=$_POST['name'];
    $div=$_POST['div'];
    $cat=$_POST['cat'];
    $class=$_POST['class'];
    $dept=$_POST['dept'];
    $roll=$_POST['roll'];
    $tfee=$_POST['tfee'];
    $pfee=$_POST['pfee'];
    $rfee=$_POST['tfee'] - $_POST['pfee'];
    $imagename = $_FILES['img']['name'];
    $tmpname= $_FILES['img'] ['tmp_name'];
    
    move_uploaded_file($tmpname, "dataimg/$imagename");
    
    $qry="INSERT INTO `student_info`(`enroll_no`, `gr_no`, `name`, `class`, `dept`, `roll_no`, `total_fee`, `division`, `cat`, `paid_fee`, `remain_fee`,  `stud_img`) VALUES ('$eroll','$grno','$name','$class','$dept','$roll','$tfee', '$div', '$cat' , '$pfee','$rfee','$imagename')";
    
    $run= mysqli_query($con, $qry);
    
    if($run == true)
    {
        ?>
        <script>
            alert('Data Inserted Successfully.');
        </script>
        <?php
    }
    
}



