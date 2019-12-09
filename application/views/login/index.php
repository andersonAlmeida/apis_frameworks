<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bootstrap Dashboard by Bootstrapious.com</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/css/fontastic.css">
	<!-- Google fonts - Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/css/style.default.css" id="theme-stylesheet">

	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/custom/css/custom.css">

	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>_assets/theme/img/favicon.ico">
</head>

<body>
	<div class="page login-page">
		<div class="container">
			<div class="form-outer text-center d-flex align-items-center">
				<div class="form-inner">
					<div class="logo text-uppercase"><span>Bootstrap</span><strong class="text-primary">Dashboard</strong></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
					<?php echo form_open('login/login'); ?>
						<div class="form-group-material">
							<input type="email" name="email" class="input-material" id="email">
							<label class="label-material" for="email">Endereço de email</label>
							<?php echo form_error('email', '<p class="error-feedback">'); ?>
						</div>
						<div class="form-group-material">
							<input type="password" name="senha" class="input-material" id="senha">
							<label class="label-material" for="senha">Senha</label>
							<?php
								echo form_error('senha', '<p class="error-feedback">');
								if ($login_not_found === TRUE) {
									echo '<p class="error-feedback">Usuário ou senha incorretos.</p>';
								}
							?>
						</div>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</form><a href="<?php echo base_url(); ?>login/recover/" class="forgot-pass">Esqueci minha senha.</a>
				</div>
				<div class="copyrights text-center">
					<p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
					<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
				</div>
			</div>
		</div>
	</div>
	<!-- JavaScript files-->
	<script src="<?php echo base_url(); ?>_assets/theme/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>_assets/theme/vendor/popper.js/umd/popper.min.js"> </script>
	<script src="<?php echo base_url(); ?>_assets/theme/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>_assets/theme/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- Main File-->
    <script src="<?php echo base_url(); ?>_assets/theme/js/front.js"></script>
</body>

</html>
