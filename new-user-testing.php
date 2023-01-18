<?php 
session_start();
error_reporting(0);
//DB conncetion
include_once('includes/config.php');

if(isset($_POST['submit'])){
//getting post values
$fname=$_POST['fullname'];
$mnumber=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$govtid=$_POST['govtissuedid'];
$govtidnumber=$_POST['govtidnumber'];
$address=$_POST['address'];
$state=$_POST['state'];
$testtype=$_POST['testtype'];
$timeslot=$_POST['birthdaytime'];
$orderno= mt_rand(100000000, 999999999);
$query="insert into tblpatients(FullName,MobileNumber,DateOfBirth,GovtIssuedId,GovtIssuedIdNo,FullAddress,State) values('$fname','$mnumber','$dob','$govtid','$govtidnumber','$address','$state');";
$query.="insert into tbltestrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
$result = mysqli_multi_query($con, $query);
if ($result) {
echo '<script>alert("Your test request submitted successfully. Order number is "+"'.$orderno.'")</script>';
  echo "<script>window.location.href='new-user-testing.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='new-user-testing.php'</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>New User Testing | Vaccination Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown.css">
    <link rel="stylesheet" href="form.css">
       
    <script>
function mobileAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'mobnumber='+$("#mobilenumber").val(),
type: "POST",
success:function(data){
$("#mobile-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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

            <h1 class="dash-title">Add New User</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        

<div class="row">
            <div class="col6">
            <div class="container">
            <form name="newtesting" method="post">
    
      <h4>Personal Information</h4><br>
      <div class="input-group">
      <h5>Full Name</h5>
      <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" required="true">
      </div>
      <div class="input-group">
      <h5>Mobile Number</h5>
      <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Please enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" onBlur="mobileAvailability()">
      </div>
      <div class="input-group">
      <h5>Date of Birth</h5>
      <input type="date" class="form-control" id="dob" name="dob" required="true">
      </div>
      <div class="input-group">
      <h5>Any Govt Issued ID</h5>
      <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" placeholder="Pancard / Driving License / Voter id / any other" required="true">
      </div>
       
      <div class="input-group">
      <h5>Govt Issued ID Number</h5>
      <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" placeholder="Enter Goevernment Issued ID Number" required="true">
      </div>
      <div class="input-group">
      <h5>Address</h5>
      <input type="text" class="form-control" id="address" name="address" required="true" placeholder="Enter your full addres here" required="true">
      </div>
      <div class="input-group">
      <h5>State</h5>
      <input type="text" class="form-control" id="state" name="state" placeholder="Enter your State Here" required="true">
      </div>
    </div>
</div><br>
<div class="col6">
<div class="container">
<h4>Testing Information</h4><br>
      <div class="input-group">
      <h5>Test Type</h5>
      <select class="form-control" id="testtype" name="testtype" required="true">
                                            <option value="">Select</option> 
                                            <option value="Pfizer">Pfizer</option>  
                                            <option value="Moderna">Moderna</option>
                                            <option value="Sputnik">Sputnik</option>    
                                              </select>      </div>
                                              
    <div class="input-group">
      <h5>Time Slot for Test</h5>
      <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime" class="form-control">                                        
      </div>

      <div class="input-group">
      
      <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit">                           
      </div> 

  </form>
</div></div>
</div>

<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
   

</body>

</html>
