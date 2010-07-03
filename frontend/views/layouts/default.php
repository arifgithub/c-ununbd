<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$page_title?></title>

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
     	 <div class="logo-image">
	     	<a href="<?=$site_url;?>home"><img src="<?=$base_url;?>images/logo-2.jpg" border="0" alt="unun" width="48" height="72" align="left" /></a>
	     </div>
	     <div class="logo-text">
		     <div class="logo-main-text">
		     	<span class="logotxt1">unun</span><span class="logotxt2"> Restaurant</span><br />
		     </div>
		     <div class="slogan">Your Slogan goes here</div>
	     </div>
	     <?php if(isset($_SESSION['http_auth']) && $_SESSION['http_auth']=='arif'):?>
	     	<a href="<?php echo site_url()?>/home/http_logout/">Logout</a>
	     <?php endif;?>
     </div>
     <div id="nav">
     	<ul id="left">
     		<li><a href="<?=$site_url;?>home">Home</a></li>
	     	<li><a href="<?=$site_url;?>reservation">Reservation</a></li>
	     	<li><a href="<?=$site_url;?>home/under_construction">Photo Gallery</a></li>
	     	<li><a href="<?=$site_url;?>home/about_us">About us</a></li>
	     	<li><a href="<?=$site_url;?>home/contact_us">Contact us</a></li>
     	</ul>
     	<ul id="right">
     		<?php 
     		if($this->session->userdata('user_name')){
     		?>
     		<li>Welcome '<?php echo $this->session->userdata('user_name');?>' ! &nbsp; 
	     	<a href="<?=$site_url;?>home/logout">Logout</a></li>
     		<?php 	
     		}else{
     		?>
	     	<li><a href="<?=$site_url;?>home/login">Login</a></li>
     		<?php 	
     		}
     		?>
	     	<li><a href="<?=$site_url;?>home/signup">Signup</a></li>
	     	<li><a href="<?=$site_url;?>feedback">Feedback</a></li> 
     	</ul>
     </div>
  </div>
  <div id="body_content">
  	<?=$content_for_layout?>
  </div>
  <div id="footer">
  	Copyright &copy; 2010 unun Restaurant, All rights reserved.<br />
   </div>
</div>

</body>
</html>
