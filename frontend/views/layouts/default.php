<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>UNUN :: Restaurant</title>

<link rel="icon" href="<?=$base_url?>images/logo-2.jpg" type="image/x-icon" />
<link rel="shortcut icon" href="<?=$base_url?>images/logo-2.jpg" type="image/x-icon" />

<link href="<?=$base_url;?>css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?=$js_url?>jquery-1.4.1.js"></script>

<?php echo $this->tpl->custom_head(); ?>	
</head>
<body>
<div id="wrapper">
  
  <div id="header">
    <div id="bg"></div>
     <div id="logo">
	     <img src="<?=$base_url;?>images/logo-2.jpg" alt="unun" width="48" height="72" align="left" />
	     <div style="padding-top:30px;">
		     <span class="logotxt1">unun</span><span class="logotxt2"> Restaurant</span><br />
		     <span style="margin-left:15px;font-size:10px;">Your Slogan goes here</span>
	     </div>
     </div>
     <div id="nav">
     	<div id="left">
	     	<a href="<?=$site_url;?>home">Home</a> &nbsp;|&nbsp; 
	     	<a href="#">Reservation</a> &nbsp;|&nbsp; 
	     	<a href="#">Photo Gallery</a> &nbsp;|&nbsp; 
	     	<a href="#">About us</a> &nbsp;|&nbsp; 
	     	<a href="#">Contact us</a>
     	</div>
     	<div id="right">
     		<?php 
     		if($this->session->userdata('user_name')){
     		?>
     		Welcome '<?php echo $this->session->userdata('user_name');?>' ! &nbsp; 
	     	<a href="<?=$site_url;?>home/logout">Logout</a> &nbsp;|&nbsp; 
     		<?php 	
     		}else{
     		?>
	     	<a href="<?=$site_url;?>home/login">Login</a> &nbsp;|&nbsp; 
     		<?php 	
     		}
     		?>
	     	<a href="<?=$site_url;?>home/signup">Signup</a> &nbsp;|&nbsp; 
	     	<a href="<?=$site_url;?>feedback">Feedback</a> 
     	</div>
     </div>
  </div>
  <?=$content_for_layout?>
  <div id="footer">
  	Copyright &copy; 2010 unun Restaurant, All rights reserved.<br />
   </div>
</div>

</body>
</html>
