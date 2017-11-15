  <div id="register-page" class="public-page">
	    <div class="content-wrapper">
	  <div class="content">
	    <div class="left-content">
	      <h3>Register</h3>
		  <div class="form-wrapper">
		    <p class="main-text">You will never regret signing up for membership! Complete the information below.</p>
			
			<?php 
			$attributes = array('class' => 'form-signin');   
			echo form_open('register/create_member', $attributes);
			?>
			  <div>
				<label for="user_first_name">First name <span class="required">*</span> </label>
				<input class="textfield" type="text" name="user_first_name" id="user_first_name" 
				value="<?php echo set_value('user_first_name'); ?>"
				required placeholder="Enter first name"/>
				<!--?php echo validation_errors();-->
				<span style="color:red"><b><?php echo form_error('user_first_name'); ?></b></span>

			  </div>
			  <div>
				<label for="user_middle_name">Middle name </label>
				<input class="textfield" type="text" name="user_middle_name" id="user_middle_name" 
				value="<?php echo set_value('user_middle_name'); ?>"
				placeholder="Enter middle name"/>
				
			  </div>
			  <div>
				<label for="user_last_name">Last name <span class="required">*</span> </label>
				<input class="textfield" type="text" name="user_last_name" id="user_last_name"
				value="<?php echo set_value('user_last_name'); ?>"
				required placeholder="Enter last name"/>
				<span style="color:red"><b><?php echo form_error('user_last_name'); ?></b></span>
			  </div>		  
			  <div>
				<label for="user_email_addr">Email <span class="required">*</span> </label>
				<input class="textfield" type="email" name="user_email_addr" id="user_email_addr" 
				value="<?php echo set_value('user_email_addr'); ?>"
				required placeholder="Enter registered e-mail" />
				<span style="color:red"><b><?php echo form_error('user_email_addr'); ?></b></span>
			  </div>
			    <div>
				<label for="user_affiliation">Affiliation </label>
				<input class="textfield" type="text" name="user_affiliation" id="user_affiliation" 
				value="<?php echo set_value('user_affiliation'); ?>"
				placeholder="Enter affiliation" />
			  </div>
			   <div>
				<label for="user_persona">Persona <span class="required">*</span> </label><br />
				<span style="color:red"><b><?php echo form_error('user_persona'); ?></b></span>
				<p><input type="radio" name="user_persona"  class="radio-btn" 
						value="1" 
						<?php echo set_radio('user_persona', '1', TRUE); ?>
						required/>Prospective Tenant or Lessee<br />
				  <span class="subinfo">Best for users looking for rental spaces.</span>
				</p>
				<p><input type="radio" name="user_persona" class="radio-btn" 
						value="2" 
						<?php echo set_radio('user_persona', '2'); ?>
						required/>Agent or Owner<br />
				  <span class="subinfo">Best for users who have properties they want the public to rent.</span>
				</p>
				<p><input type="radio" name="user_persona" class="radio-btn" 
						value="3" 
						<?php echo set_radio('user_persona', '5'); ?>
						required/>Both Tenant and Agent/Owner<br />
				  <span class="subinfo">Best for users who have properties to rent and are looking for other rental spaces.</span>
				</p>
			  </div>
			  
			  			  
			  <div>
				<label for="f_username">Username <span class="required">*</span> </label>
				<input class="textfield" type="text" name="user_username" id="user_username"
				value="<?php echo set_value('user_username'); ?>"
				required placeholder="Enter username"/>
				<span style="color:red"><b><?php echo form_error('user_username'); ?></b></span>
			  </div>
			  <div>
				<label for="user_password">Password <span class="required">*</span> </label>
				<input class="password" type="password" name="user_password" id="user_password" 
				required placeholder="Enter password"/>
				<span style="color:red"><b><?php echo form_error('user_password'); ?></b></span>
			  </div>
			  <div>
				<label for="password2">Confirm password <span class="required">*</span> </label>
				<input class="password" type="password" name="password2" id="password2" 
				required placeholder="Re-enter password"/>
				<span style="color:red"><b><?php echo form_error('password2'); ?></b></span>
			  </div>
			 
			
			<div>
				<?php echo form_label($captcha, 'captcha'); ?>
				<?php echo form_error('captcha'); ?>
				<input class="textfield" type="text" name="captcha" id="captcha"
				required placeholder="Enter Captcha Answer"/>
				<span style="color:red"><b><?php echo form_error('captcha'); ?></b></span>
			</div> 			

				
			  <div class="btn-area">
				<?php echo form_submit('submit', '', 'id="submit-btn" ');?>
				<input id="cancel-btn" type="submit" value="" />
			  </div>
			  <?php	echo form_close();?>
			
      </div>
	    </div>
	  
	  </div>
	</div>
	
  </div>
  
  
