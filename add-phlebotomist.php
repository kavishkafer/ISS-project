<?php session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit'])){
//getting post values
$empid=$_POST['empid'];
$fname=$_POST['fullname'];
$mnumber=$_POST['mobilenumber'];
$query="insert into tblphlebotomist(EmpID,FullName,MobileNumber) values('$empid','$fname','$mnumber')";
$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Phlebotomist created successfully.")</script>';
  echo "<script>window.location.href='add-phlebotomist.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='add-phlebotomist.php'</script>";
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
       
  <script>
function empidAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'employeeid='+$("#empid").val(),
type: "POST",
success:function(data){
$("#empid-availability-status").html(data);
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

            <h1 class="dash-title">Add Phlebotomist</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
  <form name="addphlebotomist" method="post">
    <div class="row">
      <h4>Personal Information</h4>
      <div class="input-group input-group-icon">
      <input type="text" class="form-control" id="empid" name="empid"  placeholder="Enter Employee ID"   required="true" onBlur="empidAvailability()">
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
      <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter Your Full Name" pattern="[A-Za-z ]+" title="letters only" required="true">
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
      <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Your Mobile Number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" >
        <div class="input-icon"><i class="fa fa-key"></i></div>
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