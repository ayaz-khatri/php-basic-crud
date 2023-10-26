<?php

if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header("location: categories.php"); die();
}

include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class

$id = $_GET['id'];
        
$paramList = [$id];
$sql = "SELECT * FROM categories WHERE category_id = ? AND category_status != 0";
$result = $obj->executeSQL($sql, $paramList, true);

if($result == '' || empty($result))
{
    $_SESSION['error'] = "Something went wrong.";
    header('location: categories.php'); die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $result[0]['category_name']; ?></title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold"><?php echo $result[0]['category_name']; ?></h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="categories.php" type="button" class="btn btn-sm btn-outline-secondary">Categories</a>
                    <a href="edit.php?id=<?php echo $result[0]['category_id'] ?>" type="button" class="btn btn-sm btn-outline-danger">Edit this category</a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>

    <?php include('../../includes/messages.php'); ?>

    <div class="container my-5 px-4 py-1">
        
        <div class="row">
            <div class="col-md-4 text-center">
                <?php $img = empty($result[0]['category_image']) ? "../../images/placeholder.png" : "../uploads/categories/" . $result[0]['category_image']?>
                <img src="<?php echo $img; ?>" class="img img-fluid shadow rounded mb-4 entityImage">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td class="fw-bold">Name:</td>
                        <td><?php echo $result[0]['category_name'] ?></td>
                    </tr>
                    <tr>
                        <?php
                            $status = ""; 
                            $statusClass = "";
                            if ($result[0]['category_status'] == "1") 
                            {
                                $status =  "Active";
                                $statusClass = "text-success";
                            } 
                            elseif($result[0]['category_status'] == "0") 
                            {
                                $status =  "Blocked";
                                $statusClass = "text-danger";
                            }
                            
                        ?>
                        <td class="fw-bold">Status:</td>
                        <td class="<?php echo $statusClass; ?> fw-bold"><?php echo $status ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Created at:</td>
                        <td><?php echo date('Y-M-d | h:i:s A', strtotime($result[0]["created_at"])) ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Updated at:</td>
                        <td><?php echo date('Y-M-d | h:i:s A', strtotime($result[0]["updated_at"])) ?></td>
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