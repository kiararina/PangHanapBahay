<div id="forgot-page" class="public-page">
<div class="content-wrapper">
	  <div class="content">
	    <div class="left-content">
	      <h3>Forgot Username/Password</h3>
		  <div class="form-wrapper">
		    <p class="main-text">We will be sending a reset link through your registered email. Kindly supply the required information below.</p>
			<script>
			function check() {
				if(document.forms["form"]["f_username"].value == "")
				alert('I guess you do exist');
				
			}
			
			
			</script>
			<?php echo validation_errors(); ?>
			<form type="post" method="post" id="form" action="<?php echo base_url(); ?>forgot/index" >
			  <div>
				<div>
				<table>
				<br>
				<tr>
					<td><label for="f_username">Username </label></td>
					<td><input class="textfield" type="text" name="f_username" id="username1" placeholder="Enter username"/><td>
				</tr>
				
				<br>
				<tr>
					<td>&nbsp;&nbsp;-&nbsp;or&nbsp;-&nbsp;</td>
					<td></td>
				</tr>
				
				<br>
				<tr>
					<td><label for="f_email">Email </label></td>
					<td><input class="textfield" type="email" name="email" id="email"  placeholder="Enter registered e-mail" /></td>
				</tr>
				</table>
			  </div>			  
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
	</div>