<div id="box">
				<?php echo $this->session->flashdata('message') ?>
                	<h3>Frontend VAS list</h3>
               <?php $this->load->element('grid_board');?>
</div>
<script type='text/javascript'>
$(document).ready(function() {
	var menuItems=[
					{title:'Publish',icon:'<?=$image_url."publish.png"?>',value:'1'},
					{title:'Unpublish',icon:'<?=$image_url."unpublish.png"?>',value:'0'}
				  
				  ];
$("td.stat_menu a").statusMenu({items:menuItems}); 
});
</script>