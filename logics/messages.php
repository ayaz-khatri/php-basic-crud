<div class="container my-3">
    <?php                    
        if(isset($_SESSION["error"]) && !empty($_SESSION["error"]))
        {
            echo "<div class='alert alert-danger'>".$_SESSION["error"]."</div>";
            unset($_SESSION["error"]);
        }

        if(isset($_SESSION["success"]) && !empty($_SESSION["success"]))
        {
            echo "<div class='alert alert-success'>".$_SESSION["success"]."</div>";
            unset($_SESSION["success"]);
        }
    ?>
</div>