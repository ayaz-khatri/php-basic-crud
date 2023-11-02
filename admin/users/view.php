<?php

if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header("location: index.php"); die();
}

include('../includes/header.php');

$id = $_GET['id'];
        
$paramList = [$id];
$sql = "SELECT * FROM $plural WHERE id = ? AND status != 0 AND role != 'a'";
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
                    <a href="edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-outline-success">Edit</a>
                    <a href="index.php" type="button" class="btn btn-sm btn-outline-primary"><?php echo ucwords($plural); ?></a>
                    <a href="create.php" type="button" class="btn btn-sm btn-outline-secondary">Create</a>
                    <a href="blocked.php" type="button" class="btn btn-sm btn-outline-danger">Blocked</a>
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
            <div class="col-md-8 shadow rounded p-4 bg-white">
                <table class="table">
                    <tr>
                        <td class="fw-bold">Name:</td>
                        <td><?php echo $row['name'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Email:</td>
                        <td><?php echo $row['email'] ?></td>
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
                        <?php
                            $gender = ""; 
                            if ($row['gender'] == "m") 
                            {
                                $gender =  "Male";
                            } 
                            elseif($row['gender'] == "f")
                            {
                                $gender =  "Female";
                            }
                            elseif($row['gender'] == "o")
                            {
                                $gender =  "Other";
                            }
                        ?>
                        <td class="fw-bold">Gender:</td>
                        <td><?php echo $gender ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Date of Birth:</td>
                        <td><?php echo $row['dob'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Phone:</td>
                        <td><?php echo $row['phone'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Address:</td>
                        <td><?php echo $row['address'] ?></td>
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