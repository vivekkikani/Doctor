<?php $this->load->view('templates/header.php');?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <strong>Medicine Details Add </strong>
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
                <form action="<?php echo site_url('medicine/medicineDetails');?>" method="post">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Medicine  Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="mname" name="mname" placeholder="Medicine Name" class="form-control"></div>
                    </div>
                    <?php echo form_error('name','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="mprice-input" class=" form-control-label">Medicine Price</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="mprice" name="mprice" placeholder="Medicine Price" class="form-control"></div>
                    </div>
                    <?php echo form_error('mprice','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="number-input" class=" form-control-label">Medicine Stock</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="mstock" name="mstock" placeholder="Medicine Stock" class="form-control"></div>
                    </div>
                    <?php echo form_error('mstock','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="date-input" class=" form-control-label">Manufacturar Date</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="manufacturardate" name="manufacturardate" placeholder="Manufacturar Date" class="form-control"></div>
                    </div>
                    <?php echo form_error('manufacturardate','<div class="text-danger">',"</div>");?><br>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Expiry Date</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="expdate" name="expdate" placeholder="Expiry Date " class="form-control"></div>
                    </div>
                    <?php echo form_error('expdate','<div class="text-danger">',"</div>");?><br>

                    <div class="card-footer">
                    <div class="row col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm" style="padding:10px 20px;background-color:green; color:black;" >Submit</button>
                    </div>
                    </div>  

                </form>
            </div>
        </div>

<?php $this->load->view('templates/footer.php');?>