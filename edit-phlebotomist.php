<?php session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//Code for updation
if(isset($_POST['update'])){
$pid=intval($_GET['pid']);    
//getting post values
$empid=$_POST['empid'];
$fname=$_POST['fullname'];
$mnumber=$_POST['mobilenumber'];
$query="update tblphlebotomist set FullName='$fname',MobileNumber='$mnumber' where id='$pid'";
$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Phlebotomist record updated successfully.")</script>';
  echo "<script>window.location.href='manage-phlebotomist.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='manage-phlebotomist.php'</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Edit Phlebotomist | Vaccination Management</title>
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
        <?php 
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select * from tblphlebotomist where id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>    
            <h1 class="dash-title"><?php echo $row['FullName'];?>'s Profile</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
  <form name="addphlebotomist" method="post">
    <div class="row">
      <h4>Registration Date: <?php echo $row['RegDate'];?></h4>
      <br>
      <div class="input-group">
      <h4>Employee ID</h4>
      <input type="text" class="form-control" id="empid" name="empid"  value="<?php echo $row['EmpID'];?>"  readonly="true" >
      </div>
      <div class="input-group">
      <h4>Full Name</h4>
      <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" value="<?php echo $row['FullName'];?>" required="true">
      </div>
      <div class="input-group">
      <h4>Mobile Number</h4>
      <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Please enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" value="<?php echo $row['MobileNumber'];?>" required="true" >
      </div>
      <div class="input-group input-group-icon">
      <input type="submit" class="btn btn-primary btn-user btn-block" name="update" id="update" value="Update">                           
      </div>
    </div>
    
    
    
  </form>
  <?php } ?>
</div>


<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
   

</body>

</html>
<?php } ?>