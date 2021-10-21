<?php


    if(isset($_POST['submit']))
{
    include('dbcon.php');
    $eroll=$_POST['enroll'];
    $grno=$_POST['gr'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $dept=$_POST['dept'];
    $roll=$_POST['roll'];
    $tfee=$_POST['tfee'];
    $pfee=$_POST['pfee'];
    $rfee=$_POST['rfee'];
    $id=$_POST['sid'];
    $imagename = $_FILES['img']['name'];
    $tempname= $_FILES['img'] ['tmp_name'];
    
    move_uploaded_file($tempname, "dataimg/$imagename");
    
    $qry="UPDATE `student_info` SET `enroll_no` = '$eroll', `name` = '$name', `gr_no` = '$grno', `class` = '$class', `dept` = '$dept', `roll_no` = '$roll', `total_fee` = '$tfee', `paid_fee` = '$pfee', `remain_fee` = '$rfee',`stud_img`='$imagename' WHERE `sr_no` = $id; ";
    
    $run= mysqli_query($con, $qry);
    
    if($run == true)
    {
        ?>
        <script>
            alert('Data updated Successfully.');
            window.open('updateform.php?sid=<?php echo $id;?>','_self');
        </script>
        <?php
    }
    
}

?>

