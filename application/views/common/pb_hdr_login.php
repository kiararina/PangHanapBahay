<div id="login">
  <form>
	<div class="login-div"><label>Username:</label> 
	<input type="text" name="username" />
	</div>
	<div class="login-div"><label>Password:</label> 
	<input type="password" name="password" />
	</div>
	<div class="login-div">
	<label>Log-in As:</label>
	<select>
	  <option value="---"></option>
	  <option value="Tenant">Tenant</option>
	  <option value="Agent/Owner">Agent/Owner</option>
	</select> 
	</div>
	<input id="login-btn" type="submit" value="" />
  </form>
  <div class="login-links">
	<a href="<?php echo base_url(); ?>register.html">Register!</a>
	<a href="<?php echo base_url(); ?>forgot.html">Forgot username or password?</a>
  </div>
</div>