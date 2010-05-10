<div id="bg"></div>
<div class="page_body_title">
	<h1>Login</h1>
</div>
<div style="height:300px">
	<form name="form1" method="post" action="">
	  <table width="300" border="0" align="center" cellpadding="2">
	    <tr>
	      <td colspan="3" class="page_message"><?php echo $msg;?></td>
	    </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	    </tr>
	    <tr>
	      <td>User Name </td>
	      <td>&nbsp;</td>
	      <td><input type="text" name="user_name" ></td>
	    </tr>
	    <tr>
	      <td>Password</td>
	      <td>&nbsp;</td>
	      <td><input type="password" name="user_password"></td>
	    </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td><input type="submit" name="Submit" value=" Login "></td>
	    </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	    </tr>
	  </table>
	</form>
</div>
<script type="text/javascript">
jQuery(function ($) {
	$("input[name='user_name']").focus();
});
</script>
