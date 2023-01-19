<?php $this->load->view('templates/header.php');?>

<!-- Patients Details -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <strong>Patients Details</strong>
                </div>  
            <div class="card-body card-block">
                <input type="hidden" name="id" value="<?php echo $patients['id']; ?>">
                    <div class="row form-group">
                        <div class="col col-md-1"><label for="text-input" class=" form-control-label">patients  Name</label></div>
                        <div class="col-12 col-md-11"><input type="text" id="name" name="name" placeholder="Name" class="form-control"  disabled="" value="<?php echo $patients['patientname'];?>"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-1"><label for="number-input" class=" form-control-label">Age</label></div>
                        <div class="col-12 col-md-11"><input type="number" id="age" name="age" placeholder="Age" class="form-control"  disabled="" value="<?php echo $patients['age'];?>"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-1"><label class=" form-control-label">Gender</label></div>
                            <div class="col col-md-11">
                                <div class="form-check-inline form-check">
                                    <label for="male-radio1" class="form-check-label ">
                                        <input type="radio" id="male" name="gender"  value="1"  <?php echo($patients["gender"] == "1")?'checked':''?>  disabled=""  class="form-check-input">male</label>
                                    <label for="female-radio2" class="form-check-label ">
                                        <input type="radio" id="female" name="gender"  value="2" <?php echo($patients["gender"] == "2")?'checked':''?>  disabled=""  class="form-check-input">female</label>
                                    <label for="other-radio3" class="form-check-label ">
                                        <input type="radio" id="other" name="gender"  value="3" <?php echo($patients["gender"] == "3")?'checked':''?>  disabled=""  class="form-check-input">other</label>
                                </div>
                            </div>
                        </div>

                    <div class="row form-group">
                        <div class="col col-md-1"><label for="disabled-input" class=" form-control-label">phone No</label></div>
                        <div class="col-12 col-md-11"><input type="number" id="phoneno" name="phoneno" placeholder="phone No" class="form-control"  disabled="" value="<?php echo $patients['phoneno'];?>"></div>
                    </div>
            </div>
        </div>
<!-- Patients Details End -->

<!-- Patients Admit Details  -->
<div id="accordion">
    <div class="card">
    <?php foreach($admit_details as $row):?>
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link " data-toggle="collapse" data-target="#collapse<?php echo $row['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $row['id']; ?>">
                <?php echo date("d-m-Y", strtotime ($row['admitdate']));?>
                </button>
            </h5>
        </div>

        <div id="collapse<?php echo $row['id']; ?>" class="collapse" aria-labelledby="heading<?php echo $row['id']; ?>" data-parent="#accordion">
            <div class="card-body">
            
         <!-- Admit Details -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="number-input" class=" form-control-label">PatientsDisease</label></div>
                            <div class="col-12 col-md-11"><input type="text" id="disease" name="disease" value="<?php echo $row['disease'];?>"  disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">Doctors Name</label></div>
                            <div class="col-12 col-md-11"><input type="text" id="doctor" name="doctor" value="<?php echo $row['doctorname'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="date-input" class=" form-control-label">Admit Date</label></div>
                            <div class="col-12 col-md-11"><input type="date" id="admitdate" name="admitdate" value="<?php echo $row['admitdate'];?>"  disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">Dischar Date</label></div>
                            <div class="col-12 col-md-11"><input type="date" id="dischardate" name="dischardate" value="<?php echo $row['dischardate'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="row form-group">
                            <div class="col col-md-1"><label for="text-input" class=" form-control-label">Doctors Fee</label></div>
                            <div class="col-12 col-md-11"><input type="number" id="fee" name="fee"  value="<?php echo $row['fee'];?>" disabled="" class="form-control"></div>
                        </div>
                    </div>
 <!-- Admit Details End-->
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
  <!-- Patients Admit Details End -->
<?php $this->load->view('templates/footer.php');?>