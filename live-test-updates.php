<?php 
session_start();
error_reporting(0);
//DB conncetion
include_once('includes/config.php');
//error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>All Tests | Vaccination Management</title>
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

            <h1 class="dash-title">Areawise Test Details</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
            <form name="assignto" method="post">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>State Name</th>
                                            <th>Total Test Done</th>
                                        </tr>
                                    </thead>
                                      <tfoot>
                                            <tr>
                                            <th>Sno.</th>
                                            <th>State Name</th>
                                            <th>Total Test Done</th>
                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select  tblpatients.State as state,count(tbltestrecord.id) as totaltest from tbltestrecord
join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber
group by tblpatients.State
    ");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['state'];?></td>
                                            <td><?php echo $row['totaltest'];?></td>
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
