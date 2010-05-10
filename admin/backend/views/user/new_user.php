<div id="box">
                	<h3 id="adduser">Add user</h3>
                    <form id="form" action="<?=$site_url.$active_controller?>/add" method="post">
                      <fieldset id="personal">
                        <legend>PERSONAL INFORMATION</legend>
                        <label for="username">Admin User: </label> 
                        <input name="username" id="username" type="text" class="text" tabindex="1"  value="<?=set_value('username') ?>" /><span class='req'>*</span> <?php echo form_error('username'); ?>
                        <br />
                        <label for="passwd">Password : </label>
                        <input name="passwd" id="passwd"  class ='text' type="password" tabindex="2" value="<?=set_value('passwd') ?>" /><span class='req'>*</span> <?php echo form_error('passwd'); ?>
                        <br />
                        <label for="confirm_password">Retype Password : </label>
                        <input name="confirm_password" id="confirm_password"  class ='text' type="password" tabindex="3" value="<?=set_value('confirm_password') ?>" /><span class='req'>*</span> <?php echo form_error('confirm_password'); ?>
                        <br />
                        <label for="firstname">First name : </label>
                        <input name="firstname" id="firstname" type="text"  class="text" tabindex="4" value="<?=set_value('firstname') ?>" /><span class='req'>*</span> <?php echo form_error('firstname'); ?>
                        <br />
                        <label for="lastname">Last name : </label> 
                        <input name="lastname" id="lastname" type="text"  class="text" tabindex="5"    value="<?=set_value('lastname') ?>"/>
                        <br />
            
                        <label for="email">Email : </label>
                        <input name="email" id="email" type="text"  class="text" tabindex="6"  value="<?=set_value('email') ?>"/>     <span class='req'>*</span>    <?php echo form_error('email'); ?>   
                        <br />
                        <label for="mobile">Mobile Number : </label>
                        <input name="mobile" id="mobile" type="text"  class="text" tabindex="7"  value="<?=set_value('mobile') ?>"/>     <span class='req'>*</span>   <?php echo form_error('mobile'); ?>    
                        <br />
                      </fieldset>
                      <fieldset id="address-line">
                        <legend>ADDRESS</legend>
                        <label for="address">Address : </label>
                        <input name="address" id="address" type="text"  class="text" tabindex="8" value="<?=set_value('address') ?>" /><span class='req'>*</span>  <?php echo form_error('address'); ?>
                        <br />
                        <label for="city">City : </label> 
                        <input name="city" id="city" type="text"  class="text" tabindex="9"    value="<?=set_value('city') ?>"/><span class='req'>*</span> <?php echo form_error('city'); ?>
                        <br />
            
             
                      </fieldset>
                      <fieldset id="opt">
                        <legend>GROUP</legend>
                        	<label for="id_admin_group">Admin group : </label> 
                       		<select id="id_admin_group" name="id_admin_group" abindex="10">
								 <option value="" >---Select admin group--</option>
								<?php echo html_options($admin_group_options,set_value('id_admin_group')) ;?>
								</select><span class='req'>*</span>
								<?php echo form_error('id_admin_group'); ?>
                        <br />
                       	
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Save" abindex="11" /> 
                      <input id="button2" type="reset" value='Reset'  abindex="12"/>
                      </div>
                    </form>

  </div>
