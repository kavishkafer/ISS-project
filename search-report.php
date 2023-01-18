<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);

//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Search Report | Vaccination Management</title>
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

            <h1 class="dash-title">Search Report</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
            <form method="post" action="search-report-result.php">
    <div class="row">
      
      <div class="input-group">
      <h4>Search By Patient Name or Mobile Number or  Mobile Number or Order Number</h4>
      <input type="text" class="form-control" id="serachdata" name="serachdata" required="true" placeholder="Enter name or mobile number or Order Number">
      </div>
      
      <div class="input-group input-group-icon">
      <input type="submit" class="btn btn-primary btn-user btn-block" name="search" value="Search">                           
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