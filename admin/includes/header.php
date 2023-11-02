<?php 

include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class
include('variables.php'); // CRUD variables (users, categories etc)

?>