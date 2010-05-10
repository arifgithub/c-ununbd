<div id="box">
				<?php echo $this->session->flashdata('message') ?>
                	<h3>Users</h3>
                <?php $this->load->element('grid_board');?>
 </div>
<script type='text/javascript'>
$(document).ready(function() {
	var menuItems=[
					{title:'Active',icon:'<?=$image_url."stat_active.gif"?>',value:'Active'},
					{title:'Inactive',icon:'<?=$image_url."stat_inactive.gif"?>',value:'Inactive'},
					{title:'Pending',icon:'<?=$image_url."stat_pending.gif"?>',value:'Pending'}
				  
				  ];
$("td.stat_menu a").statusMenu({items:menuItems}); 
});

</script>