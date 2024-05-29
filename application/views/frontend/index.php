<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/datatables.min.css') ?>" rel="stylesheet" />
</head>
<body>
<div class="content-wrapper">
    <div class="table-responsive">
        <table class="table table-bordered" id="post-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Post Type</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Banner Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attachment</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($posts) && count($posts)>0){ 
                        $i=1;
                    foreach ($posts as $post) {

                    
                    $delete_style = ($post->is_active == '0')?"color: red":"";
                    $delete_msg = ($post->is_active == '0')?"Active":"Deactive";
                    
                ?>
                <tr >
                    <th scope="row"><?php echo $i; ?></th>
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
                    
                    <td>
                        <a href="<?php echo base_url('page/'.$post->slug) ?>"><i class="fa fa-edit"></i>View</a>
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
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
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