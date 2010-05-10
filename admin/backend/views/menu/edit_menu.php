<div id="box">
                	<h3 id="adduser">Edit menu item</h3>
                    <form id="form" action="<?=$site_url.$active_controller?>/edit" method="post">
                      <fieldset id="personal">
                        <legend>MENU ITEM INFORMATION</legend>
                        <label for="title">Title: </label> 
                        <input name="title" id="title" type="text" class="text" tabindex="1"  value="<?=set_value('title',$title) ?>" /><span class='req'>*</span> <?php echo form_error('title'); ?>
                        <br />
                        <label for="parent_id">Parent id : </label>
                         <select name='parent_id' id='parent_id' tabindex="2" class='menu-opt'>
                         <option value='0'>-----top level----</potion>
                    	<?php echo html_menu_options($menu_tree,set_value('parent_id',$parent_id)) ?>
                         </select>
                        <br />
                        <label for="order">Order : </label>
                        <input name="order" id="order"  class ='text' type="text" tabindex="3" value="<?=set_value('order',$order) ?>" style='width:50px;' /><span class='req'>*</span> <?php echo form_error('order'); ?>
                        <br />
                        <label for="id_content">Content : </label>
                        <select name='id_content' id='id_content' tabindex='4'>
                        <option value='0'>-----No content----</potion>
                       	 <?php echo html_options($content_option,set_value('id_content',$id_content)) ?></select>
                        <br />
                        <label for="status">Status : </label>
                        <select name='status' id='status' tabindex='4'>
                       	 <?php echo html_options($status_option,set_value('status',$status)) ?></select><span class='req'>*</span> <?php echo form_error('status'); ?>
                        <br />
                        <label for="tips">Tips: </label> 
                        <input name="tips" id="tips" type="text"  class="text" tabindex="5"    value="<?=set_value('tips',$tips) ?>"/>
                        <br />
                      </fieldset>
                      <fieldset id="controller-method">
                      <legend>MENU ACTION</legend>
                        <label for="module_link">Module link : </label>
                        <input name="module_link" id="module_link" type="text"  class="text" tabindex="8" value="<?=set_value('module_link',$module_link) ?>" />
                      </fieldset>
                      <div align="center">
                      <input type='hidden' name='id' value='<?=$id ?>' />
                      <input id="button1" type="submit" value="Save" abindex="9" /> 
                      <input id="button2" type="reset" value='Reset'  abindex="10"/>
                      </div>
                    </form>

  </div>
