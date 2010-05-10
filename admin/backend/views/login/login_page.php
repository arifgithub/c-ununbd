<div style="height:40%;" id="login-container"> 
	<div class="title">Site Admin Login</div>
				<div id="login-left"><span> Please insert valid username and password to login</span></div>
					<div id="login-right">
					<?php echo $this->session->flashdata('message') ?>
					<div class='frm'>
							<form action="<?php echo $site_url?>login/logged" method="post" id="loginForm" >
								<p>
									<label for="username">User Name:</label><input type="text" class="txt-box" name="username" id="username" />
								</p>
								<p>
									<label for="passwd">password:</label> <input type="password" class="txt-box" name="passwd" id="passwd" />
								</p>
	                    		<p><input type="submit" class="formbutton" value="Login" /></p>
							</form>
					</div>
	</div>
</div>