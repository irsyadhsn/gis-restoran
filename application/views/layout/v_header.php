 <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #425F57;" class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-location-dot"></i>
                </div>
                <div class="sidebar-brand-text mx-3">GIS Restoran</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pemetaan -->
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('home') ?>">
                    <i class="fas fa-fw fa-globe "></i>
                    <span>Pemetaan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('restoran') ?>">
                    <i class="fas fa-fw fa-utensils "></i>
                    <span>Restoran</span></a>
            </li>
            <?php if ($this->session->userdata('username') != "") { ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('user') ?>">
                    <i class="fas fa-fw fa-user "></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Input
            </div>

             <li class="nav-item">
                <a class="nav-link " href="<?= base_url('restoran/input') ?>">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Input Restoran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('user/input') ?>">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Input User</span></a>
            </li>
             <?php } ?>

            
          

        </ul>
        <!-- End of Sidebar -->