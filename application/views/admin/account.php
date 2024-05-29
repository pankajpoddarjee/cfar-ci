<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="<?php echo base_url('assets/css/pace.min.css') ?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/pace.min.js') ?>"></script>
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico') ?>" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="<?php echo base_url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') ?>" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="<?php echo base_url('assets/plugins/simplebar/css/simplebar.css') ?>" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?php echo base_url('assets/css/icons.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="<?php echo base_url('assets/css/sidebar-menu.css') ?>" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="<?php echo base_url('assets/css/app-style.css') ?>" rel="stylesheet" />
    
   
    <!-- Ckeditor-->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script> -->


</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <?php $this->load->view('admin/sidebar'); ?>

            <!--Start topbar header-->
            <?php $this->load->view('admin/header'); ?>

                <div class="clearfix"></div>

                <div class="content-wrapper">
                    <div class="container-fluid">






                        <!--Start Main Content-->

                        
                        <div class="row mt-3">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-title">Account Details</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php if($this->session->flashdata('success')){?>
                                            <p style="color:green"><?php  echo $this->session->flashdata('success');?></p>	
                                            <?php } ?>
                                            <?php if($this->session->flashdata('error')){?>
                                            <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/updateAccount') ?>">
                                        <input type="hidden" name="user_id" value="<?php echo !empty($user->id)?$user->id:Null ?>">
                                        <input type="hidden" class="form-control" name="password" id="password"  value="<?php echo !empty($user->password)?$user->password:'12345678' ?>">
                                            <div class="form-group">
                                                <label for="input-1">Name<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo !empty($user->name)?$user->name:set_value('name') ?>">
                                                <?php $name = form_error('name'); if(isset($name)) { ?>
                                                <span style="color:red"><?php echo $name; ?></span>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="input-1">Email Id <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="email" readonly id="email" placeholder="Enter Email"  value="<?php echo !empty($user->email)?$user->email:set_value('email') ?>">
                                                <?php $email_err = form_error('email'); if(isset($email_err)) { ?>
                                                <span style="color:red"><?php echo $email_err; ?></span>
                                                <?php } ?>

                                                <?php if(isset($email_exist_err)){ ?>
                                                    <span style="color:red"><?php echo $email_exist_err; ?></span>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-1">Mobile<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" maxlength="10" name="mobile" id="mobile" placeholder="Enter Mobile Number"  value="<?php echo !empty($user->mobile)?$user->mobile:set_value('mobile') ?>">
                                                <?php $mobile_err = form_error('mobile'); if(isset($mobile_err)) { ?>
                                                <span style="color:red"><?php echo $mobile_err; ?></span>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!--End Main Content-->





                        

                        <!--start overlay-->
                        <div class="overlay toggle-menu"></div>
                        <!--end overlay-->

                    </div>
                    <!-- End container-fluid-->

                </div>
                <!--End content-wrapper-->
                <!--Start Back To Top Button-->
                <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
                <!--End Back To Top Button-->

                <?php $this->load->view('admin/footer'); ?>

                    <!--start color switcher-->
                    <div class="right-sidebar">
                        <div class="switcher-icon">
                            <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
                        </div>
                        <div class="right-sidebar-content">

                            <p class="mb-0">Gaussion Texture</p>
                            <hr>

                            <ul class="switcher">
                                <li id="theme1"></li>
                                <li id="theme2"></li>
                                <li id="theme3"></li>
                                <li id="theme4"></li>
                                <li id="theme5"></li>
                                <li id="theme6"></li>
                            </ul>

                            <p class="mb-0">Gradient Background</p>
                            <hr>

                            <ul class="switcher">
                                <li id="theme7"></li>
                                <li id="theme8"></li>
                                <li id="theme9"></li>
                                <li id="theme10"></li>
                                <li id="theme11"></li>
                                <li id="theme12"></li>
                                <li id="theme13"></li>
                                <li id="theme14"></li>
                                <li id="theme15"></li>
                            </ul>

                        </div>
                    </div>
                    <!--end color switcher-->

    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- simplebar js -->
    <script src="<?php echo base_url('assets/plugins/simplebar/js/simplebar.js') ?>"></script>
    <!-- sidebar-menu js -->
    <script src="<?php echo base_url('assets/js/sidebar-menu.js') ?>"></script>
    <!-- loader scripts -->
    <script src="<?php echo base_url('assets/js/jquery.loading-indicator.js') ?>"></script>
    <!-- Custom scripts -->
    <script src="<?php echo base_url('assets/js/app-script.js') ?>"></script>
    <!-- Chart js -->

    <script src="<?php echo base_url('assets/plugins/Chart.js/Chart.min.js') ?>"></script>

    <!-- Index js -->
    <script src="<?php echo base_url('assets/js/index.js') ?>"></script>


</body>

</html>