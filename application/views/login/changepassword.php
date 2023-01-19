<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php foreach ($css as $eachCss): ?>
		<link rel=stylesheet href="<?= base_url().'assets/css/'.$eachCss; ?>">
	<?php endforeach;?>

    <link rel="apple-touch-icon" href="<?= base_url('assets/images/favicon'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon'); ?>">

</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                </div>
                <div class="login-form">
                <?php if($error=$this->session->flashdata('good')):?>
                    <div class="row">
                        <div class="col-lg-6" >
                        <div class="alert alert-success">
                            <?= $error; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <form action= "<?=base_url('changepassword/send_email'); ?>" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Verification">
                        </div>
                        <?php echo form_error('email','<div class="text-danger">',"</div>");?>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Send Email</button> <br></br>
                        <div class="w3-container">
                          <a href="<?= base_url('login'); ?>" class="w3-btn w3-black pull-right">Back to signin</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <?php foreach ($js as $eachJs) { ?>
		<script src="<?= base_url().'assets/js/'.$eachJs; ?>"></script>
	<?php }	?>

</body>
</html>