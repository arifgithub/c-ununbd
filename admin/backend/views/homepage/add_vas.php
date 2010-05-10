<div id="box">
                	<h3 id="adduser">Create Frontend VAS list</h3>
                    <form id="form" action="<?=$site_url.$active_controller?>/addvas" method="post">
                      <fieldset id="personal">
                        <legend>VAS list information</legend>
                        <label for="title">Title: </label> 
                        <input name="title" id="title" type="text" class="text" tabindex="1"  value="<?=set_value('title') ?>" /><span class='req'>*</span> <?php echo form_error('title'); ?>
                        <br />
                        <label for="order">Order : </label>
                        <input name="order" id="order"  class ='text' type="text" tabindex="3" value="<?=set_value('order') ?>" style='width:50px;' />
                        <br />
                        <label for="id_content">Content : </label>
                        <select name='id_content' id='id_content' tabindex='4'>
                        <option value=''>-----No content----</potion>
                       	 <?php echo html_options($content_option,set_value('id_content')) ?></select><span class='req'>*</span> <?php echo form_error('id_content'); ?>
                        <br />
                        <label for="tips">Tips: </label> 
                        <input name="tips" id="tips" type="text"  class="text" tabindex="5"    value="<?=set_value('tips') ?>"/>
                        <br />
                        <label for="status">Status : </label>
                        <select name='status' id='status' tabindex='6'>
                       	 <?php echo html_options($status_option,set_value('status',$status)) ?></select><span class='req'>*</span> <?php echo form_error('status'); ?>
                        <br />
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Save" abindex="9" /> 
                      <input id="button2" type="reset" value='Reset'  abindex="10"/>
                      </div>
                    </form>

  </div>
