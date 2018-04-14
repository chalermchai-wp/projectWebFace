<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login</title>
<meta name="robots" content="noindex, nofollow" />
<meta name="author" content="UR-MATE">
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
<!-- <style>
	<?php echo $this->config->item('head_css'); ?>
</style> -->

</head>
<body>

<form method="post" action="<?php echo site_url('Login/check_login'); ?>">
	<input type="text" name="username"><br>
	<input type="password" name="password"><br>
	<input type="submit" value="Login">
</form>

</body>
</html>
