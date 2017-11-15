<?php
	require_once(BASEPATH.'core/Model'.EXT);
	require_once(APPPATH . "/models/pb_mod_property.php");
	$id = $this->uri->segment(3);
	$properties_model = new Pb_mod_property();
	$amenities = $properties_model->get_amenities($id);
	$attributes = array(
	  //'name' => 'frmArticle',
	  //'accept-charset' => 'UTF-8'
	  'name' => 'frmEditProperty'
	);
echo form_open('pb_ctr_agent/edit/'.$property->prop_id, $attributes); ?>
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
  <input type="hidden" name="prop_id" id="prop_id" value="<?php echo $property->prop_id; ?>" />
  <div class="content">
	<div class="center-content">
	  <h3>Edit Property</h3>
	  <div class="form-wrapper">
		  <table id="property">
			<tr>
			  <td class="label">Property Title</td>
			  <td><input class="textfield" type="text" name="title" id="title" value="<?php echo $property->prop_name; ?>" /></td>
			</tr>
			<tr>
			  <td class="label">Property Available by</td>
			  <td><input type="text" id="datepicker" value="<?php echo date("m/d/Y",strtotime($property->prop_availby)); ?>"><input type="hidden" id="date" name="date" value="<?php echo date("m-d-Y",strtotime($property->prop_availby)); ?>" /></td>
			</tr>
			<tr>
			  <td class="label">Address</td>
			  <td>
				<div>
				  <label>Barangay:</label>
				  <select name="barangay" id="barangay">
					<option value="">---</option>
					<option value="Barangay Mapayapa" <?php if ($property->prop_brgy == "Barangay Mapayapa") {echo "selected='selected'";} ?>>Barangay Mapayapa</option>
					<option value="Barangay Maligaya" <?php if ($property->prop_brgy == "Barangay Maligaya") {echo "selected='selected'";} ?>>Barangay Maligaya</option>
					<option value="Barangay Mapagmahal" <?php if ($property->prop_brgy == "Barangay Mapagmahal") {echo "selected='selected'";} ?>>Barangay Mapagmahal</option>
					<option value="Barangay Tahimik" <?php if ($property->prop_brgy == "Barangay Tahimik") {echo "selected='selected'";} ?>>Barangay Tahimik</option>
				  </select> <br />
				</div>
				<div>
				  <label>City:</label>
				  <select name="city" id="city">
					<option value="">---</option>
					<option value="Taguig City" <?php if ($property->prop_city_mun == "Taguig City") {echo "selected='selected'";} ?>>Taguig City</option>
					<option value="Makati City"  <?php if ($property->prop_city_mun == "Makati City") {echo "selected='selected'";} ?>>Makati City</option>
					<option value="Quezon City"  <?php if ($property->prop_city_mun == "Quezon City") {echo "selected='selected'";} ?>>Quezon City</option>
					<option value="Muntinlupa City"  <?php if ($property->prop_city_mun == "Muntinlupa City") {echo "selected='selected'";} ?>>Muntinlupa City</option>
				  </select> <br />
				</div>
				<div>
				  <label>Province:</label>
				  <select name="province" id="province">
					<option value="">---</option>
					<option value="NCR" <?php if ($property->prop_prov_reg == "NCR") {echo "selected='selected'";} ?>>NCR</option>
				  </select> <br />
				</div>
			  </td>
			</tr>
			<tr>
			  <td class="label">Property Type</td>
			  <td>
				<div class="form-group">
				  <ul id="propertylist-01">
					<li><input type="radio" name="propertytype" value="1" <?php if($property->prop_type == "Apartment"){echo "checked";}?>><p>Apartment</p></li>
					<li><input type="radio" name="propertytype" value="2" <?php if($property->prop_type == "House"){echo "checked";}?>><p>House</p></li>
					<li><input type="radio" name="propertytype" value="3" <?php if($property->prop_type == "Room Only"){echo "checked";}?>><p>Room Only</p></li>
					<li><input type="radio" name="propertytype" value="4" <?php if($property->prop_type == "Townhouse"){echo "checked";}?>><p>Townhouse</p></li>
					<li><input type="radio" name="propertytype" value="5" <?php if($property->prop_type == "Condominium"){echo "checked";}?>><p>Condominium</p></li>
					<li><input type="radio" name="propertytype" value="6" <?php if($property->prop_type == "Mansion"){echo "checked";}?>><p>Mansion</p></li>
					<li><input type="radio" name="propertytype" value="7" <?php if($property->prop_type == "Dormitory"){echo "checked";}?>><p>Dormitory</p></li>
					<li><input type="radio" name="propertytype" value="8" <?php if($property->prop_type == "Boarding House"){echo "checked";}?>><p>Boarding House</p></li>
				  </ul>
				</div>
			  </td>
			</tr>
			<tr>
			  <td class="label">Monthly Rent</td>
			  <td><input class="textfield" type="text" name="rent" id="rent" value="<?php echo $property->prop_monthly_rent; ?>" /></td>
			</tr>
			<tr>
			  <td class="label">Unit Floor Size<br />(in square meters)</td>
			  <td><input class="textfield" type="text" name="floorarea" id="floorarea" value="<?php echo $property->prop_floor_area; ?>" /></td>
			</tr>
			<tr>
			  <td class="label">Unit Lot Size<br />(in square meters)</td>
			  <td><input class="textfield" type="text" name="lotarea" id="lotarea" value="<?php echo $property->prop_lot_area; ?>" /></td>
			</tr>
			<tr>
			  <td class="label">Amenities</td>
			  <td>
				<ul id="propertylist-01">
				  <li><input type="checkbox" name="amenities1" value="1" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 1){ echo "checked";} endforeach; ?>><p>Furnished</p></li>
				  <li><input type="checkbox" name="amenities2" value="2" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 2){ echo "checked";} endforeach; ?>><p>Pool</p></li>
				  <li><input type="checkbox" name="amenities3" value="3" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 3){ echo "checked";} endforeach; ?>><p>Guards</p></li>
				  <li><input type="checkbox" name="amenities4" value="4" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 4){ echo "checked";} endforeach; ?>><p>Wifi</p></li>
				  <li><input type="checkbox" name="amenities5" value="5" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 5){ echo "checked";} endforeach; ?>><p>Gym</p></li>
				  <li><input type="checkbox" name="amenities6" value="6" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 6){ echo "checked";} endforeach; ?>><p>Clubhouse</p></li>
				  <li><input type="checkbox" name="amenities7" value="7" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 7){ echo "checked";} endforeach; ?>><p>Gated</p></li>
				  <li><input type="checkbox" name="amenities8" value="8" <?php foreach ($amenities as $a_row): if($a_row['amenity_id'] == 8){ echo "checked";} endforeach; ?>><p>Female Only</p></li>
				  
				</ul>
			  </td>
			</tr>
			<tr>
			  <td class="label">Public Property View</td>
			  <td>
				<div class="form-group">
				  <ul id="propertylist-01">
					<li><input type="radio" name="publicview" value="1" <?php if($property->prop_publish == "1"){echo "checked";}?>><p>Enabled (Property can be seen by everybody.)</p></li><br />
					<li><input type="radio" name="publicview" value="0" <?php if($property->prop_publish == "0"){echo "checked";}?>><p>Disabled (Only registered users can view the property.)</p></li>
				  </ul>
				</div>
			  </td>
			</tr>
		  </table>
		  <div class="btn-area">
			<input type="hidden" name="button2" value="submit" />
			<input id="editproperty-btn" type="submit" value="" />
			<a href="<?php echo base_url(); ?>pb_ctr_agent/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
		  </div>
	  </div>
	</div>
  </div>
</div>
<?php echo form_close(); ?>