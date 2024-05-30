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
    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet" />
    <!-- Datatable CSS-->
    <link href="<?php echo base_url('assets/css/datatables.min.css') ?>" rel="stylesheet" />

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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-md-6"><h5 class="card-title">Post List</h5></div>
                                            <div class="col-md-6 text-right" ><h5 class="card-title"><a href="<?php echo base_url('admin/addPost'); ?>">Add Post</a></h5></div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="post-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Post Type</th>
                                                        <th scope="col">Banner Image</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Sub Title</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Active</th>
                                                        <th scope="col">Is New</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($posts) && count($posts)>0){ 
                                                         $i=1;
                                                        foreach ($posts as $post) {

                                                        
                                                        $delete_style = ($post->is_active == '0')?"color: red":"";
                                                        $delete_msg = ($post->is_active == '0')?"Active":"Deactive";

                                                        $is_new_style = ($post->is_new == '0')?"color: red":"";
                                                        $is_new_msg = ($post->is_new == '0')?"add new":"remove new";
                                                       
                                                    ?>
                                                    <tr >
                                                        <th scope="row"><?php echo $i; ?></th>
                                                        <td><?php echo $post->post_type_name; ?></td>
                                                        <td><img src="<?php echo base_url().$post->banner_img; ?>" width="50" height="50"></td>
                                                        <td><?php 
                                                        $string = $post->title;
                                                        if(strlen($string) > 25) $string = substr($string, 0, 25).'...';
                                                        echo $string;
                                                        ?></td>
                                                        <td><?php 
                                                        $string = $post->sub_title;
                                                        if(strlen($string) > 25) $string = substr($string, 0, 25).'...';
                                                        echo $string;
                                                        ?></td>
                                                        <td><?php 
                                                        
                                                         //echo html_entity_decode($post->description); ?> <?php //echo (strlen($post->description)>30)?"...":""; 

                                                        $string = strip_tags($post->description);
                                                        if(strlen($string) > 50) $string = substr($string, 0, 50).'...';
                                                        echo $string;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('admin/editPost/'.$post->id) ?>"><i class="fa fa-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td>                                                            
                                                            <a onclick="return confirm('Are you sure want to <?php echo $delete_msg; ?> this post ?')" href="<?php echo base_url('admin/deletePost/'.$post->id) ?>" style="<?php echo  $delete_style; ?>"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                        <td>                                                            
                                                            <a onclick="return confirm('Are you sure want to <?php echo $is_new_msg; ?> flag ?')" href="<?php echo base_url('admin/newFlag/'.$post->id) ?>" style="<?php echo  $is_new_style; ?>"><i class="fa fa-flag" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                     $i++; }
                                                    }else{ 
                                                    ?>
                                                     <tr>
                                                        <td colspan="7">No Record Found</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <!-- Data table js -->
    <script src="<?php echo base_url('assets/js/datatables.min.js') ?>"></script>

    <script>

        $('#post-table').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'print',
				text: 'Print all'
			},
			{
				extend: 'print',
				text: 'Print current page',
				exportOptions: {
					modifier: {
						  page: 'current'
					}
				}
			}
		],
		select: true
	} );
    </script>

</body>

</html>