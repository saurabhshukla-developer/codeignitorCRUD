        <h3>Blog List</h3>
        <?php 
        if($this->session->flashdata('success_msg'))
        {
        ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
        <?php
        }
        ?>

        <?php 
        if ($this->session->flashdata('error_msg')) {
            ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('error_msg'); ?>
        </div>
        <?php

    }
    ?>
        <a href="<?php echo base_url('blog/add') ?>" class="btn btn-primary">Add New</a><hr>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Discription</td>
                    <td>Created at</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if($blogs){
                    foreach ($blogs as $blog) {                                
                ?>
                <tr>
                    <td><?php echo $blog->id; ?></td>
                    <td><?php echo $blog->title; ?></td>
                    <td><?php echo $blog->description; ?></td>
                    <td><?php echo $blog->created_at; ?></td>
                    <td>
                        <a href="<?php echo base_url('blog/edit/'.$blog->id); ?>" class="btn btn-info">Edit</a>
                        <a href="<?php echo base_url('blog/delete/' . $blog->id); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
  