<div id="bg"></div>
<div class="page_body_title">
	<h1>Feedback</h1>
</div>
<form id="form1" name="form1" method="post" action="<?=$site_url?>feedback/submit">
  <table width="750" border="0" align="center" cellpadding="2">
    <tr>
      <td colspan="3" class="page_message"><?=$msg;?></td>
    </tr>
    <tr>
      <td width="140" align="right">&nbsp;</td>
      <td width="8" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Full name </td>
      <td align="center" class="red">*</td>
      <td><input name="full_name" type="text" size="35" value="<?=set_post_value("full_name");?>" maxlength="80" /><?=form_error('full_name');?></td>
    </tr>
    <tr>
      <td align="right">Contact no. </td>
      <td align="center" class="red">*</td>
      <td><input name="contact" type="text" value="<?=set_post_value("contact");?>" maxlength="20" /><?=form_error('contact');?></td>
    </tr>
    <tr>
      <td align="right">E-mail address  </td>
      <td align="center"></td>
      <td><input name="email" type="text" value="<?=set_post_value("email");?>" size="35" maxlength="80" /></td>
    </tr>
    <tr>
      <td align="right" valign="top">Message</td>
      <td align="center" valign="top" class="red">*</td>
      <td valign="top"><textarea name="message" type="text" value="<?=set_post_value("message");?>" cols="40" rows="5"></textarea><?=form_error('message');?></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="center"></td>
      <td align="left">NOTE: Red [<span class="red">*</span>] marked fields are required.</td>
    </tr>
    <tr>
      <td align="right" height="50">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>