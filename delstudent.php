<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Delete Student</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>

    <div class="form">
      <ul class="tab-group">
          <li class="tab "><a href="dashboard.php">Back</a></li>
          <li class="tab "><a href="logout.php">Logout</a></li>          
      </ul>

         <div id="login">   
          <h1>Search Student For Delete</h1>
          
          <form action="delstudent.php" method="post" autocomplete="off">
          
            <h2>Enter Enrollment</h2>              
            <div class="field-wrap">
                <input type="number" required autocomplete="off" name="enroll" placeholder="Enter Student Enrollment*"/>
          </div>
          <h2>Enter Name</h2>          
          <div class="field-wrap">
              <input type="text" required autocomplete="off" name="name" placeholder="Enter Student Name*"/>
          </div>
          
          
          
              <button class="button button-block" input type="submit" name="search" value="search" />Search</button>
          
          </form>

        </div> 
    </div><!-- /form -->
    <div style="overflow-x:auto;">
    <table align="center" width="80%" border="1" style="margin-top:10px;" >
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Enrollment no.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Class</th>
            <th>Delete</th>
        </tr>
<?php

    if(isset($_POST['search']))
    {
        include('dbcon.php');
        
        $standerd = $_POST['enroll'];
        $name = $_POST['name'];
        
        
        $sql="SELECT * FROM `student_info` WHERE `enroll_no` LIKE '%$standerd%' AND `name` LIKE '%$name%'";
        $run= mysqli_query($con, $sql);
        
        if(mysqli_num_rows($run)<1)
        {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        else
        {
            $count=0;
            while ($data= mysqli_fetch_assoc($run))
            {
                $count++;
                ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><img src="dataimg/<?php echo $data['stud_img']; ?>" style="max-width: 100px"/></td>
                        <td><?php echo $data['enroll_no']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['dept']; ?></td>
                        <td><?php echo $data['class']; ?></td>
                        <td><a href="delform.php?sid=<?php echo $data['sr_no'];?>">Delete</a></td>
                    </tr>     
                <?php
            }
        }
        }
 ?>        
    </table>
    </div>
        <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
        </div>
    <script src="js/index.js"></script>

</body>
</html>





