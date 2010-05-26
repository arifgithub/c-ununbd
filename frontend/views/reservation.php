<?php 
unset($_SERVER['PHP_AUTH_USER']);
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
}
?>
<div class="page_body_title">
	<h1>Reservation</h1>
	<form id="form1" name="form1" method="post" action="<?=$site_url?>reservation/submit">
  <table width="100%" border="0" align="center" cellpadding="2">
    <tr>
      <td class="page_message"><?=$msg;?></td>
    </tr>
    <tr>
    	<td style="padding-right:50px;">
    		<?php
			for($i=1; $i<=$total_table; $i++)
			{
			?>
	    	<fieldset id="set_<?=$i;?>" style="border:1px solid #ccc; line-height: 40px;">
				<input name="hid_table[<?=$i;?>]" id="hid_counter_<?=$i;?>" value="<?=$i;?>" type="hidden">
				<legend>Table-<?=$i;?></legend>
				<?php
				$x=1;
				foreach($time_slot as $key => $val)
				{
				?>
				<input type="checkbox" value="<?=$val['id']?>" /><?=date('h:ia',strtotime($val['start_time'])).' <b>To</b> '.date('h:ia',strtotime($val['end_time']));?>&nbsp;&nbsp;
				<?php
					if(($x%4)==0){
						echo "<br />";
					}
					$x++; 
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
