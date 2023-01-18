<?php session_start();
//DB conncetion
include_once('includes/config.php');
//error_reporting(0);
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
    <title>Date Reports | Vaccination Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown.css">
    <link rel="stylesheet" href="tables.css">
       
 

</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <?php include_once('includes/sidesection.php');?>
   
    <div class="main-content">

        <header>

        </header>

        <main>
        <?php
$fdate=$_POST['fromdate'];
// Create a DateTime object from the user input
$fdate = DateTime::createFromFormat('Y-m-d', $fdate);

//Check if the date is valid
if ($fdate === false) {
    // The date is not valid
    echo "Invalid date format. Please enter the date in YYYY-MM-DD format.";
} else {
    // The date is valid, you can use it as needed
    $fdate = $fdate->format('Y-m-d');
}

$tdate=$_POST['todate'];
// Create a DateTime object from the user input
$tdate = DateTime::createFromFormat('Y-m-d', $tdate);

//Check if the date is valid
if ($tdate === false) {
    // The date is not valid
    echo "Invalid date format. Please enter the date in YYYY-MM-DD format.";
} else {
    // The date is valid, you can use it as needed
    $tdate = $tdate->format('Y-m-d');
}

?>
            <h1 class="dash-title">Dates Report Result From <?php echo $fdate;?> to <?php echo $tdate;?> </h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
            <form name="assignto" method="post">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Order No.</th>
                                            <th>Patient Name</th>
                                            <th>Mobile No.</th>
                                            <th>Test Type</th>
                                            <th>Time Slot</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                      <tfoot>
                                            <tr>
                                            <th>Sno.</th>
                                            <th>Order No.</th>
                                            <th>Patient Name</th>
                                            <th>Mobile No.</th>
                                            <th>Test Type</th>
                                            <th>Time Slot</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select tbltestrecord.OrderNumber,tblpatients.FullName,tblpatients.MobileNumber,tbltestrecord.TestType,tbltestrecord.TestTimeSlot,tbltestrecord.RegistrationDate,tbltestrecord.id as testid from tbltestrecord
join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber
where date(tbltestrecord.RegistrationDate) between '$fdate' and '$tdate'
    ");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['OrderNumber'];?></td>
                                            <td><?php echo $row['FullName'];?></td>
                                            <td><?php echo $row['MobileNumber'];?></td>
                                            <td><?php echo $row['TestType'];?></td>
                                            <td><?php echo $row['TestTimeSlot'];?></td>
                                             <td><?php echo $row['RegistrationDate'];?></td>
                                            <td>

                                <a href="test-details.php?tid=<?php echo $row['testid'];?>&&oid=<?php echo $row['OrderNumber'];?>" class="btn btn-info btn-sm" target="blank">View Details</a> 

                            </td>
                                        </tr>
<?php $cnt++;} ?>
                                    </tbody>
                                </table>
                                     </form>
</div>


<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
   

</body>

</html>
<?php } ?>