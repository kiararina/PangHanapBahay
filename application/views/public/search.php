<?php

$attributes = array(
  //'name' => 'frmArticle',
  //'accept-charset' => 'UTF-8'
  'name' => 'frmSearch'
);
echo form_open('home/', $attributes); ?>
<h3>Search</h3>
<div class="side-navi">
  <div class="side-top"></div>
  <div id="search-area" class="side-form">
	  <h4 id="side-location">Location</h4>
	  <label>Region/Province :</label>
	  <select name="province">
		<option value="">---</option>
		<option value="NCR">NCR</option>
	  </select><br />
	  <label>City/Municipality :</label>
	  <select name="city">
		<option value="">---</option>
		<option value="Taguig City">Taguig City</option>
		<option value="Makati City">Makati City</option>
		<option value="Quezon City">Quezon City</option>
	  </select> <br />		      
	  <label>Barangay :</label>
	  <select name="barangay">
		<option value="">---</option>
		<option value="Barangay Mapayapa">Brgy. Mapayapa</option>
		<option value="Barangay Maligaya">Brgy. Maligaya</option>
		<option value="Barangay Mapagmahal">Brgy. Mapagmahal</option>
		<option value="Barangay Tahimik">Brgy. Tahimik</option>
	  </select><br />
	  <h4 class="with-cap">Monthly Rent Range</h4>
	  <span class="unit-cap">in (Philippine Peso)</span><br />
	  <label>Minimum :</label>
	  <input class="textfield" type="text" name="rent_min" />
	  <label>Maximum :</label>
	  <input class="textfield" type="text" name="rent_max" /><br />
	  <h4>Property Type</h4>
	  <label>Type :</label>
	  <select name="propertytype">
		<option value="">---</option>
		<option value="1">Apartment</option>
		<option value="2">House</option>
		<option value="3">Room Only</option>
		<option value="4">Townhouse</option>
		<option value="5">Condominium</option>
		<option value="6">Mansion</option>
		<option value="7">Dormitory</option>
		<option value="8">Boarding House</option>
	  </select><br />
	  <h4 class="with-cap">Unit Floor Size</h4>
	  <span class="unit-cap">in (sq. meters)</span><br />
	  <label>Minimum :</label>
	  <input class="textfield" type="text" name="flrarea_min" /><br />
	  <label>Maximum :</label>
	  <input class="textfield" type="text" name="flrarea_max" /><br />
	  <h4 class="with-cap">Unit Lot Size</h4>
	  <span class="unit-cap">in (sq. meters)</span><br />
	  <label>Minimum :</label>
	  <input class="textfield" type="text" name="lotarea_min" /><br />
	  <label>Maximum :</label>
	  <input class="textfield" type="text" name="lotarea_max" /><br />
	  <!--<h4>Amenities</h4><form>
	  <ul id="amenitylist-01">
		<li><input type="checkbox" name="amenities1" value="1"><p>Furnished</p></li>
		<li><input type="checkbox" name="amenities2" value="2"><p>Pool</p></li>
		<li><input type="checkbox" name="amenities3" value="3"><p>Guards</p></li>
		<li><input type="checkbox" name="amenities4" value="4"><p>Wifi</p></li>
		<li><input type="checkbox" name="amenities5" value="5"><p>Gym</p></li>
		<li><input type="checkbox" name="amenities6" value="6"><p>Clubhouse</p></li>
		<li><input type="checkbox" name="amenities7" value="7"><p>Gated</p></li>
		<li><input type="checkbox" name="amenities8" value="8"><p>Female Only</p></li>
	  </ul> -->
	  <input id="search-btn" type="submit" value="" />
	  <input type="hidden" name="button2" value="search" />
  </div>
  <div class="side-bottom"></div>
</div>
<?php echo form_close(); ?>