<?php 

function oldData($name) 
{
    // Check if the value is set in the POST data
    $value = isset($_SESSION['formData'][$name]) ? $_SESSION['formData'][$name] : '';
    return htmlspecialchars($value);
}

?>