<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $css_url?>theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $css_url?>style.css" />

<script language="javascript" type="text/javascript" src="<?php echo $js_url?>jquery-1.3.2.js"></script>
<?php echo $this->tpl->custom_head() ?>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo $css_url?>ie-style.css" />
<![endif]-->
</head>

<body>
	<div id="container">
    	<div id="header">
    		<div id='lft'><h2>Site Admin Panel</h2></div>
        	<div id='rht'><span class='greeting'><strong>Welcome</strong> <?=$userdata['firstname'].' '.$userdata['lastname'].' ('.$userdata['admin_type'].')'?></span><a href='<?=$site_url?>login/logout' title='logout'><img src='<?=$image_url?>logout.gif' class='logout' alt='logout' /></a></div>
    		<div id="topmenu">
            	<ul>
            		<?php foreach($main_menu  as $controller=>$mm): ?>
						<?php if($controller==$active_controller):?>
							<li class='current'><a href="<?php echo $site_url.$controller.'/'.$mm['action'] ?>" title="<?php echo $mm['tips']; ?>"><?php echo $mm['title']; ?></a></li>
						<?php else: ?>
							<li><a href="<?php echo $site_url.$controller.'/'.$mm['action'] ?>" title="<?php echo $mm['tips']; ?>"><?php echo $mm['title']; ?></a></li>
						<?php endif ?>
					<?php endforeach ?>
             	 </ul>
   			 </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
					<?php foreach($sub_menu  as $actn=>$sm): ?>
						<?php if($actn==$active_method):?>
							<li class="current <?php echo $actn?>"><a href="<?php echo $site_url.$sm['controller'].'/'.$actn ?>" title="<?php echo $sm['tips']; ?>"><?php echo $sm['title']; ?></a></li>
						<?php else: ?>
							<li class="<?php echo $actn?>"><a href="<?php echo $site_url.$sm['controller'].'/'.$actn ?>" title="<?php echo $sm['tips']; ?>"><?php echo $sm['title']; ?></a></li>
						<?php endif ?>
					<?php endforeach ?>
                </ul>
            </div>
      </div>
        <div id="wrapper">
        <?php if($userdata['id_admin_group']==1 || $userdata['id_admin_group']==5): ?>
            <div id="content">
                <?php echo $content_for_layout ?>
            </div>   
           <?php $this->load->element('dash_board'); ?>
           
          <?else:?>
            <div id="content" style='width:940px !important;'>
                <?php echo $content_for_layout ?>
            </div> 
          <?endif?> 
      </div>
        <div id="footer">
        	Copyright &copy;&nbsp; Site 2010
        </div>
</div>
</body>
</html>
