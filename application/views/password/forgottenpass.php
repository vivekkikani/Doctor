<?php $this->load->view('user_tempates/header.php');?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <strong>Forgotten Password</strong>
                </div>  
            <div class="card-body card-block">

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
                <form action="<?php echo site_url('forgottenpass/changepass');?>" method="post">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Old Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" id="oldpass" name="oldpass" placeholder="Old Password" class="form-control"></div>
                    </div>
                    <?php echo form_error('oldpass','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="mprice-input" class=" form-control-label">New Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" id="newpass" name="newpass" placeholder="New Password" class="form-control"></div>
                    </div>
                    <?php echo form_error('newpass','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="number-input" class=" form-control-label">Confirm password</label></div>
                        <div class="col-12 col-md-9"><input type="password" id="confirmpass" name="confirmpass" placeholder="Confirm password" class="form-control"></div>
                    </div>
                    <?php echo form_error('confirmpass','<div class="text-danger">',"</div>");?><br>

                    <div class="card-footer">
                    <div class="row col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm" style="padding:10px 20px;background-color:green; color:black;" >Submit</button>
                    </div>
                    </div>  

                </form>
            </div>
        </div>

<?php $this->load->view('user_tempates/footer.php');?>