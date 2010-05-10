<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$page_title?> </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?= $css_url?>inner_style.css" />
<link rel="stylesheet" type="text/css" href="<?=$css_url?>content_style.css">
<script type="text/javascript" src="<?= $js_url?>jquery-1.4.2.js"></script>
<script type="text/javascript" src="<?= $js_url?>script.js"></script>
<script language="JavaScript" src="<?=$js_url?>tFader.js"></script>
<?php echo $this->tpl->custom_head(); ?>		
</head>

<body>

<div id="container">
<div id="content">

<div id="header"><img src='<?=$image_url?>innerpage_header.jpg' /></div>
<div id='breadcrumb'><a href='<?=$site_url?>' title='Robi home'>Home</a></div>
<div id="mainnav">
 <ul class="menu" id="menu">
	<?=$main_menu_html?>
    <li  id='search'>
     <form name='frmsearch' id='frmsearch' action='<?=$site_url?>search' method='post'>
    <input name="q"  value='<?=$q?>' type="text" size="12"  >
    </form>
    </li>
</ul>
</div>
<!--end of menu div -->
<div id='main'> 
<?if(!empty($left_menu)):?>
		<div id='leftnav' > 
		<? $this->load->element('left_menu');?>
		</div>
		<div id="innercontent"> 
	<?else:?>
	<div id="innercontent" style='width:100% !important;'> 	
	<?endif?>

	<?=$content_for_layout?>
</div>

</div>
<!-- end main-->


   
   <div id=footer >
   <ul>
   <li><a href="#" class="footlink">Contact Us  </a></li>
   <li ><a href="#" class="footlink">Legal Terms  </a></li>
   <li ><a href="#" class="footlink">Axiata Group  </a></li>
   <li  class="slogan"><img src='<?=$image_url?>axiata.gif' border='0' /></li>
   </ul>
   </div >

</DIV> <!-- end of content  -->

</DIV> <!-- end of container -->
 <script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu","menuhover");

</script>
</body>
</html>