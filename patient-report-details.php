<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Patient Report Details | Vaccination Management</title>
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

            <h1 class="dash-title">Test Details# <?php echo intval($_GET['oid']);?></h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
            <?php 
$testid=intval($_GET['tid']);
$query=mysqli_query($con,"select * from tbltestrecord
join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber
where  tbltestrecord.id='$testid'");
while($row=mysqli_fetch_array($query)){ 
    ?>



            <div class="container">
                <h4>Personal Information</h4>
            <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Full Name</th> 
    <td><?php echo $row['FullName'];?></td>
    </tr>

     <tr>
    <th>Mobile Number</th> 
    <td><?php echo $row['MobileNumber'];?></td>
    </tr>

     <tr>
    <th>DOB (Date of Birth)</th> 
    <td><?php echo $row['DateOfBirth'];?></td>
    </tr>


     <tr>
    <th>Govt Issued Id</th> 
    <td><?php echo $row['GovtIssuedId'];?></td>
    </tr>


     <tr>
    <th>Govt Issued Id No</th> 
    <td><?php echo $row['GovtIssuedIdNo'];?></td>
    </tr>


     <tr>
    <th>Full Address</th> 
    <td><?php echo $row['FullAddress'];?></td>
    </tr>

    <tr>
    <th>State</th> 
    <td><?php echo $row['State'];?></td>
    </tr>

    <tr>
    <th>Profile Reg Date</th> 
    <td><?php echo $row['RegistrationDate'];?></td>
    </tr>
 </table>
<br>
 <h4>Test Information</h4>
 <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Order Number</th> 
    <td><?php echo $row['OrderNumber'];?></td>
    </tr>

    <tr>
    <th>Test Type</th> 
    <td><?php echo $row['TestType'];?></td>
    </tr>


    <tr>
    <th>Time Slot</th> 
    <td><?php echo $row['TestTimeSlot'];?></td>
    </tr>

 <tr>
    <th>Report Status</th> 
    <td><?php if($row['ReportStatus']==''):
              echo "Not Processed yet";
          else:
           echo $row['ReportStatus'];
          endif;

    ?></td>
    </tr>


<?php if($row['AssignedtoEmpId']!=''):?>
  <tr>
    <th>Assign To</th> 
    <td><?php echo $row['AssigntoName'];?>-(<?php echo $row['AssignedtoEmpId'];?>)</td>
    </tr>

    <tr>
    <th>Assigned Date</th> 
    <td><?php echo $row['AssignedTime'];?></td>
    </tr>
<?php endif;?>
<?php if($row['FinalReport']!=''):?>
  <tr>
    <th>Report</th> 
    <td><a href="reportfiles/<?php echo $row['FinalReport'];?>" target="_blank">Download</a></td>
    </tr>

    <tr>
    <th>Report Delivered Time</th> 
    <td><?php echo $row['ReportUploadTime'];?></td>
    </tr>
<?php endif;?>

</table>
<br>
<?php
$orderid=intval($_GET['oid']);
$ret=mysqli_query($con,"select * from tblreporttracking
join tbladmin on tbladmin.ID=tblreporttracking.RemarkBy
where tblreporttracking.OrderNumber='$orderid'");
$num=mysqli_num_rows($ret);
?>
<?php if($num>0){
?>
<h4>Test Tracking History</h4>
 <table class="table table-bordered"  width="100%" cellspacing="0">
<tr>
    <th>Remark</th>
    <th>Status</th>
    <th>Remark Date</th>
    <th>Remark By</th>
<?php while($result=mysqli_fetch_array($ret)){?>
</tr>
    <tr>
    <td><?php echo $result['Remark'];?></td> 
    <td><?php echo $result['Status'];?></td>
    <td><?php echo $result['PostingTime'];?></td>
    <td><?php echo $result['AdminName'];?></td>
    </tr>

<?php } // End while loop?>

</table>
         <?php
       //end if   
     } else { ?>    
<h4 align="center" style="color:red"> No Tracking history found </h4>
         <?php } ?>   
</div>


<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
    <script type="text/javascript">

//For report file
$('#reportfile').hide();
$(document).ready(function(){
$('#status').change(function(){
if($('#status').val()=='Delivered')
{
$('#reportfile').show();
jQuery("#report").prop('required',true);  
}
else{
$('#reportfile').hide();
}
})}) 
</script>

</body>

</html>
<?php } ?>