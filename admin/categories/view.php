<?php

if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header("location: index.php"); die();
}

include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class

include('variables.php');

$id = $_GET['id'];
        
$paramList = [$id];
$sql = "SELECT * FROM $plural WHERE id = ? AND status != 0";
$result = $obj->executeSQL($sql, $paramList, true);

if($result == '' || empty($result))
{
    $_SESSION['error'] = "Something went wrong.";
    header('location: index.php'); die();
}
else
{
    $row = $result[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $row['name']; ?></title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold"><?php echo $row['name']; ?></h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="index.php" type="button" class="btn btn-sm btn-outline-secondary"><?php echo ucwords($plural); ?></a>
                    <a href="edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-outline-danger">Edit</a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>

    <?php include('../../includes/messages.php'); ?>

    <div class="container my-5 px-4 py-1">
        
        <div class="row">
            <div class="col-md-4 text-center">
                <?php $img = empty($row['image']) ? "../../images/placeholder.png" : "../uploads/$plural/" . $row['image']?>
                <img src="<?php echo $img; ?>" class="img img-fluid shadow rounded mb-4 entityImage">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td class="fw-bold">Name:</td>
                        <td><?php echo $row['name'] ?></td>
                    </tr>
                    <tr>
                        <?php
                            $status = ""; 
                            $statusClass = "";
                            if ($row['status'] == "1") 
                            {
                                $status =  "Active";
                                $statusClass = "text-success";
                            } 
                            elseif($row['status'] == "0") 
                            {
                                $status =  "Blocked";
                                $statusClass = "text-danger";
                            }
                            
                        ?>
                        <td class="fw-bold">Status:</td>
                        <td class="<?php echo $statusClass; ?> fw-bold"><?php echo $status ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Created At:</td>
                        <td><?php echo date('Y-M-d | h:i:s A', strtotime($row["created_at"])) ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Updated At:</td>
                        <td><?php echo date('Y-M-d | h:i:s A', strtotime($row["updated_at"])) ?></td>
                    </tr>
                    
                </table>
            </div>
            
        </div>

    </div>


    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/toggle-password.js"></script>
    <script src="../js/setDefaultDob.js"></script>

</body>

</html>