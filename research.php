<?php
    session_start();
?>    
<!DOCTYPE html>
<html>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>get recipt</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <?php    include ("menu.php");  ?>

    <div class="form">
      <ul class="tab-group">
          <li class="tab "><a href="dashboard.php">Back</a></li>      
      </ul>

         <div id="login">   
          <h1>Search Student For Recipt</h1>
          
          <form action="research.php" method="post" autocomplete="off">
          
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
    <table  align="center" width="80%" border="1" style="margin-top:10px;" >
        <tr>
            <th>No</th>
            <th>Enrollment no.</th>
            <th>Name</th>
            <th>Transaction Id</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Get Recipt</th>
        </tr>
<?php

    if(isset($_POST['search']))
    {
        include('dbcon.php');
        
        $standerd = $_POST['enroll'];
        $name = $_POST['name'];
        
        $qry="SELECT * FROM `payment` WHERE `enroll_id` LIKE '%$standerd%' AND `name` LIKE '%$name%'";
        $runn= mysqli_query($con, $qry);
        
        if( mysqli_num_rows($runn)<1)
        {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        else
        {   
            $count=0;
            while ($dataa= mysqli_fetch_assoc($runn))
            {   
                $count++;
                ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $dataa['enroll_id']; ?></td>
                        <td><?php echo $dataa['name']; ?></td>
                        <td><?php echo $dataa['txd_id']; ?></td>
                        <td><?php echo $dataa['amount']; ?></td>
                        <td><?php echo $dataa['date']; ?></td>
                        <td><a href="createpdf2.php?sid=<?php echo $dataa['sr_no'];?>">Get Recipt</a></td>
                    </tr>     
                <?php

            }
        }
        }
 ?>        
    </table>
    </div>
    
    <div>
            <footer>Copyright &copy; E-FEEOfficial |</footer>
        </div>
    <script src="js/index.js"></script>

</body>
</html>


 