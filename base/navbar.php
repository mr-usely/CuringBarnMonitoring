<div id="main">
    <nav class="navbar navbar-header navbar-expand navbar-light">
        <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
        <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                <li class="dropdown">
                    <a href="#" data-bs-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="avatar me-1">
                            <img src="<?php echo "../../public/Photos/".$found_user->DistinctID.".png";?>" alt="" srcset="">
                        </div>
                        <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo ucwords(strtolower($found_user->FirstName)); ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="https://ulr2.universalleaf.com.ph/EO2021v4/public/"><i data-feather="log-out"></i> ULFS Main Page</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-content container-fluid">