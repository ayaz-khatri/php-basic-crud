<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
    <?php include('includes/head-contents.php'); ?>
    </style>
</head>

<body>

    <?php include('includes/navbar.php'); ?>

    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Contact Us</h1>
                <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui soluta ipsum eum optio nostrum velit perspiciatis delectus possimus quisquam, excepturi odio, aliquam harum ea culpa voluptatem, est commodi! Hic, eius?</p>
                <h5><i class="fa-solid fa-phone"></i> <span class="ms-3">0123-4567890</span></h5>
                <h5><i class="fa-solid fa-envelope"></i> <span class="ms-3">my-website@example.com</span></h5>

            </div>
            <div class="col-md-10 mx-auto col-lg-6">
                <form class="p-4 p-md-5 border rounded-3 bg-white box" method="POST" action="#">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingName" placeholder="Name" name="username">
                        <label for="floatingPassword">Your Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-group mb-3">
                        <label class="ms-2">Your Message</label>
                        <textarea id="textarea" rows="3" class="form-control" name="message"></textarea>
                    </div>

                    <input type="submit" class="w-100 btn btn-lg btn-danger" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>