<div id="bg"></div>
<div class="page_body_title">
	<h1>Reservation</h1>
	<form id="form1" name="form1" method="post" action="<?=$site_url?>reservation/submit">
  <table width="100%" border="0" align="center" cellpadding="2">
    <tr>
      <td class="page_message"><?=$msg;?></td>
    </tr>
    <tr>
    	<td>
    		<?php
			for($i=1; $i<=$total_table; $i++)
			{
			?>
	    	<fieldset id="set_<?=$i;?>" style="border:1px solid #ccc">
				<input name="hid_table[<?=$i;?>]" id="hid_counter_<?=$i;?>" value="<?=$i;?>" type="hidden">
				<legend>Table-<?=$i;?></legend>
				<?php
				foreach($time_slot as $key => $val)
				{
				?>
				<input type="checkbox" value="<?=$val['id']?>" /><?=date('h:mA',strtotime($val['start_time'])).' to '.$val['end_time'];?>
				<?php 
				}
				?>
			</fieldset>
			<br />
			<?php
				$i++;
			}
			?>
    	</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">
      	<input type="button" id="add_more" value=" Add More " />&nbsp;
      	<input type="button" id="remove" value=" Remove Last One " />&nbsp;
      	<input type="submit" name="Submit" value="Submit" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
	
</div>