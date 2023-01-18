<?php 
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit'])){
//getting post values
$mnumber=$_POST['mobilenumber'];
$testtype=$_POST['testtype'];
$timeslot=$_POST['birthdaytime'];
$orderno= mt_rand(100000000, 999999999);
$query="insert into tbltestrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
$result = mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Your test request submitted successfully. Order number is "+"'.$orderno.'")</script>';
  echo "<script>window.location.href='registered-user-testing.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='registered-user-testing.php'</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Registered Users | Vaccination Management</title>
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

            <h1 class="dash-title">Already Registeres Users</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
            <form method="post">   
                 <div class="row">
    
      <div class="input-group">
      <h4>Registered Mobile Number</h4>
      <input type="text" class="form-control" id="regmobilenumber" name="regmobilenumber" placeholder="Please enter your registered mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" maxlength="10">
      </div>
      
      <div class="input-group input-group-icon">
      <input type="submit" class="btn btn-primary btn-user btn-block" name="search" value="Search">                           
      </div>
    </div>
    
    
    
  </form>
</div>
<?php if(isset($_POST['search'])){ ?><br>
<h3 style="color:red">Resulst against mobile number "<?php echo $_POST['regmobilenumber'];?>"</h3>
<br>
    <?php
    $mnumber=intval($_POST['regmobilenumber']);
    $sql=mysqli_query($con,"select * from tblpatients where MobileNumber='$mnumber'");
    $row=mysqli_num_rows($sql);
    if($row>0){
    while ($result=mysqli_fetch_array($sql)) {

?>
<div class="container">
<form name="newtesting" method="post">
    
    <h4>Personal Information</h4><br>
    <div class="input-group">
    <h5>Full Name</h5>
    <input type="text" class="form-control" id="fullname" name="fullname"  value="<?php echo $result['FullName']; ?>" readonly="true">
    </div>
    <div class="input-group">
    <h5>Mobile Number</h5>
    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $result['MobileNumber']; ?>" readonly="true">
    </div>
    <div class="input-group">
    <h5>Date of Birth</h5>
    <input type="text" class="form-control" id="dob" name="dob" readonly="true" value="<?php echo $result['DateOfBirth']; ?>">
    </div>
    <div class="input-group">
    <h5>Any Govt Issued ID</h5>
    <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['GovtIssuedIdNo']; ?>" readonly="true">
    </div>
     
    <div class="input-group">
    <h5>Govt Issued ID Number</h5>
    <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['GovtIssuedIdNo']; ?>" readonly="true">
    </div>
    <div class="input-group">
    <h5>Address</h5>
    <input type="text" class="form-control" id="address" name="address" readonly="true"placeholder="<?php echo $result['FullAddress']; ?>">
    </div>
    <div class="input-group">
    <h5>State</h5>
    <input type="text" class="form-control" id="state" name="state" value="<?php echo $result['State']; ?>" readonly="true">
    </div>
  </div>
<br>
<div class="col6">
<div class="container">
<h4>Testing Information</h4><br>
    <div class="input-group">
    <h5>Test Type</h5>
    <select class="form-control" id="testtype" name="testtype" required="true">
                                            <option value="">Select</option> 
                                            <option value="Pfizer">Pfizer</option>  
                                            <option value="Moderna">Moderna</option>   
                                              </select>      </div>
                                            
  <div class="input-group">
    <h5>Time Slot for Test</h5>
    <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime" class="form-control">                                        
    </div>

    <div class="input-group">
    
    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit">                           
    </div> 

</form>
<?php } } else { ?>
<h4 align="center" style="color:red;">No record found</h4>
<?php }}?>
</div>


<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
   

</body>

</html>
