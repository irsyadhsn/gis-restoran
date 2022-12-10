<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login GIS</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>template/img/map.png" type="image/png">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #425F57;">
    <div class="container">
         <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login GIS</h1>
                                    </div>
                                 
                                        <?php
                                            echo validation_errors(
                                                '<div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                                '</div>'
                                            );
                                            //notifikasi pesan berhasil diinput
                                            if ($this->session->flashdata('pesan')) {
                                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                                                echo $this->session->flashdata('pesan');
                                                echo '</div>';
                                            }
                                            echo form_open('login/index'); 
                                        ?>
                                        <div class="form-group">
                                            <input class="form-control form-control-user"
                                               name="username"
                                                placeholder="Username" value="<?= set_value('username') ?>" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password" name="password" value="<?= set_value('password') ?>" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                        <a href="<?= base_url() ?>" class="btn btn-secondary btn-user btn-block">
                                            Go Back
                                        </a>
                                        </div>
                                         <?php echo form_close(); ?>
                                 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
       
    </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url() ?>template2/assets/js/jquery-1.10.2.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= base_url() ?>template2/assets/js/jquery.metisMenu.js"></script>
     <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url() ?>template2/assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->

</body>

</html>