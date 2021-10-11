<?php
include('config.php');
if (!isset($_COOKIE['email'])) {
    if (!isset($_SESSION['user'])) {
        echo "
                <script>
                    window.location='signin.php';
                </script>
            ";
    }
}

$flag=0;

if(isset($_POST['submit']))
{
    $name=$_POST['fullname'];
    $age=$_POST['age'];
    $height=$_POST['height'];
    $nation=$_POST['nation'];
    $ipl=$_POST['ipl'];
$batting=$_POST['batting'];
$bowling=$_POST['bowling'];
$role=$_POST['role'];
    $address=$_POST['userAddress'];
    
    
    

    if(isset($_COOKIE['email'])){
        $authEmail=$_COOKIE['email'];
    }
    else
    {
        $authEmail=$_SESSION['user']['email'];
    }

    $dir="uploads/contacts/";

    $path=$dir.$_FILES['myFile']['name'];

    $sql="INSERT INTO myplayers(fullname,userProfile,age,height,nation,ipl,batting,bowling,role,authEmail,userAddress,created)
    VALUES('$name','$path','$age','$height','$nation','$ipl','$batting','$bowling','$role','$authEmail','$address',now());";

    if($conn->query($sql)) {
        move_uploaded_file($_FILES['myFile']['tmp_name'], $path);
        
        $flag=1;
    }
    else
    {
        echo "Error is ".$conn->error;
        $flag=2;
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php'); ?>
</head>

<body>
    <?php include('components/navbar.php'); ?>

    <?php
        if($flag==1){
            echo "<script>swal('Contact saved successfully')</script>";
        }
        elseif($flag==2){
            echo "<script>swal('Something went wrong')</script>";
        }
    ?>
    <div class="container mt-3">
        <h3 class="text-center text-primary mt-3">Add Contact</h3>
        <hr>
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-success" href="dashboard.php">Dashboard</a>
            <a class="btn btn-success" href="addcontact.php">Add Contact</a>
        </div>
        <hr>

        <form class="s-form" action="" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="myFile" class="form-control">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" placeholder=" Sachin ">
            </div>
            
            <div class="mb-3">
                <label class="form-label"> Age </label>
                <input type="text" name="age" class="form-control" placeholder=" 50 ">
            </div>
            
            <div class="mb-3">
                <label class="form-label"> Height </label>
                <input type="text" name="height" class="form-control" placeholder=" 1.8m">
            </div>
            
            <div class="form-group mb-3">
 <label for="gender"> Batting </label> 
 <div> <label for="male" class="radio-inline" >
 <input type="radio" name="batting" value="Right-handed" id="male" /> Right-handed</label > 
 <label for="female" class="radio-inline" >
 <input type="radio" name="batting" value="Left-handed" id="female" /> Left-handed</label > 
 <label for="others" class="radio-inline" >
 <input type="radio" name="batting" value="o" id="others" />Others</label > 
 </div> </div>
 
 <div class="form-group mb-3">
 <label for="gender"> Role </label> 
 <div> <label for="male" class="radio-inline" >
 <input type="radio" name="role" value=" Batsman" id="male" /> Batsman</label > 
 <label for="female" class="radio-inline" >
 <input type="radio" name="role" value="Bowler" id="female" /> Bowler</label > 
 <label for="others" class="radio-inline" >
 <input type="radio" name="role" value="Allrounder" id="others" /> Allrounder</label > 
 <label for="others" class="radio-inline" >
 <input type="radio" name="role" value="Wicket-keeper batsman" id="others" /> Wicket-keeper batsman</label > 
 
</div> </div>

            <div class="mb-3">
                <label class="form-label"> Nation Side</label>
                <input type="text" name="nation" class="form-control" placeholder=" India ">
            </div>
            
            
            <div class="mb-3">
                <label class="form-label"> IPL Team </label>
                <input type="text" name="ipl" class="form-control" placeholder="CSK">
            </div>
            
            
            
            
            
            
            

            
            <div class="mb-3">
                <label class="form-label"> Player Information </label>
                <textarea class="form-control" name="userAddress" rows="3"></textarea>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit" name="submit">Add Contact</button>
                <button class="btn btn-warning" type="reset">Clear</button>
            </div>
        </form>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>

    <!-- This is my custome script to add multiple email input fields -->
    <script src="js/addMoreEmail.js"></script>

    <!-- This is my custome script to add multiple mobile input fields -->
    <script src="js/addMoreMobile.js"></script>
</body>

</html>
