<?php $this->load->view('templates/header.php');?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <strong>Patients Details Edit</strong>
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
                <form action="<?php echo site_url('patients/update');?>" method="post">
                <input type="hidden" name="id" value="<?php echo $patients['id']; ?>">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">patients  Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?php echo $patients['name'];?>"></div>
                    </div>
                    <?php echo form_error('name','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $patients['email'];?>"></div>
                    </div>
                    <?php echo form_error('email','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="number-input" class=" form-control-label">Age</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="age" name="age" placeholder="Age" class="form-control" value="<?php echo $patients['age'];?>"></div>
                    </div>
                    <?php echo form_error('age','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                            <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                    <label for="male-radio1" class="form-check-label ">
                                        <input type="radio" id="male" name="gender"  value="1"  <?php echo($patients["gender"] == "1")?'checked':''?>  class="form-check-input">male</label>
                                    <label for="female-radio2" class="form-check-label ">
                                        <input type="radio" id="female" name="gender"  value="2" <?php echo($patients["gender"] == "2")?'checked':''?>  class="form-check-input">female</label>
                                    <label for="other-radio3" class="form-check-label ">
                                        <input type="radio" id="other" name="gender"  value="3" <?php echo($patients["gender"] == "3")?'checked':''?>  class="form-check-input">other</label>
                                </div>
                            </div>
                        </div>
                    <?php echo form_error('gender','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">phone No</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="phoneno" name="phoneno" placeholder="phone No" class="form-control" value="<?php echo $patients['phoneno'];?>"></div>
                    </div>
                    <?php echo form_error('phoneno','<div class="text-danger">',"</div>");?><br>

                    <div class="card-footer">
                    <div class="row col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm" style="padding:10px 20px;background-color:green; color:black;" >Submit</button>
                    </div>
                    </div>  

                </form>
            </div>
        </div>

<?php $this->load->view('templates/footer.php');?>