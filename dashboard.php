<?php
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Dashboard | Vaccination Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown.css">
       
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <?php include_once('includes/sidesection.php');?>
   
    <div class="main-content">

        <header>

        </header>

        <main>

            <h1 class="dash-title">Medical Officer of Health - Kandy</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
            <?php 
            //Total tests
            $query=mysqli_query($con,"select id from tbltestrecord");
            $totaltest=mysqli_num_rows($query);
            //Assigned tests
            $query1=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Assigned'");
            $totalassigned=mysqli_num_rows($query1);
            //On the way for sample collection
            $query2=mysqli_query($con,"select id from tbltestrecord where ReportStatus='On the Way for Collection'");
            $totalontheway=mysqli_num_rows($query2);
            //Sample Collected
            $query3=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Sample Collected'");
            $totalsamplecollected=mysqli_num_rows($query3);
            //Sent for lab
            $query4=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Sent to Lab'");
            $totalsenttolab=mysqli_num_rows($query4);
            
            //Report Delivered
            $query5=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Delivered'");
            $totaldelivered=mysqli_num_rows($query5);
            
            //Totall Registered Patients 
            $query6=mysqli_query($con,"select id from tblpatients");
            $totalpatients=mysqli_num_rows($query6); 
            
            //Totall Registered Phlebotomist 
            $query7=mysqli_query($con,"select id from tblphlebotomist");
            $totalphlebotomist=mysqli_num_rows($query7);
            ?>
            <div class="cards">
                <div class="card-single">
                    <div class="card-body">

                        <div class="card-head">
                            <span>Total Tests Taken</span>
                            <h1><?php echo $totaltest;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="all-test.php">Get Summary</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <div class="card-head">
                            <span>Total Assigned Tests</span>
                            <h1><?php echo $totalassigned;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="assigned-test.php">Get Summary</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <div class="card-head">
                            <span>On the Way to the Lab</span>
                            <h1><?php echo $totalontheway;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="ontheway-samplecollection-test.php">Get Summary</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <div class="card-head">
                            <span>Sample Collected</span>
                            <h1><?php echo $totalsamplecollected;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="sample-collected-test.php">Get Summary</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        
                        <div class="card-head">
                            <span>Sample Sent to Lab</span>
                            <h1><?php echo $totalsenttolab;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="samplesent-lab-test.php">Get Summary</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        
                        <div class="card-head">
                            <span>Reports Delivered</span>
                            <h1><?php echo $totaldelivered;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="reportdelivered-test.php">Get Summary</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        
                        <div class="card-head">
                            <span>Registered Patients</span>
                            <h1><?php echo $totalpatients;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="samplesent-lab-test.php">Get Summary</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        
                        <div class="card-head">
                            <span>Registered Phlebotomist</span>
                            <h1><?php echo $totalphlebotomist;?></h1>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="manage-phlebotomist.php">Get Summary</a>
                    </div>
                </div>

                

            </div>
            
            <?php include_once('includes/bottomsection.php');?>

            
        </main>

    </div>
   

</body>

</html>
<?php } ?>