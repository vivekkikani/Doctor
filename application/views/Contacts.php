<header>
	<h1>Contact us</h1>
</header>

<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
            </div>
            <div class="login-form">
            <form action="<?php echo base_url('redirectContacts')?>" method="post">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="texa" name="name" id="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label>Your Moblie</label>
                        <input type="number" name="number" id="number" class="form-control"  placeholder="Moblie Number">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button><br></br>
                </form>
            </div>
        </div>
    </div>
</div>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Google Contacts API</title>
</head>