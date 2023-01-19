<?php $this->load->view('templates/header.php');?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <strong>Admit Patients Details Edit </strong>
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
                <form action="<?php echo site_url('admitdetails/update');?>" method="post">
                <input type="hidden" name="id" value="<?php echo $admit_details['id']; ?>">
                    <div class="row form-group">
                        <div class="col col-md-1"><label for="select" class=" form-control-label">Patients</label></div>
                        
                        <div class="col-11 col-md-10">
                            <select name="patients" id="patients" class="form-control">
                                <option value="0">Please select Patients</option>
                                <?php foreach($patients as $row):?>
                                <?php echo $row['name'];?>
                                <option value="<?= $row['id'] ?>"<?= (in_array($row['id'],$admit_details)) ? 'selected':''; ?>><?php echo $row['name']?> - <?php echo $row['age']?> - <?php echo $row['phoneno']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-1"><label for="select" class=" form-control-label">Disease</label></div>
                        <div class="col-12 col-md-10">
                            <select name="disease" id="disease" class="form-control">
                                <option value="0">Please select Disease</option>
                                <?php foreach($disease as $row):?>
                                <?php echo $row['name'];?>
                                <option value="<?= $row['id'] ?>"<?= (in_array($row['id'],$admit_details)) ? 'selected':''; ?>><?= $row['disease']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-1"><label for="select" class=" form-control-label">Doctor</label></div>
                        <div class="col-12 col-md-10">
                            <select name="doctor" id="doctor" class="form-control">
                                <option value="0">Please select Doctor</option>
                                <?php foreach($doctor as $row):?>
                                <?php echo $row['name'];?>
                                <option value="<?= $row['id'] ?>"<?= (in_array($row['id'],$admit_details)) ? 'selected':''; ?>><?php echo $row['name']?> -<?php echo $row['specialization']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-1"><label for="date-input" class=" form-control-label">Admit Date</label></div>
                        <div class="col-12 col-md-10"><input type="date" id="admitdate" name="admitdate"  value="<?php echo $admit_details['admitdate'];?>" class="form-control" ></div>
                    </div>
                    <?php echo form_error('admitdate','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-1"><label for="text-input" class=" form-control-label">Dischar Date</label></div>
                        <div class="col-12 col-md-10"><input type="date" id="dischardate" name="dischardate" value="<?php echo $admit_details['dischardate'];?>" class="form-control"></div>
                    </div>
                    <?php echo form_error('dischardate','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-1"><label for="text-input" class=" form-control-label">Doctors Fee</label></div>
                        <div class="col-12 col-md-10"><input type="number" id="fee" name="fee" value="<?php echo $admit_details['fee'];?>" class="form-control"></div>
                    </div>
                    <?php echo form_error('fee','<div class="text-danger">',"</div>");?><br>

                    <div class="card-footer row">
                    <div class="row col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm" style="padding:10px 20px;background-color:green; color:black;" >Submit</button>
                    </div>  
                    </div>
                </form>
            </div>
        </div>

<?php $this->load->view('templates/footer.php');?>  