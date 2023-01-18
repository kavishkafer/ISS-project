<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
  {
$contactno=$_POST['contactno'];
$username=$_POST['username'];
$password=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where  AdminuserName='$username' and MobileNumber='$contactno' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $query1=mysqli_query($con,"update tbladmin set Password='$password'  where  AdminuserName='$username' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";
echo "<script>window.location.href='login.php'</script>";

   }
     
    }
    else{
    
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Login page </title>
<link rel="Stylesheet" href="login.css"/>
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
<div class="heading1" align="center"> COVID-19 VACCINATION PROGRAMME</h1></div>
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<img src="img/img2.jpg"  width= "518" height="488"  alt=" icon">
		</div>
	</div>
	
	
		<div class="right">
		<div class="home">Home</div>
		<div class="img2"><a href="index.php" id="logo"><img src="img/arrow.png"  width= "28" height="30"  alt="icon"></a></div>
		<center><h2>Recovery</h2>
		<form name="login" method="post"><form name="login" method="post" name="changepassword">
		<div class="inputs">
        <input type="text" class="form-control" name="username" 
             id="username" placeholder="Enter username" required="true">
			<br>
            <input type="text" name="contactno" placeholder="Contact Number" autocomplete="off" class="form-control">    
			<input type="password" name="newpassword" placeholder="New Password" autocomplete="off" class="form-control">
            <input type="password" name="confirmpassword" placeholder="Confirm Password" autocomplete="off" class="form-control">
		</div>
			
			<br><br>
			
		<div class="forgot-password">
				
        <a href="login.php">Back to Login</a>
		</div>
			
			<br>
		</center>	
        <input type="submit" name="submit" class="button" value="Submit">
</form>
	</div>
	
</div>


</body>

</html>