<?php session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


    if(isset($_POST['update']))
  {
    $adminid=$_SESSION['aid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName='$aname', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
    if ($query) {
 
    echo '<script>alert("Profile has been updated")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Profile | Vaccination Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown.css">
    <link rel="stylesheet" href="form.css">
       
 

</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <?php include_once('includes/sidesection.php');?>
   
    <div class="main-content">

        <header>

        </header>

        <main>

            <h1 class="dash-title">Admin Profile</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
            <form method="post"  name="adminprofile" >
    <div class="row">
    <?php
$adminid=$_SESSION['aid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      <div class="input-group">
      <h4>Admin Name</h4>
      <input type="text" class="form-control" name="adminname" value="<?php  echo $row['AdminName'];?>" required='true'>
      </div>
      <div class="input-group">
      <h4>Username</h4>
      <input type="text" class="form-control" name="username" value="<?php  echo $row['AdminuserName'];?>" readonly='true'> 
      </div>
      <div class="input-group">
      <h4>Email Address</h4>
      <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" required='true'>
      </div>
      <div class="input-group">
      <h4>Contact Number</h4>
      <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength='10'>
      </div>
      <?php } ?>
      <div class="input-group input-group-icon">
      <input type="submit" class="btn btn-primary btn-user btn-block" name="update" id="update" value="Update">                           
      </div>
    </div>
    
    
    
  </form>
</div>


<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
   

</body>

</html>
<?php } ?>