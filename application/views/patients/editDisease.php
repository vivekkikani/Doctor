<?php $this->load->view('templates/header.php');?>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <strong>Edit Disease</strong>
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
                <form action="<?php echo site_url('disease/update');?>" method="post">
                <input type="hidden" name="id" value="<?php echo $disease['id'];?>">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Disease</label></div>
                        <div class="col-12 col-md-9"><textarea name="disease" id="disease"  placeholder="Disease..." class="form-control"><?php echo $disease['disease'];?></textarea></div>
                    </div>  
                    <?php echo form_error('disease','<div class="text-danger">',"</div>");?><br>
                    <div class="card-footer">
                    <div class="row col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm" style="padding:10px 20px;background-color:green; color:black;" >Submit</button>
                    </div>
                    </div>  
                </form>
            </div>
        </div>
<?php $this->load->view('templates/footer.php');?>