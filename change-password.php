<?php session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


 if(isset($_POST['submit']))
{
$adminid=$_SESSION['aid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Change Password | Vaccination Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown.css">
    <link rel="stylesheet" href="form.css">
       
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   
</script>

</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <?php include_once('includes/sidesection.php');?>
   
    <div class="main-content">

        <header>

        </header>

        <main>

            <h1 class="dash-title">Change Password</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
  <form method="post"  name="changepassword" onsubmit="return checkpass();">
    <div class="row">
      
      <div class="input-group">
      <h4>Current Password</h4>
      <input type="password" id="currentpassword" name="currentpassword" value="" class="form-control" required="true">
      </div>
      <div class="input-group">
      <h4>New Password</h4>
      <input type="password" id="newpassword" name="newpassword" value="" class="form-control" required="true">
      </div>
      <div class="input-group">
      <h4>Confirm Password</h4>
      <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" value="" required="true">
      </div>
      <div class="input-group input-group-icon">
      <input type="submit" class="submit" name="submit" id="submit">                           
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