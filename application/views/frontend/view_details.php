<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
</head>
<body>
<div class="content-wrapper">
    <div class="table-responsive">
        <table class="table table-bordered" id="post-table">
            <thead>
                <tr>
                   
                    <th scope="col">Post Type</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Banner Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attachment</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <tr >
                    
                    <td><?php echo $post->post_type_name; ?></td>
                    <td><?php echo $post->publish_date; ?></td>
                    <td><?php echo $post->event_date; ?></td>
                    <td><img src="<?php echo base_url().$post->banner_img; ?>" width="50" height="50"></td>
                    <td><?php echo $post->title; ?> 
                    <?php if($post->is_new == 1) { ?>
                    <img src="<?php echo base_url('assets/images/new-icon-gif.gif') ?>" alt="" width="20" height="15"> 
                    <?php } ?>
                    </td>
                    <td><?php echo $post->sub_title; ?></td>
                    <td><?php echo html_entity_decode($post->description); ?> <?php echo (strlen($post->description)>30)?"...":""; ?></td>
                    <td>
                    <?php if(!empty($post->attachment)) { ?>
                    <a href="<?php echo base_url().$post->attachment; ?>"> Click Here </a>
                    <?php } ?>
                    </td>
                    
                   
                </tr>
               
                <tr>
                <div id="preview" style="display: flex;">
                    <?php if(isset($post_gallery_image)){
                        foreach ($post_gallery_image as $gimage) {?>
                        <div style="margin-bottom: 20px; margin-right: 20px;"><img src="<?php echo base_url().$gimage->gallery_img; ?>" style="height: 100px; display: block;"></div>  
                    <?php    }
                    } ?>
                </div>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datatables.min.js') ?>"></script>


</body>
</html>