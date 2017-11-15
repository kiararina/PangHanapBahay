
<div id="contact-page" class="content-wrapper">
  <div class="content">
	<div class="left-content">
	  <h3>Contact Us</h3>
	  <div class="form-wrapper">
	    <p class="main-text">Experiencing some problems with our site? Or just wanna buzz us about how awesome it is?<br />
		Your opinion matters! Let us know what you think about PangHanapBahay.</p>
		<?php $user_type_page = null;?>
	   <form type="post" method="post" id="form" action="<?php echo base_url(); ?>contact">
		 <?php echo validation_errors(); ?>
		 <div>
			<label>Email:</label>
			<input class="textfield" type="email" name="email" id="email" />
		  </div>
		  <div>
			<label>Message:</label>
			<input class="textarea" type="textarea" name="message" id="message" />
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