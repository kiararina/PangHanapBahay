<div id="profile-page" class="content-wrapper">
  <div class="content">
	<div class="center-content">
	  <h3>User Profile</h3>
	  <div class="form-wrapper">
		<form type="post" name="update_profile" action="index.html">
		  
		   <div>
			<label for="f_username">Username </label>
			<input class="textfield" type="text" name="f_username" id="name" readonly value="John Lloyd Cruz"/>
		  </div>
		
		  <div>
			<label for="f_first_name">First name <span class="required">*</span> </label>
			<input class="textfield" type="text" name="f_first_name" id="name" required placeholder="Enter first name"/>
		  </div>
		  <div>
			<label for="f_middle_name">Middle name </label>
			<input class="textfield" type="text" name="f_middle_name" id="name" required placeholder="Enter middle name"/>
		  </div>
		  <div>
			<label for="f_last_name">Last name <span class="required">*</span> </label>
			<input class="textfield" type="text" name="f_last_name" id="name" required placeholder="Enter last name"/>
		  </div>		  
		  <div>
			<label for="f_email">Email <span class="required">*</span> </label>
			<input class="textfield" type="email" name="email" id="email" required placeholder="Enter registered e-mail" />
		  </div>
		  <div>
			<label for="f_affiliation">Affiliation </label>
			<input class="textfield" type="text" name="f_affiliation" id="name" required placeholder="Enter affiliation"/>
		  </div>
		  <div>
			<label>Persona <span class="required">*</span> </label><br />
			<p><input type="radio" name="credential" class="radio-btn" value="1" required/>Prospective Tenant or Lessee<br />
			  <span class="subinfo">Best for users looking for rental spaces.</span>
			</p>
			<p><input type="radio" name="credential" class="radio-btn" value="2" checked required/>Agent or Owner<br />
			  <span class="subinfo">Best for users who have properties they want the public to rent.</span>
			</p>
			<p><input type="radio" name="credential" class="radio-btn" value="3" required/>Both Tenant and Agent/Owner<br />
			  <span class="subinfo">Best for users who have properties to rent and are looking for other rental spaces.</span>
			</p>
		  </div>
		  
		  
		 
		  <div class="btn-area">
			<input id="cancel-btn" type="submit" value="" />
			<input id="submit-btn" type="submit" value="" />
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>
