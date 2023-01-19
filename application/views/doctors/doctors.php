<?php $this->load->view('templates/header.php');?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <strong>Doctors Details </strong>
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
                <form action="<?php echo site_url('doctors/doctorsDetails');?>" method="post">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Doctors Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Doctors Name" class="form-control"></div>
                    </div>
                    <?php echo form_error('name','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Doctors Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control"></div>
                    </div>
                    <?php echo form_error('email','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
                        <div class="col-12 col-md-9"><textarea name="address" id="address" rows="9" placeholder="Address..." class="form-control"></textarea></div>
                    </div>  

                    <?php echo form_error('address','<div class="text-danger">',"</div>");?><br>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Moblie No</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="moblieno" name="moblieno" placeholder="Moblie No" class="form-control"></div>
                    </div>
                    <?php echo form_error('moblieno','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Doctors Fee</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="fee" name="fee" placeholder="Doctors Fee" class="form-control"></div>
                    </div>
                    <?php echo form_error('fee','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Specialization</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="specialization" name="specialization" placeholder="Specialization" class="form-control"></div>
                    </div>
                    <?php echo form_error('specialization','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class="form-control-label">Available Time Doctor</label></div>
                        <div class="panel panel-default">
                              <div class="panel-body">
                              <div id="education_fields"></div>
                                <div class="col-sm-5 nopadding">
                                <div class="form-group">
                                <input type="time" class="form-control" id="availabletimedoctor" name="availabletimedoctor[]" value="">
                              </div>
                            </div>
                            <div class="col-sm-5 nopadding">
                              <div class="form-group">
                                <input type="time" class="form-control" id="time" name="time[]" value="" >
                              </div>
                            </div>         
                            <!-- <div class="col-sm-3 nopadding">
                              <div class="form-group">
                                <input type="date" class="form-control" id="availabletimedoctor" name="availabletimedoctor" value="" >
                              </div>
                            </div>                  -->
                              <div class="form-group">
                                  <div class="input-group-btn">
                                    <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                  </div>
                                </div>
                            </div>
                        </div>

                    <?php echo form_error('availabletimedoctor','<div class="text-danger">',"</div>");?><br>

                    <div class="card-footer">
                    <div class="row col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm" style="padding:10px 20px;background-color:green; color:black;" >Submit</button>
                    </div>
                    </div>  

                </form>
            </div>
        </div>
<script>
    var room = 1;
    function education_fields() {
    
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
    	divtest.setAttribute("class", "form-group removeclass"+room);
    	var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="col-sm-5 nopadding"><div class="form-group"> '+
        '<input type="time" class="form-control" name="availabletimedoctor[]" value="" placeholder="Time">'+
        '</div></div><div class="col-sm-5 nopadding">'+
        '<div class="form-group">'+
         '<input type="time" class="form-control" name="time[]" value="" placeholder="Time"></div>'+
         '</div> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> '+
         '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
         '</button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest)
        }
       function remove_education_fields(rid) {
    	   $('.removeclass'+rid).remove();
        }
</script>

<?php $this->load->view('templates/footer.php');?>