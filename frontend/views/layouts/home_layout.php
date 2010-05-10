<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=en xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$page_title?></title>
<link rel="stylesheet" type="text/css" href="<?=$css_url?>home_style.css">
<link rel="stylesheet" type="text/css" href="<?=$css_url?>content_style.css">
<script type="text/javascript" src="<?=$js_url?>script.js"></script>
<script type="text/javascript" src="<?=$js_url?>jquery-1.4.1.js"></script>
<script language="JavaScript" src="<?=$js_url?>tFader.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<?php echo $this->tpl->custom_head(); ?>	
<script type="text/javascript">
$(document).ready(function(){
	
	$('#banner').cycle({
		fx:     'fade', 
   		 random:  1 
	});
})

</script>

</head>
<body>


<div id='container'>
<div id='content'>

<?php $this->load->element('banner');?>
<div id='breadcrumb'><a href='<?=$site_url?>' title='Robi home'>Home</a></div>
<div id='main-menu'>

 <ul class="menu" id="menu">
	    
	    <?php echo $main_menu_html; ?>
	    
        <li id='search'>
          <form name='frmsearch' id='frmsearch' action='<?=$site_url?>search' method='post'>
          <input name="q" type="text" size="13"  >
          </form>
        </li>
 </ul>

  
</div>
<!--end of menu div -->
 <?php 
 	if(!empty($left_menu))
 	{
 		echo "<div id='leftnav'>";
 		$this->load->element('left_menu');
 		echo '</div>';
 	}
   
 ?> 
 <div id='main'>
 	<?=$content_for_layout?>
 </div>
   
   <div id='footer' >
    <ul>
   <li id='contact-form'><a href="<?=$site_url?>/home/feedback" class="footlink contact">Contact Us  </a></li>
   <li><a href="inner.php" class="footlink">Legal Terms  </a></li>
   <li><a href="http://www.axiata.com" class="footlink">Axiata Group  </a></li>
   <li class="slogan"><img src="<?=$image_url?>axiata.gif" border='0'/></li>
   </ul>
 
   </div >

</DIV> <!-- end of content  -->

</DIV> <!-- end of container -->

<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu","menuhover");
</script>

</BODY></HTML>
