<?php $this->load->view('templates/header.php');?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded h-100 p-3">
                            <h6 class="mb-4">Password Change</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($error=$this->session->flashdata('good')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-success">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form  action="<?php echo site_url('forgottenpassword/changepass');?>" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Old password</label>
                                    <input type="password" name="oldpass" class="form-control" id="oldpass">
                                </div>
                                <?php echo form_error('oldpass');?>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">New password</label>
                                    <input type="password" name="newpass" class="form-control" id="newpass">
                                </div>
                                <?php echo form_error('newpass');?>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Confirm password</label>
                                    <input type="password" name="confirmpass" class="form-control"  id="password">
                                </div>
                                <?php echo form_error('confirmpass');?>
                                <button type="submit" name="submit" value="Change" class="btn btn-primary">Change</button>
                            </form> 
                            <p><?php echo $this->session->flashdata('resp_message');?></p>
                        </div>
                    </div>
                </div>
            </div>

<?php $this->load->view('templates/footer.php');?>