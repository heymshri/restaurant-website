<?php 

//include constants.php file
include('../config/constants.php');

//get id of admin to be deleted
$id=$_GET['id'];

//create sql query to delete admin
$sql="DELETE FROM tbl_admin WHERE id=$id";

//exectute the query
$res=mysqli_query($conn,$sql);

//check whether the query executed or not
if($res==TRUE){
    //query executed and admin deleted
    //echo "Admin deleted";

    //create session variable to display message
    $_SESSION['delete']="<div class='sucess'>Admin Deleted</div>";

    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //failed to delete
    $_SESSION['delete']="<div class='error'Failed to Delete Admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}

//redirect to manage admin page with message(sucess/error)

?>