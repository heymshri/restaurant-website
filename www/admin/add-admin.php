<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>

        <?php 
        if(isset($_SESSION['add']))  //checking the session is set or not
        {
            echo $_SESSION['add'];  //displaying session message if set
            unset($_SESSION['add']);  //removeing session message 
        }
        ?>
        <br><br><br>



        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>User Name:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>


        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//process the value from Form and save it into database
//check whether the button is clicked or not
if (isset($_POST['submit'])) {
    //button clicked

    //get data from Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with md5- its an one way encryption

    //sql query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

    //executing query and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //check whether the data is inserted or not and display appropriate message
    if($res==TRUE)
    {
        //data inserted
        //echo "Data inserted";
        //create a session variable to display message
        $_SESSION['add']="<div class='success'>Admin Added Sucessfully</div>";

        //Redirect page manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //failed to insert data
        //echo"failed to insert data";
        //create a session variable to display message
        $_SESSION['add']="<div class='error'>Failed to Added Admin</div>";

        //Redirect page Add admin
        header("location:".SITEURL.'admin/add-admin.php');
    }

}

?>