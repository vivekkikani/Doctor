<?php $this->load->view('templates/header.php');?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <strong>Admit Patients Details Add </strong>
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
                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="select" class=" form-control-label">Patients</label></div>
                            <div class="col-12 col-md-11"><input type="text" id="patients" name="patients" value="<?php echo $admit_details['patientname'];?>" disabled="" class="form-control" ></div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="number-input" class=" form-control-label">patientsAge</label></div>
                            <div class="col-12 col-md-11"><input type="number" id="age" name="age" value="<?php echo $admit_details['age'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label class=" form-control-label">Gender</label></div>
                                <div class="form-check-inline form-check">
                                    <label for="male-radio1" class="form-check-label ">
                                        <input type="radio" id="male" name="gender"  value="1"  <?php echo($admit_details["gender"] == "1")?'checked':''?>  class="form-check-input" disabled="">male</label>
                                    <label for="female-radio2" class="form-check-label ">
                                        <input type="radio" id="female" name="gender"  value="2" <?php echo($admit_details["gender"] == "2")?'checked':''?>  class="form-check-input" disabled="">female</label>
                                    <label for="other-radio3" class="form-check-label ">
                                        <input type="radio" id="other" name="gender"  value="3" <?php echo($admit_details["gender"] == "3")?'checked':''?>  class="form-check-input" disabled="">other</label>
                                </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="number-input" class=" form-control-label">PhoneNo</label></div>
                            <div class="col-12 col-md-11"><input type="number" id="phoneno" name="phoneno" value="<?php echo $admit_details['phoneno'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="number-input" class=" form-control-label">patientsDisease</label></div>
                            <div class="col-12 col-md-11"><input type="text" id="disease" name="disease" value="<?php echo $admit_details['disease'];?>"  disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">Doctors Name</label></div>
                            <div class="col-12 col-md-11"><input type="text" id="doctor" name="doctor" value="<?php echo $admit_details['doctorname'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">DrSpecialization</label></div>
                            <div class="col-12 col-md-11"><input type="text" id="specialization" name="specialization" value="<?php echo $admit_details['specialization'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="date-input" class=" form-control-label">Admit Date</label></div>
                            <div class="col-12 col-md-11"><input type="date" id="admitdate" name="admitdate" value="<?php echo $admit_details['admitdate'];?>"  disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">Dischar Date</label></div>
                            <div class="col-12 col-md-11"><input type="date" id="dischardate" name="dischardate" value="<?php echo $admit_details['dischardate'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">Doctors Fee</label></div>
                            <div class="col-12 col-md-11"><input type="number" id="fee" name="fee"  value="<?php echo $admit_details['fee'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row col-md-1">
                        <?php echo anchor('admitdetails/download/'.$admit_details['id'],'PDF',['class'=>'btn btn-primary']);?>
                    </div>  
            </div>
        </div>

<?php $this->load->view('templates/footer.php');?>