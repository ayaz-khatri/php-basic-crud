<button class="btn float-end mt-1 me-4" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
    <span data-bs-toggle="tooltip" title="Menu" data-bs-placement="bottom">
        <i class="fa-solid fa-ellipsis-vertical" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
    </span>
</button>


<div class="offcanvas offcanvas-start" style="width:20%" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title d-none d-sm-block fw-bold" id="offcanvas"><?php echo WEBSITE_NAME ?></h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li class="nav-item fw-bold">
                <a href="../home/index.php" class="nav-link text-dark sidebarLink">
                    <i class="fa-solid fa-home" data-bs-toggle="tooltip" title="Dashboard" style="width: 15px;"></i><span class="ms-3 d-none d-md-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item fw-bold">
                <a href="../users/index.php" class="nav-link text-dark sidebarLink">
                    <i class="fa-solid fa-people-group" data-bs-toggle="tooltip" title="Users" style="width: 15px;"></i><span class="ms-3 d-none d-md-inline">Users</span>
                </a>
            </li>
            <li class="nav-item fw-bold">
                <a href="#" class="nav-link text-dark sidebarLink">
                    <i class="fa-solid fa-list" data-bs-toggle="tooltip" title="Categories" style="width: 15px;"></i><span class="ms-3 d-none d-md-inline">Categories</span>
                </a>
            </li>
            <li class="nav-item fw-bold">
                <a href="#" class="nav-link text-dark sidebarLink">
                    <i class="fa-solid fa-layer-group" data-bs-toggle="tooltip" title="Products" style="width: 15px;"></i><span class="ms-3 d-none d-md-inline">Products</span>
                </a>
            </li>
            <li class="nav-item fw-bold">
                <a href="#" class="nav-link text-dark sidebarLink">
                    <i class="fa-solid fa-money-bill-1-wave" data-bs-toggle="tooltip" title="Orders" style="width: 15px;"></i><span class="ms-3 d-none d-md-inline">Orders</span>
                </a>
            </li>
            <li class="nav-item fw-bold">
                <a href="../logics/logout.php" class="nav-link text-dark sidebarLink">
                    <i class="fa-solid fa-power-off" data-bs-toggle="tooltip" title="Logout" style="width: 15px;"></i><span class="ms-3 d-none d-md-inline">Logout</span>
                </a>
            </li>
            <!-- <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle text-danger" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fs-5 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline">Dropdown</span>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="#">Link 1</a></li>
                    <li><a class="dropdown-item" href="#">Link 2</a></li>
                    <li><a class="dropdown-item" href="#">Link 3</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../logics/logout.php">Sign out</a></li>
                </ul>
            </li> -->

        </ul>
    </div>
</div>