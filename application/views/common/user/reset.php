<div id="reset-page" class="content-wrapper">
  <div class="content">
	<div class="left-content">
	  <h3>Reset Password</h3>
	  <div class="form-wrapper">
		
		
		
			<?php echo form_open('pb_ctr_reset/change_pass'); ?> 
		  	 <?php echo validation_errors(); ?>
			    <div>
		        <label for="f_username">Username: </label>
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong><?php echo $this->session->userdata('user_username'); ?> </strong>
		      </div>
		      <div>
		        <label for="opassword">Old password <span class="required">*</span> </label>
			    <input  class="password" type="password" name="opassword"  id="password1" required placeholder="Enter old password"/>
		      </div>
			  <div>
		        <label for="npassword">New password<span class="required">*</span> </label>
			    <input class="password" type="password" name="npassword" id="password1" required placeholder="Enter new password"/>
		      </div>			  
		      <div>
		        <label for="cpassword">Confirm new password<span class="required">*</span> </label>
			    <input  class="password" type="password" name="cpassword" id="password2" required placeholder="Re-enter new password"/>
		      </div>
		      <div class="btn-area">
				<script>
					function goBack()
					{
					window.history.go(0)
					}
				</script>
		        <input id="submit-btn" type="submit" value="" />
				<input id="cancel-btn" type="button" value="" onclick="goBack()"/>
			
			    
		      </div>
		    </form>
			</div>
	    </div>
	  </div>
	</div>
	