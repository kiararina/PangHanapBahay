<script type="text/javascript">
	function codeAddress() {
		geocoder = new google.maps.Geocoder();
		var address = document.getElementById("barangay").value +' ' + document.getElementById("city").value + ' ' + document.getElementById("province").value + ' Philippines';
		//alert (address);
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {

		  //alert("Latitude: "+results[0].geometry.location.lat());
		  //alert("Longitude: "+results[0].geometry.location.lng());
		  document.getElementById("location").value = results[0].geometry.location.lat() + ', ' + results[0].geometry.location.lng();
		  //document.frmAddProperty.location.value = results[0].geometry.location.lat() + ', ' + results[0].geometry.location.lng();
		  } 

		  else {
			//alert("Geocode was not successful for the following reason: " + status);
		  }
		});
		
		//alert(document.getElementById("location").value);
		document.frmEditProperty.submit() ;
	}
	//google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php
$attributes = array(
  //'name' => 'frmArticle',
  //'accept-charset' => 'UTF-8'
  'name' => 'frmEditProperty'
);
echo form_open('pb_ctr_agent/edit/'.$_POST['prop_id'], $attributes); ?>
<div id="add-property-page" class="agent-page content-wrapper">
  <input type="hidden" name="prop_id" id="prop_id" value="<?php echo $_POST['prop_id']; ?>" />
  <input type="hidden" id="location" name="location" value="" />
  <div class="content">
	<div class="center-content">
	  <h3>Edit Property</h3>
	  <div class="form-wrapper">
		  <table id="property">
			<tr>
			  <td class="label">Property Title</td>
			  <td><input class="textfield" type="text" name="title" id="title" value="<?php echo $_POST['title']; ?>" readonly /></td>
			</tr>
			<tr>
			  <td class="label">Property Available by</td>
			  <td><input type="text" id="dateSlash" name="dateSlash" value="<?php echo strtr($_POST['date'], array ('-' => '/'));?>" readonly /><input type="hidden" id="date" name="date" value="<?php echo $_POST['date']; ?>" readonly /></td>
			</tr>
			<tr>
			  <td class="label">Address</td>
			  <td>
				<div>
				  <label>Barangay:</label>
				  <?php echo $_POST['barangay']; ?>
				  <input type="hidden" id="barangay" name="barangay" value="<?php echo $_POST['barangay']; ?>" />
				</div>
				<div>
				  <label>City:</label>
				  <?php echo $_POST['city']; ?>
				  <input type="hidden" id="city" name="city" value="<?php echo $_POST['city']; ?>" />
				</div>
				<div>
				  <label>Province:</label>
				  <?php echo $_POST['province']; ?>
				  <input type="hidden" id="province" name="province" value="<?php echo $_POST['province']; ?>" />
				</div>
			  </td>
			</tr>
			<tr>
			  <td class="label">Property Type</td>
			  <td>
				<div class="form-group">
				  <ul id="propertylist-01">
					<?php if ($_POST['propertytype'] == "1"){ echo "<li><p>Apartment</p></li>";}?>
					<?php if ($_POST['propertytype'] == "2"){ echo "<li><p>House</p></li>";}?>
					<?php if ($_POST['propertytype'] == "3"){ echo "<li><p>Room Only</p></li>";}?>
					<?php if ($_POST['propertytype'] == "4"){ echo "<li><p>Townhouse</p></li>";}?>
					<?php if ($_POST['propertytype'] == "5"){ echo "<li><p>Condominium</p></li>";}?>
					<?php if ($_POST['propertytype'] == "6"){ echo "<li><p>Mansion</p></li>";}?>
					<?php if ($_POST['propertytype'] == "7"){ echo "<li><p>Dormitory</p></li>";}?>
					<?php if ($_POST['propertytype'] == "8"){ echo "<li><p>Boarding House</p></li>";}?>
					<input type="hidden" name="propertytype" value="<?php echo $_POST['propertytype']; ?>" />
				  </ul>
				</div>
			  </td>
			</tr>
			<tr>
			  <td class="label">Monthly Rent</td>
			  <td><?php echo $_POST['rent']; ?></td>
			  <input type="hidden" name="rent" value="<?php echo $_POST['rent']; ?>" />
			</tr>
			<tr>
			  <td class="label">Unit Floor Size<br />(in square meters)</td>
			  <td><?php echo $_POST['floorarea']; ?></td>
			  <input type="hidden" name="floorarea" value="<?php echo $_POST['floorarea']; ?>" />
			</tr>
			<tr>
			  <td class="label">Unit Lot Size<br />(in square meters)</td>
			  <td><?php echo $_POST['lotarea']; ?></td>
			  <input type="hidden" name="lotarea" value="<?php echo $_POST['lotarea']; ?>" />
			</tr>
			<tr>
			  <td class="label">Amenities</td>
			  <td>
				<ul id="propertylist-01">
					<?php if (isset($_POST['amenities1']))
							{ echo "<li><p>Furnished</p></li>"; ?>
								<input type="hidden" name="amenities1" value="<?php echo $_POST['amenities1']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities2']))
							{ echo "<li><p>Pool</p></li>"; ?>
								<input type="hidden" name="amenities2" value="<?php echo $_POST['amenities2']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities3']))
							{ echo "<li><p>Guards</p></li>"; ?>
								<input type="hidden" name="amenities3" value="<?php echo $_POST['amenities3']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities4']))
							{ echo "<li><p>Wifi</p></li>"; ?>
								<input type="hidden" name="amenities4" value="<?php echo $_POST['amenities4']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities5']))
							{ echo "<li><p>Gym</p></li>"; ?>
								<input type="hidden" name="amenities5" value="<?php echo $_POST['amenities5']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities6']))
							{ echo "<li><p>Clubhouse</p></li>"; ?>
								<input type="hidden" name="amenities6" value="<?php echo $_POST['amenities6']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities7']))
							{ echo "<li><p>Gated</p></li>"; ?>
								<input type="hidden" name="amenities7" value="<?php echo $_POST['amenities7']; ?>" />
							
							<?php }else{}?>
					<?php if (isset($_POST['amenities8']))
							{ echo "<li><p>Female Only</p></li>"; ?>
								<input type="hidden" name="amenities8" value="<?php echo $_POST['amenities8']; ?>" />
							
							<?php }else{}?>
				</ul>
			  </td>
			</tr>
			<tr>
			  <td class="label">Public Property View</td>
			  <td>
				<div class="form-group">
				  <ul id="propertylist-01">
					<?php if ($_POST['publicview'] == "1"){ echo "<li><p>Enabled (Property can be seen by everybody.)</p></li>";}?>
					<?php if ($_POST['publicview'] == "0"){ echo "<li><p>Disabled (Only registered users can view the property.)</p></li>";}?>
					<input type="hidden" name="publicview" value="<?php echo $_POST['publicview']; ?>" />
				  </ul>
				</div>
			  </td>
			</tr>
		  </table>
		  <div class="btn-area">
			<input type="hidden" name="button2" value="confirm" />
			<!--<input id="editproperty-btn" type="submit" value="" />-->
			<a href="javascript:void(0)" onclick="codeAddress();"><img src="<?php echo base_url(); ?>common/image/btn_editproperty.png" width="140" height="26" title="Edit" alt="Edit" /></a>
			<a href="<?php echo base_url(); ?>pb_ctr_agent/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
		  </div>
	  </div>
	</div>
  </div>
</div>
<?php echo form_close(); ?>