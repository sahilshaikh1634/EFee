<?php session_start();  ?>
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Report Genration</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>


      <ul class="tab-group">
          <li class="tab "><a href="reportdash.php">Back</a></li>
          <li class="tab "><a href="logout.php">Logout</a></li>          
      </ul>


    
    <div style="overflow-x:auto;">
    <table  align="center" width="80%" border="1" style="margin-top:10px;">
        <tr>
            <th>No</th>
            <th>Enrollment no.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Class</th>
            <th>Total fee</th>
            <th>Fees Paid</th>
            <th>Fees Remaining</th>
        </tr>
        
        
     <?php   
        include('dbcon.php');
        
       $class = $_SESSION["class"];
       $dept = $_SESSION["dept"];
       $div = $_SESSION["div"];
        
        
        $sql="SELECT * FROM `student_info` WHERE `class` LIKE '%$class%' AND `dept` LIKE '%$dept%' AND `division` LIKE '%$div%'";
        $run= mysqli_query($con, $sql);
        
        if(mysqli_num_rows($run)<1)
        {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        else
        {
            $count=0;
            $total=0;
            $paid=0;
            $remain=0;
            while ($data= mysqli_fetch_assoc($run))
            {
                $count++;
                
                ?>
                    <tr>
                        <td><?php echo $count;?></td> 
                        <td><?php echo $data['enroll_no']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['dept']; ?></td>
                        <td><?php echo $data['class']; ?></td>
                        <td><?php echo $data['total_fee']; ?></td>
                        <td><?php echo $data['paid_fee']; ?></td>
                        <td><?php echo $data['remain_fee']; ?></td>
                    </tr>
                     
                    
                <?php
                    $total=$total+$data['total_fee'];
                    $paid=$paid+$data['paid_fee'];
                    $remain=$remain+$data['remain_fee'];
            }

        }
        
 ?>        
    </table>
    </div>
    
    
               
            <h2 style="color:#ffff; weight:bold;">Total fees of class <u><?php echo $class;?></u> , department <u><?php echo $dept;?></u> and Division <u><?php echo $div;?></u> is <u><?php echo $total;?></u> &#x20b9</h2>
            <h2 style="color:#ffff; weight:bold;">Paid fees of class <u><?php echo $class;?></u> , department <u><?php echo $dept;?></u> and Division <u><?php echo $div;?></u> is <u><?php echo $paid;?></u> &#x20b9</h2>
            <h2 style="color:#ffff; weight:bold;">Remaining fees of class <u><?php echo $class;?></u> , department <u><?php echo $dept;?></u> and Division <u><?php echo $div;?></u> is <u><?php echo $remain;?></u> &#x20b9</h2>
          
    
    
    <div>
            <footer>Copyright &copy; E-FEEOfficial</footer>
    </div>
    <script src="js/index.js"></script>

</body>
</html> 












