<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
  {
    $uname=mysqli_real_escape_string($con,$_POST['username']);
	$Password=mysqli_real_escape_string($con,$_POST['inputpwd']);
	$Password=password_hash($Password,PASSWORD_DEFAULT);
    $query="select ID from tbladmin where  AdminuserName='?' && Password='?' ";
	$stmt=mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$query)){
		echo "SQL statement failed!";

	}
	else{
		mysqli_stmt_bind_param($stmt,"ss",$uname,$Password);
		$rows=mysqli_stmt_execute($stmt);
		
		//$rows=mysqli_fetch_assoc($res);
		if($rows>0){
		  $_SESSION['aid']=$ret['ID'];
		 header('location:dashboard.php');
		}
		else{
		echo "<script>alert('Invalid Details.');</script>";          
		}
	}
	
	

    // $ret=mysqli_fetch_array($hiro);
    // if($ret>0){
    //   $_SESSION['aid']=$ret['ID'];
    //  header('location:dashboard.php');
    // }
    // else{
    // echo "<script>alert('Invalid Details.');</script>";          
    // }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Login page </title>
<link rel="Stylesheet" href="login.css"/>
</head>

<body>
<div class="heading1" align="center"> COVID-19 VACCINATION PROGRAMME</h1></div>
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<img src="img/img2.jpg"  width= "518" height="420"  alt=" icon">
		</div>
	</div>
	
	
		<div class="right">
		<div class="home">Home</div>
		<div class="img2"><a href="index.php" id="logo"><img src="img/arrow.png"  width= "28" height="30"  alt="icon"></a></div>
		<center><h2>Welcome Back!</h2>
		<form name="login" method="post">
		<div class="inputs">
        <input type="text" class="form-control" name="username" 
             id="username" placeholder="Enter username" required="true">
			<br>
			<input type="password" class="form-control" name="inputpwd" 
                 id="inputpwd" placeholder="Password">
		</div>
			
			<br><br>
			
		<div class="forgot-password">
				
        <a href="password-recovery.php">Forgot Password?</a>
		</div>
			
			<br>
		</center>	
        <input type="submit" name="login" class="button" value="login">
</form>
	</div>
	
</div>


</body>

</html>