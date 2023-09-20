<div class="container my-3">
    <?php                    
        if(isset($_SESSION["error"]) && !empty($_SESSION["error"]))
        {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
            echo $_SESSION["error"]."</div>";
            unset($_SESSION["error"]);
        }
        if(isset($_SESSION["success"]) && !empty($_SESSION["success"]))
        {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
            echo $_SESSION["success"]."</div>";
            unset($_SESSION["success"]);
        }
    ?>
</div>