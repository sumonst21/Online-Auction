<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'placeholder'=>'Username'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'placeholder'=>'Password'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NNBID online Bidding</title>
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/flexslider.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/jquery.fancybox.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/responsive.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/font-icon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<!-- header top section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="#"><img style="width: 130px; height: 50px; margin-left: -55px;" src="<?php echo base_url('assets/'); ?>images/nnbid_logo.png" alt=""></a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          
          <li><a href="mainlto:ashokbhatt@nnbid.com">ashokbhatt@nnbid.com</a></li>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
</section>
<!-- header top section --> 

<!-- header content section -->
<section id="hero" class="section ">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-6 hero">
        <div class="hero-content">
          <h1>Easy, Fast &amp; Secure Bidding with NNBID</h1>
        </div>
        <!-- hero --> 
      </div>
      <div class="col-md-5 col-sm-6 hero">
        <div class="hero-content">
          <p style="text-align: left;"><b>Login to your account</b></p>

         <?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		
		<td><input type="text" name="login" id="login" class="col-lg-12" placeholder="Username" style="color: black;"></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
	<tr>
		
		<td><input type="password" name="password" id="password" class="col-lg-12" placeholder="Password" style="color: black;"></td>
		<td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
	</tr>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>

	<tr>
	
		<td colspan="3" style="color: black;">
			<?php echo form_checkbox($remember); ?>
			<?php echo form_label('Remember me', $remember['id']); ?>
			<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
		</td>
		<td></td>
	</tr>
	
			
	
		
</table>
<input type="submit" class="btn btn-primary">

			<?php echo form_close(); ?>


        
        </div>
        <!-- hero --> 
      </div>
    </div>
  </div>
</section>
<!-- header content section --> 

<!-- service section -->
<section id="service" class="service section">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-6">
        <h4>We're expert to create beautiful design & smart technology</h4>
        <p>Nullam at enim mauris. Donec et nunc ipsum. Suspendi tempus fringilla ipsu Cras metus euismod velit gravida at nunc ipsum.</p>
      </div>
      <div class="col-md-7 col-sm-6">
        <div class="col-md-4 col-sm-6 service text-center"> <span class="icon icon-browser"></span>
          <div class="service-content">
            <h5>Web & Mobile</h5>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 service text-center"> <span class="icon icon-trophy"></span>
          <div class="service-content">
            <h5>Branding</h5>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 service text-center"> <span class="icon icon-megaphone"></span>
          <div class="service-content">
            <h5>Digital Marketing</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- service section --> 
<!-- footer section -->
<footer class="footer">
  <div class="container">
    <div class="col-md-6 left">
      <h4>Let's work together</h4>
      <p> Call: xxx.xxx.xxxx OR Email : <a href="mailto:ashokbhatt@nnbid.com"> ashokbhatt@nnbid.com </a></p>
    </div>
    <div class="col-md-6 right">
      <p>© 2017 All rights reserved.<br>
        Made with <i class="fa fa-heart pulse"></i> by <a href="http://www.nnbid.com/">NNBID</a></p>
    </div>
  </div>
</footer>
<!-- footer section --> 

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/jquery.fancybox.pack.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/retina.min.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/modernizr.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
</body>
</html>''