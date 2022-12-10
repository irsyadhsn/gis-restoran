<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav style="background-color: #DAE2B6;" class="navbar navbar-expand navbar topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                     <div style="color: black; font-weight: bold;
                                padding: 15px 50px 5px 50px;
                                float: right;
                                font-size: 16px;"> Tanggal : <?= date('d M Y') ?> &nbsp; 
                                </div>

                    <!-- Topbar Search -->
                  
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                             <div style="color: black; font-weight: bold;
                                padding: 15px 50px 5px 50px;
                                float: right;
                                font-size: 16px;">
                             <?php if ($this->session->userdata('username') == "") { ?>
                                    <a href="<?= base_url('login') ?>" class="btn btn-primary square-btn-adjust">Login</a>
                                <?php } else { ?>
                                    <text >User : <?= $this->session->userdata('nama_user') ?> &nbsp;&nbsp;</text>
                                    <a href="<?= base_url('login/logout') ?>" class="btn btn-danger square-btn-adjust">Logout</a>
                                <?php } ?>
                            </a>
                        </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> </h1>
 
             

    

   