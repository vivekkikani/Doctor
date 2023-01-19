<!doctype html>
<head>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" href="<?= base_url('assets/images/favicon'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    <!-- <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
   -->
    <?php foreach ($css as $eachCss) { ?>
		<link rel=stylesheet href="<?= base_url().'assets/css/'.$eachCss; ?>">
	<?php }	?>
    
    <script>
    var BASE_URL = "<?= base_url() ?>"
    </script>

    <style>
	    .error{color:red!important;}
	</style>
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                </div>
                <div class="login-form">
                <form method="post" name="loginForm" id="loginForm">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="texa" name="email" id="email" class="form-control" placeholder="Email or Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                        </div>
                        <div class="social-login-content">
                        <?php
                            if(!isset($login_button))
                            {

                                // $user_data = $this->session->userdata('user_data');
                                // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                                // echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
                                // echo '<h3><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
                                // echo '<h3><b>Email :</b> '.$user_data['email_address'].'</h3>';
                                // echo '<div align="center">'.$login_button . '</div>';
                            }
                            else
                            {
                             echo '<div align="center">'.$login_button . '</div>';
                            }
                        ?>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button><br></br>
                        <div class="checkbox">
                            <div class="w3-container">
                              <a href="<?= base_url('changepassword'); ?>" class="w3-btn w3-blue pull-right">Forgotten Password?</a>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($js as $eachJs) { ?>
		<script src="<?= base_url().'assets/js/'.$eachJs; ?>"></script>
	<?php }	?>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

</body>
</html>
<script type="text/javascript">
$(document).ready(function () {
    $("#loginForm").validate({
		rules: {
			email: {
				required: true
			},
            password:{
                required: true
            }
		},
		messages: {
			email: "Please enter email or username",
            password: "Please enter password"
		},

        submitHandler: function (form) {
            var email = $("#email").val().trim();
            var password = $("#password").val().trim();

            if( email != "" && password != "" ){
			$.ajax({
				type: "POST",
				url: BASE_URL + "/login/login",
				data: $("#loginForm").serialize(),
				success: function (response) {
					var res = JSON.parse(response);
					if (res.code == '1') {
						if(res.role == '1'){
							window.location.href = BASE_URL + 'home';
						}
						else if(res.role == '2'){
							window.location.href = BASE_URL + 'doctor';
						}
						else if(res.role == '3'){
							window.location.href = BASE_URL + 'nurse';
						}
					}
					else {
						toastr.error(res.msg);
					}
				}
			});
		    }
        }
    });
});
</script>