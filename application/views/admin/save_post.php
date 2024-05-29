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
    <!-- Ckeditor-->
    <!-- <link href="<?php echo base_url('assets/editor/summernote-bs4.min.css') ?>" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    

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
                                                <div class="card-title"><?php echo !empty($post->id)?"Edit":"Add New" ?> Post</div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php if($this->session->flashdata('success')){?>
                                            <p class="success-msg"><?php  echo $this->session->flashdata('success');?></p>	
                                            <?php } ?>
                                            <?php if($this->session->flashdata('error')){?>
                                            <p class="error-msg"><?php  echo $this->session->flashdata('error');?></p>	
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/savePost') ?>">
                                            <input type="hidden" name="post_id" value="<?php echo !empty($post->id)?$post->id:Null ?>">

                                            <div class="form-group">
                                                <label for="input-1">Post Type <span style="color:red">*</span></label>
                                                

                                                <select name="post_type" id="post_type" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php if(count($post_type)>0) {
                                                        foreach ($post_type as $type) { 
                                                            
                                                        ?>
                                                        
                                                            <option value="<?php echo $type->id; ?>" <?php if(isset($post->post_type)){
                                                                echo ($type->id == $post->post_type)?"selected":"";
                                                            } ?> <?php echo (set_value('post_type')==$type->id)?" selected=' selected'":""?> ><?php echo $type->post_type_name; ?></option>
                                                    <?php    }
                                                    }
                                                    ?>
                                                    
                                                </select>
                                                <?php $post_type_err = form_error('post_type'); if(isset($post_type_err)) { ?>
                                                <span style="color:red"><?php echo $post_type_err; ?></span>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-4">Banner Image <span style="color:red">*</span></label>
                                                <!-- <input type="file" class="form-control"  id="banner_img" name="banner_img" > -->
                                                <input type="file" id="banner_img" name="banner_img" accept="image/*" >
                                                <?php $banner_img_err = form_error('banner_img'); if(isset($banner_img_err)) { ?>
                                                <span style="color:red"><?php echo $banner_img_err; ?></span>
                                                <?php } ?>
                                                <div id="preview_banner">
                                                    <?php if(!empty($post->banner_img)){ ?>
                                                    <div style="margin-bottom: 20px; margin-right: 20px;"><img src="<?php echo base_url().$post->banner_img ?>" style="height: 100px; display: block;"></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-1">Title <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title Of Post" value="<?php echo !empty($post->title)?$post->title:set_value('title') ?>">
                                                <?php $title_err = form_error('title'); if(isset($title_err)) { ?>
                                                <span style="color:red"><?php echo $title_err; ?></span>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-2">Sub Title</label>
                                                <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Sub Title Of Post" value="<?php echo !empty($post->sub_title)?$post->sub_title:set_value('sub_title') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="input-3">Description <span style="color:red">*</span></label>
                                                <textarea   id="description" name="description" placeholder="Enter description"> <?php echo !empty($post->description)?$post->description:set_value('description') ?></textarea>
                                                <?php $description_err = form_error('description'); if(isset($description_err)) { ?>
                                                <span style="color:red"><?php echo $description_err; ?></span>
                                                <?php } ?>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="input-2">Event Date</label>
                                                <input type="date" class="form-control" name="event_date" id="event_date"  value="<?php echo !empty($post->event_date)?$post->event_date:set_value('event_date') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="input-2">Publish Date</label>
                                                <input type="date" class="form-control" name="publish_date" id="publish_date"  value="<?php echo !empty($post->publish_date)?$post->publish_date:set_value('publish_date') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="input-4">Attachment</label>
                                                <input type="file" id="attachment" name="attachment" accept=".jpg, .jpeg, .pdf">
                                                
                                                <?php if(isset($attachment_err)) { ?>
                                                <span style="color:red"><?php echo $attachment_err; ?></span>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <div id="preview_attachment"> 

                                                <?php if(isset($post->attachment) && !empty($post->attachment)) { ?>
                                                <iframe  src="<?php echo base_url().$post->attachment; ?>" >
                                                </iframe>
                                                <?php } ?>

                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label for="input-1">Is New</label>
                                                <input type="checkbox" class="form-control" name="is_new" id="is_new"  value="1" <?php echo set_checkbox('is_new', '1'); ?>  <?php echo !empty($post->is_new)?"checked":"" ?>>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label for="input-4">Gallery Image</label>
                                                <!-- <input type="file" multiple class="form-control gallery_img" name="gallery_img" name="gallery_img[]"  > -->
                                                <input type="file" name="gallery_img[]" id="gallery_img" accept="image/*" multiple>
                                                <div id="preview" style="display: flex;">
                                                    <?php if(isset($post_gallery_image)){
                                                        foreach ($post_gallery_image as $gimage) {?>
                                                        <div style="margin-bottom: 20px; margin-right: 20px;"><img src="<?php echo base_url().$gimage->gallery_img; ?>" style="height: 100px; display: block;"></div>  
                                                    <?php    }
                                                    } ?>
                                                </div>
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
    <script src="<?php echo base_url('assets/editor/summernote-bs4.min.js') ?>"></script>
    
    

    <script>
        // var ckfinderPath = '<?php echo base_url() ?>'+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json';
        // console.log(ckfinderPath);
        // ClassicEditor
        //     .create( document.querySelector( '#description' ), {
        //         ckfinder: {
        //             uploadUrl: ckfinderPath
        //         }
        //     } )
        //     .catch( error => {
        //         console.error( error );
        //     } );

           
    </script>




<script>
	document.getElementById('gallery_img').addEventListener('change', function(event) {
    var files = event.target.files;
    var preview = document.getElementById('preview');
    
    // Clear any existing content
    preview.innerHTML = '';

    // Loop through all selected files
    for (var i = 0; i < files.length; i++) {
      var file = files[i];

      // Only process image files
      if (!file.type.match('image.*')) {
        continue;
      }

      var imgContainer = document.createElement('div');
      imgContainer.style.marginBottom = '20px'; // Spacing between each image container
      imgContainer.style.marginRight = '20px';

      var img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.style.height = '100px';
      img.style.display = 'block'; // Ensure the image is displayed in a block to put it on a new line
      //img.style.marginBottom = '10px';

    //   var fileInfo = document.createElement('p');
    //   fileInfo.textContent = `File Name: ${file.name}, Type: ${file.type}, Size: ${file.size} bytes`;
    //   fileInfo.style.fontSize = '14px';
    //   fileInfo.style.marginTop = '0';

      // Append the image and file info to the container
      imgContainer.appendChild(img);
     // imgContainer.appendChild(fileInfo);

      // Append the container to the preview div
      preview.appendChild(imgContainer);
    }
  });
</script>

<script>
	document.getElementById('banner_img').addEventListener('change', function(event) {
    var files = event.target.files;
    var preview_banner = document.getElementById('preview_banner');
    
    // Clear any existing content
    preview_banner.innerHTML = '';

    // Loop through all selected files
   for (var i = 0; i < files.length; i++) {
      var file = files[i];

      // Only process image files
      if (!file.type.match('image.*')) {
        continue;
      }

      var imgContainer = document.createElement('div');
      imgContainer.style.marginBottom = '20px'; // Spacing between each image container
      imgContainer.style.marginRight = '20px';

      var img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.style.height = '100px';
      img.style.display = 'block'; // Ensure the image is displayed in a block to put it on a new line
    
      imgContainer.appendChild(img);
  
      preview_banner.appendChild(imgContainer);
    }
  });
</script>

<script>
	document.getElementById('attachment').addEventListener('change', function(event) { 
    var files = event.target.files;
    var preview_attachment = document.getElementById('preview_attachment');
    
    // Clear any existing content
    preview_attachment.innerHTML = '';

    // Loop through all selected files
   for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var imgContainer = document.createElement('div');
      imgContainer.style.marginBottom = '20px'; // Spacing between each image container
      imgContainer.style.marginRight = '20px';

      var iframe = document.createElement('iframe');
      iframe.src = URL.createObjectURL(file);
      iframe.style.height = '200px';
      iframe.style.display = 'block'; // Ensure the image is displayed in a block to put it on a new line
    
      imgContainer.appendChild(iframe);
    
      preview_attachment.appendChild(imgContainer);
    }
  });
</script>
<script>
      $('#description').summernote({
        placeholder: 'Enter description',
        tabsize: 2,
        height: 100
      });
    </script>
</body>

</html>