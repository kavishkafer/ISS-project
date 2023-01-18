<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);

//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
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
    <title>Add Phlebotomist | Vaccination Management</title>
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

            <h1 class="dash-title">Dates Report Date Selection</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
  <form method="post" action="bwdates-report-result.php">
    <div class="row">
      
      <div class="input-group">
      <h4>From Date</h4>
      <input type="date" class="form-control" id="fromdate" name="fromdate" required="true">
        
      </div>
      <div class="input-group">
      <h4>To Date</h4>
      <input type="date" class="form-control" id="todate" name="todate" required="true">
    
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