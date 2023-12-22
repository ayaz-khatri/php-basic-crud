<?php

if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header("location: index.php"); die();
}

include('../includes/header.php');

$id = $_GET['id'];
        
$paramList = [$id];
$sql = "SELECT * FROM $plural WHERE id = ? AND role != 'a'";
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
            <img src="<?php echo $img; ?>" class="img img-fluid shadow rounded mb-4 entityImage" alt="User Image">
        </div>
        <div class="col-md-8">
            <div class="card shadow rounded p-4">
                <div class="card-body">
                    <div class="row px-2">
                        <div class="col-6">
                            <h5 class="card-title mb-4 fw-bold"><?php echo $row['name']; ?></h5>
                        </div>
                        <div class="col-6 text-end">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm p-1 px-2 icon-button" id="btnEdit">
                                <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                </a>
                    
                                <?php if($row['status'] == 0) { ?>
                                    <a href="unblock.php?id=<?php echo $row['id'] ?>" class="block btn btn-warning btn-sm p-1 px-2 icon-button">
                                    <i class="fa fa-lock-open" data-bs-toggle="tooltip" data-bs-placement="top" title="Unblock"></i>
                                    </a>

                                <?php } else { ?> 
                                    <a href="block.php?id=<?php echo $row['id'] ?>" class="block btn btn-warning btn-sm p-1 px-2 icon-button">
                                    <i class="fa fa-lock" data-bs-toggle="tooltip" data-bs-placement="top" title="Block"></i>
                                    </a>  
                                <?php  } ?>

                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless">
                        <tr>
                            <td class="fw-bold">Email:</td>
                            <td><?php echo $row['email'] ?></td>
                        </tr>
                        <tr>
                            <?php
                                $status = "";
                                $statusClass = "";
                                if ($row['status'] == "1") {
                                    $status =  "Active";
                                    $statusClass = "text-success";
                                } elseif ($row['status'] == "0") {
                                    $status =  "Blocked";
                                    $statusClass = "text-danger";
                                }
                            ?>
                            <td class="fw-bold">Status:</td>
                            <td class="<?php echo $statusClass; ?> fw-bold"><?php echo $status; ?></td>
                        </tr>
                    </table>
                    
                    <div class="row">
                        <hr>
                        <div class="col">
                            <small class="text-muted">Date of Birth:</small>
                            <p><?php echo ($row['dob'] != "") ? $row['dob'] : "--"  ?></p>
                        </div>
                        <div class="col">
                            <small class="text-muted">Phone:</small>
                            <p><?php echo ($row['phone'] != "") ? $row['phone'] : "--"  ?></p>

                        </div>
                        <div class="col">
                            <small class="text-muted">Gender:</small>
                            <?php
                                $gender = "--"; 
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
                            <p><?php echo $gender; ?></p>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small class="text-muted">Address:</small>
                            <p><?php echo ($row['address'] != "") ? $row['address'] : "--"  ?></p>

                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small class="text-muted">Created At:</small>
                            <p><?php echo date('Y-M-d | h:i:s A', strtotime($row["created_at"])); ?></p>
                        </div>
                        <div class="col">
                            <small class="text-muted">Updated:</small>
                            <?php $date = strtotime($row["updated_at"]); ?>
                            <p><?php echo $obj->timestampToCustomHumanReadable($date); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/toggle-password.js"></script>
    <script src="../js/setDefaultDob.js"></script>

</body>

</html>