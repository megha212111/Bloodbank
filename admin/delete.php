<?php
 include("../connection.php");
 $id = $_GET['id'];

 $query="DELETE FROM donordata WHERE id='$id'";

 $data = mysqli_query($conn,$query);

 if($data){
    echo "<script>alert('Delete Successful')</script>";
?>
         <meta http-equiv ="refresh" content ="0;url=http://localhost/bloodbank/admin/donordata.php"/>
<?php
 }
 else{
    echo "<script>alert('Fail to Delete')</script>";
 }
?>