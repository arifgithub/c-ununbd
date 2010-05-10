<div id="box">
                	<table width="100%" id='grid-board'>
						<thead>
						<tr>
						 <th class="first">#</th>
							<?php foreach($labels as $field=>$lbl):?>
										<th>
										<?php if($sort_on==$field):?>
										 <a href="<?=sprintf($sort_url,$field)?>" class='active'>
												<?php echo $lbl;?>
												<?php if($sort_type=='asc'):?>
													<img src="<?=$image_url?>sort_a.gif" />
												<?php else:?>
													<img src="<?=$image_url?>sort_d.gif" />
												<?php endif?>
										</a>
										<?php else: ?>
										 <a href="<?=sprintf($sort_url,$field)?>"><?php echo $lbl;?></a>
										<?php endif?>
										</th>									
										<?php endforeach ?>
										<?php if(!isset($grid_action)||(is_array($grid_action) && !empty($grid_action))):?>
											<th class="last">Action</th>
										<?php endif?>	
						</tr>			
						</thead>
						
						<tbody>
						
						<?php foreach($records as  $row):?>
									  <tr class="<?php echo cycle(array('bg1','bg'));?>">
									    <td><?php echo sprintf('%02d',++$offset);?></td>
										<?php foreach($labels as  $field=>$label):?>
										    <?php if($field=='status'):?>
										    <td class='stat_menu'><a href="<?php echo $site_url.$active_controller;?>/set_status/<?php echo $row['id']?>" class="<?=strtolower($row[$field])?>"><?php echo ucfirst(strtolower($row[$field])); ?> </a>
										    </td>
										   <?php elseif($field=='title'):?>
										    <td class='view'><a href="<?php echo $site_url.$active_controller;?>/view/<?php echo $row['id']?>" title='view details'><?php echo $row[$field]; ?> </a>
										    </td>
										    <?php elseif($field=='ctitle'):?>
										    <td class='view'><a href="<?php echo $site_url;?>content/edit/<?php echo $row['cid']?>" title='view and edit content'><?php echo $row[$field]; ?> </a>
										    </td>
										   <?php elseif($field=='link'): ?>
										    <td class='lnk'><a href="<?php echo $row[$field] ?>" title='visit now'><?php echo $row[$field]; ?> </a></td>
											<?php elseif(in_array($field,array('comment','description'))):?>
										    <td class='view' align='justify'><?php echo word_limiter($row[$field],10); ?></td>
											<?php elseif($field=='order44'): ?>
											<td><input type='text' class='txt-order' value='<?= $row[$field] ?>' style="width:40px;" />
											&nbsp;<a href='' title='save' class='order-save'>save</a>
											</td>
											<?php else:?>
											<td><?php echo $row[$field] ?></td>
											<?php endif?>
					   					<?php endforeach ?>
<?php if(!isset($grid_action)):?>		   					
<td class='actn-btn'>
<a href="<?=$site_url.$active_controller;?>/edit/<?= $row['id'] ?>" title="Click here for edit this item" class='edit'><img src="<?=$image_url?>a_edit.gif" width="16" height="13" border="0" alt="Edit" /></a>&nbsp;
<a href="<?=$site_url.$active_controller;?>/del/<?= $row['id'] ?>" title="Click here for delete this item" class='del'> <img src="<?=$image_url?>a_delete.gif"  width="16" height="13" border="0" alt="Delete" /></a>
</td>
<?php elseif(is_array($grid_action) && !empty($grid_action)):?>	
<td class='actn-btn'>
<?php foreach($grid_action as $gatype=>$gactn):?>
	<?php if($gatype === 'edit'):?> 
	<a href="<?=$site_url.$active_controller.'/'.$gactn.'/'.$row['id'] ?>" title="Click here for edit this item"><img src="<?=$image_url?>a_edit.gif" width="16" height="13" border="0" alt="Edit" /></a>&nbsp;
	<?php elseif($gatype === 'view'):?>
	<a href="<?=$site_url.$active_controller.'/'.$gactn.'/'.$row['id'] ?>" title="Click here for view details"><img src="<?=$image_url?>a_view.gif" width="16" height="13" border="0" alt="View" /></a>&nbsp;
	<?php elseif($gatype === 'del' || $gatype ==='delete' ):?>
	<a href="<?=$site_url.$active_controller.'/'.$gactn.'/'.$row['id'] ?>" title="Click here for delete this item" class='del' ><img src="<?=$image_url?>a_delete.gif" width="16" height="13" border="0" alt="Delete" /></a>&nbsp;
	<?php else:?>
	<a href="<?=$site_url.$active_controller.'/'.$gactn.'/'.$row['id'] ?>" title="Click here for <?php echo $gactn ?> this item" class='<?php echo $gactn;?>'><img src="<?=$image_url?>a_<?php echo $gactn;?>.gif" width="16" height="13" border="0" alt="<?php echo $gactn;?>" /></a>&nbsp;
	<?php endif ?>
<?php endforeach ?>
</td>	
<?php endif ?>
									 </tr>
					<?php endforeach ?>
								
									<?php if(empty($records)):?>
									<tr>
									<td colspan="<?=count($labels)+2;?>" class="no-record">
										No record is found.
									</td>
									</tr>
									<?php endif ?>
					               </tbody>
								</table>
								
					<div id="pager">
					<form name='frm_pagination' id='frm_pagination' method='post'>
						<div id="tnt_pagination">
						<span>Page <strong><?=$cur_page ?>/<?=$total_page ?></strong></span> |
						<span id='pagination-bar'><?php $this->tpl->pagination(); ?></span>
						|<span> View 
									<select name="rec_per_page" id='rec_per_page'>
                    				<?php echo html_options(array(5=>5,10=>10,30=>30,50=>50,100=>100,200=>200),$rec_per_page); ?>
                    			</select> 
                    	
                    per page | Total <strong><?=$total_record?> </strong> records found</span>
						</div> 
			    </form>	
                </div>
								
	 </div>
	 
	 <script type='text/javascript'>
$(document).ready(function() {
	 $('#rec_per_page').bind('change',function(){
	 	$('#frm_pagination').submit();
	 });
	 
	  $('#pagination-bar a').click(function(){
	  	var url=$(this).attr('href');
	 	$('#frm_pagination').attr('action',url).submit();
	 	return false;
	 }); 
	 
	  $('#grid-board th a').click(function(){
	  	var url=$(this).attr('href');
	 	$('#frm_pagination').attr('action',url).submit();
	 	return false;
	 }); 
	 
$('.actn-btn a.del').click(function()
{
	 var message ="Are you sure you want to remove this item?\n Note: item can not be restored after removal!";
     return confirm (message);
}); 

});

</script>
		
