<?php


    $id=$_REQUEST['sid'];
    
    include('dbcon.php');
    
    $qry="DELETE FROM `student_info` WHERE `sr_no`='$id';";
    
    $run= mysqli_query($con, $qry);
    
    if($run == true)
    {
        ?>
        <script>
            alert('Data Deleted Successfully.');
            window.open('delstudent.php?sid=<?php echo $id;?>','_self');
        </script>
        <?php
    }
    

?>

