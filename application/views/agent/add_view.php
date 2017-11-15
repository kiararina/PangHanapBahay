<?php
$attributes = array(
  //'name' => 'frmArticle',
  //'accept-charset' => 'UTF-8'
  'name' => 'frmAddProperty'
);
echo  form_open_multipart('pb_ctr_agent/add', $attributes); ?>
<script>
$(function() {
$("#datepicker").datepicker(
{
    altField: "#date",
	altFormat: 'dd-mm-yy'
});
});


</script>
<div id="add-property-page" class="agent-page content-wrapper">
  <input type="hidden" id="prop_owner_id" name="prop_owner_id" value="<?php echo $this->session->userdata('id'); ?>" />
  <div class="content">
	<div class="center-content">
	  <h3>Add Property</h3>
	  <div class="form-wrapper">
		  <table id="property">
			<tr>
			  <td class="label">Property Title</td>
			  <td><input class="textfield" type="text" name="title" id="title" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Property Available by</td>
			  <td><input type="text" id="datepicker"><input type="hidden" id="date" name="date" /></td>
			</tr>
			<tr>
			  <td class="label">Address</td>
			  <td>
				<div>
				  <label>Barangay:</label>
				  <select name="barangay" id="barangay">
					<option value="">---</option>
					<option value="Barangay Mapayapa">Barangay Mapayapa</option>
					<option value="Barangay Maligaya">Barangay Maligaya</option>
					<option value="Barangay Mapagmahal">Barangay Mapagmahal</option>
					<option value="Barangay Tahimik">Barangay Tahimik</option>
				  </select> <br />
				</div>
				<div>
				  <label>City:</label>
				  <select name="city" id="city">
					<option value="">---</option>
					<option value="Taguig City">Taguig City</option>
					<option value="Makati City">Makati City</option>
					<option value="Quezon City">Quezon City</option>
					<option value="Muntinlupa City">Muntinlupa City</option>
				  </select> <br />
				</div>
				<div>
				  <label>Province:</label>
				  <select name="province" id="province">
					<option value="">---</option>
					<option value="NCR">NCR</option>
				  </select> <br />
				</div>
			  </td>
			</tr>
			<tr>
			  <td class="label">Property Type</td>
			  <td>
				<div class="form-group">
				  <ul id="propertylist-01">
					<li><input type="radio" name="propertytype" value="1" checked><p>Apartment</p></li>
					<li><input type="radio" name="propertytype" value="2"><p>House</p></li>
					<li><input type="radio" name="propertytype" value="3"><p>Room Only</p></li>
					<li><input type="radio" name="propertytype" value="4"><p>Townhouse</p></li>
					<li><input type="radio" name="propertytype" value="5"><p>Condominium</p></li>
					<li><input type="radio" name="propertytype" value="6"><p>Mansion</p></li>
					<li><input type="radio" name="propertytype" value="7"><p>Dormitory</p></li>
					<li><input type="radio" name="propertytype" value="8"><p>Boarding House</p></li>
				  </ul>
				</div>
			  </td>
			</tr>
			<tr>
			  <td class="label">Monthly Rent</td>
			  <td><input class="textfield" type="text" name="rent" id="rent" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Unit Floor Size<br />(in square meters)</td>
			  <td><input class="textfield" type="text" name="floorarea" id="floorarea" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Unit Lot Size<br />(in square meters)</td>
			  <td><input class="textfield" type="text" name="lotarea" id="lotarea" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Amenities</td>
			  <td>
				<ul id="propertylist-01">
				  <li><input type="checkbox" name="amenities1" value="1"><p>Furnished</p></li>
				  <li><input type="checkbox" name="amenities2" value="2"><p>Pool</p></li>
				  <li><input type="checkbox" name="amenities3" value="3"><p>Guards</p></li>
				  <li><input type="checkbox" name="amenities4" value="4"><p>Wifi</p></li>
				  <li><input type="checkbox" name="amenities5" value="5"><p>Gym</p></li>
				  <li><input type="checkbox" name="amenities6" value="6"><p>Clubhouse</p></li>
				  <li><input type="checkbox" name="amenities7" value="7"><p>Gated</p></li>
				  <li><input type="checkbox" name="amenities8" value="8"><p>Female Only</p></li>
				</ul>
			  </td>
			</tr>
			<tr>
			  <td class="label">Public Property View</td>
			  <td>
				<div class="form-group">
				  <ul id="propertylist-01">
					<li><input type="radio" name="publicview" value="1" checked><p>Enabled (Property can be seen by everybody.)</p></li><br />
					<li><input type="radio" name="publicview" value="0"><p>Disabled (Only registered users can view the property.)</p></li>
				  </ul>
				</div>
			  </td>
			</tr>
		  </table>
		  <div class="btn-area">
			<input type="hidden" name="button2" value="submit" />
			<input id="addproperty-btn" type="submit" value="" />
			<a href="<?php echo base_url(); ?>pb_ctr_agent/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
		  </div>
	  </div>
	</div>
  </div>
</div>
<?php echo form_close(); ?>