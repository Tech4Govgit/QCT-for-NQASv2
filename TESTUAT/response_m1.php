<?php
include('session.php');
include_once("db.php");

if (!empty($_POST["cid"])) {
    $cid = $_POST['cid'];
   //include_once("test.php");
   $fsid = $_SESSION['u_facilityid'];
   $dept_id=$_SESSION['dept_id1'];
   $query="call get_concern_resp6($fsid,$cid,$dept_id)";
      $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
       // echo '<option value="">   </option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['concern_id'] . '">' . $row['concern_name'] . '</option>';
        }
        mysqli_free_result($result);
                           $con->next_result();
    }elseif($result->num_rows==0){
      
        echo  '<option value="0">-Select-</option>';
        
    }
} else {
    print_r($mysqli -> error_list);
}
?>
