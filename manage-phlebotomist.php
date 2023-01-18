<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//Code for record deletion
if($_GET['action']=='delete'){    
$pid=intval($_GET['pid']);    
$query=mysqli_query($con, "delete from tblphlebotomist where id='$pid'");
echo '<script>alert("Record deleted")</script>';
  echo "<script>window.location.href='manage-phlebotomist.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Manage Phlebotomist | Vaccination Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown.css">
    <link rel="stylesheet" href="tables.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

       
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <?php include_once('includes/sidesection.php');?>
   
    <div class="main-content">

        <header>

        </header>

        <main>

            <h1 class="dash-title">Manage Phlebotomist</h1>
            <h3 class="dash-title">Covid 19 Vacination Programmes Analytics</h3>
             
        



            <div class="container">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Emp Id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Emp Id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                             <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select * from tblphlebotomist");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>

                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['EmpID'];?></td>
                                            <td><?php echo $row['FullName'];?></td>
                                            <td><?php echo $row['MobileNumber'];?></td>
                                             <td><?php echo $row['RegDate'];?></td>
                                            <td>

                                <a href="edit-phlebotomist.php?pid=<?php echo $row['id'];?>"><i class="fas fa-edit" style="color:blue"></i></a> |

                                <a href="manage-phlebotomist.php?pid=<?php echo $row['id'];?>&&action=delete" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true" style="color:red" title="Delete this record"></i></a></td>
                                        </tr>
                               <?php } ?>
                                    </tbody>
                                </table>
</div>


<?php include_once('includes/bottomsection.php');?>

        </main>

    </div>
   

</body>

</html>
<?php } ?>