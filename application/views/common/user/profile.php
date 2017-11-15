
<div id="profile-page" class="content-wrapper">
  <div class="content">
	<div class="left-content">
	  <h3>User Profile</h3>
	  <div class="form-wrapper">
	  
		
		<?php  echo form_open('pb_ctr_change_profile'); ?>
		  <div>
		  <?php
			//flash messages
			if($this->session->flashdata('flash_message')){
				if($this->session->flashdata('flash_message') == 'updated')
					{
						echo '<strong>Well done! your profile updated with success.</strong>';
					}else{
					echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
					}
			} ?>
		  </div>	
		
		  <?php echo validation_errors();?>
		   <div>
			<label for="f_username">Username	: </label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong><?php echo $this->session->userdata('user_username'); ?> </strong>
		  </div>
		
		  <div>
			<label for="f_first_name">First name <span class="required">*</span> </label>
			<input class="textfield" type="text" name="f_first_name" id="name" required value="<?php echo $user[0]['user_first_name']; ?>"/>
		  </div>
		  <div>
			<label for="f_middle_name">Middle name </label>
			<input class="textfield" type="text" name="f_middle_name" id="name"  value="<?php echo $user[0]['user_middle_name']; ?>"/>
		  </div>
		  <div>
			<label for="f_last_name">Last name <span class="required">*</span> </label>
			<input class="textfield" type="text" name="f_last_name" id="name" required value="<?php echo $user[0]['user_last_name']; ?>"/>
		  </div>		  
		  <div>
			<label for="f_email">Email <span class="required">*</span> </label>
			<input class="textfield" type="email" name="email" id="email" required value="<?php echo $user[0]['user_email_addr']; ?>"/>
		  </div>
		  <div>
			<label for="f_affiliation">Affiliation </label>
			<input class="textfield" type="text" name="f_affiliation" id="name"  value="<?php echo $user[0]['user_affiliation']; ?>"/>
		  </div>
		  <div>
			<label>Persona <span class="required">*</span> </label><br />
			
			<?php $persona = $user[0]['user_persona'];	?>
			
			<?php if($persona == 1){ ?>
			
			<p><input type="radio" name="credential" class="radio-btn" value="1" checked required/>Prospective Tenant or Lessee<br />
			  <span class="subinfo">Best for users looking for rental spaces.</span>
			</p>
			
					
			<?php }else{ ?>
			
			<p><input type="radio" name="credential" class="radio-btn" value="1"  required/>Prospective Tenant or Lessee<br />
			  <span class="subinfo">Best for users looking for rental spaces.</span>
			</p>
			
			<?php }?>
			
			
			<?php if($persona == 2){ ?>
			<p><input type="radio" name="credential" class="radio-btn" value="2"  checked required/>Agent or Owner<br />
			  <span class="subinfo">Best for users who have properties they want the public to rent.</span>
			</p>
			<?php }else{ ?>
			<p><input type="radio" name="credential" class="radio-btn" value="2"   required/>Agent or Owner<br />
			  <span class="subinfo">Best for users who have properties they want the public to rent.</span>
			</p>
			<?php }?>
			
			
			<?php if($persona == 3){ ?>
			<p><input type="radio" name="credential" class="radio-btn" value="3" checked required/>Both Tenant and Agent/Owner<br />
			  <span class="subinfo">Best for users who have properties to rent and are looking for other rental spaces.</span>
			</p>
			
			<?php }else{ ?>
			<p><input type="radio" name="credential" class="radio-btn" value="3"  required/>Both Tenant and Agent/Owner<br />
			  <span class="subinfo">Best for users who have properties to rent and are looking for other rental spaces.</span>
			</p>
			<?php }?>
			
		  </div>
			 
		  <div class="btn-area">
			<script>
					function goBack()
					{
					window.history.go(0)
					}
				</script>
		  
			<input id="cancel-btn" type="button" value="" onclick="goBack()"/>
			<input id="submit-btn" type="submit" value="" />
		  </div>
		    		  
		</form>
	  </div>
	</div>
  </div>
</div>
