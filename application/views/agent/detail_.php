<script language="JavaScript" type="text/javascript">
<!--
function hideUnit( unit_id )
{
  document.frmHideProperty.hideUnit.value = unit_id;
  document.frmHideProperty.submit() ;
}

function showUnit( unit_id )
{
  document.frmHideProperty.showUnit.value = unit_id;
  document.frmHideProperty.submit() ;
}
-->
</script> 
<?php 
	
	$attributes = array(
	  //'name' => 'frmArticle',
	  //'accept-charset' => 'UTF-8'
	  'name' => 'frmHideProperty'
	);	
	
	echo form_open('pb_ctr_agent/detail/'.$property->prop_id, $attributes);
?>
<div id="detail-page" class="agent-page content-wrapper">
  <input type="hidden" name="hideUnit" value="" />
  <input type="hidden" name="showUnit" value="" />
  <div class="content">
  <div class="center-content">
	<h3>Unit Information</h3>
	<div class="photos-gallery">
	  <div class="main-image">
		<img src="<?php echo base_url(); ?><?php echo $property->prop_pic_filepath; ?>" width="361" height="auto" title="" alt="" />
	  </div>
	</div>
	<section class="details-wrapper">
	  <div class="main-info">
		<h4><?php echo $property->prop_name; ?></h4>
		<p>SMDC Homes</p>
		<p>Rent: P<?php echo $property->prop_monthly_rent; ?></p>
	  </div>
	  <div class="btn-wrapper">
		<div class="options">
		  <ul>
			<?php if($property->prop_publish == 1){  echo '<li><a href="javascript:void(0)" onclick="hideUnit('.$property->prop_id.')">Hide in Search</a></li>';}?>
			<?php if($property->prop_publish  == 0){  echo '<li><a href="javascript:void(0)" onclick="showUnit('.$property->prop_id.')">Show in Search</a></li>';}?>
			<li><a href="<?php echo base_url(); ?>pb_ctr_agent/edit/<?php echo $property->prop_id; ?>">Edit</a></li>
			<li><a href="<?php echo base_url(); ?>pb_ctr_agent/delete/<?php echo $property->prop_id; ?>">Delete</a></li>
			<li><a href="#picturesModal">Pictures</a></li>
			<li><a href=""><?php echo($likes ==  0 ? 0: $likes); ?> Like(s)</a></li>
		  </ul>
		</div>
	  </div>
	  <div class="additional-info">
		<table class="left">
		  <tr>
			<td class="title">Location:</td>
			<td class="info"><?php echo $property->prop_city_mun; ?></td>
		  </tr>
		  <tr>
			<td class="title">Property Type:</td>
			<td class="info"><?php echo $property->prop_type ?></td>
		  </tr>
		  <tr>
			<td class="title">Size:</td>
			<td class="info"><?php echo $property->prop_lot_area; ?> m</td>
		  </tr>
		  <tr>
			<td class="title">Amenities:</td>
			<td class="info">
				<?php
					foreach ($amenities as $a_row):  
					echo $a_row['description']; ?><br />		
				<?php endforeach; ?>
			</td>
		  </tr>
		</table>
		<table class="right">
		  <tr>
			<td class="title">Availability:</td>
			<td class="info"><?php echo date("F j, Y", strtotime($property->prop_availby)); ?></td>
		  </tr>
		  <tr>
			<td class="title">Agent/Owner:</td>
			<td class="info"><?php echo ($property->user_affiliation ? $property->user_affiliation."<br />" : ''); ?>
			  <?php echo $property->user_first_name; ?> <?php echo $property->user_middle_name; ?> <?php echo $property->user_last_name; ?><br />
			  <?php echo $property->user_email_addr; ?>
			</td>
		  </tr>
		  <tr>
			<td class="title">Map:</td>
			<td class="info">
			  <?php 
				$latitude = trim(substr($property->prop_loc_map, 0, strrpos($property->prop_loc_map, ',')));
				$longitude = trim(substr($property->prop_loc_map, strpos($property->prop_loc_map, ",") + 1));
				$latitude = (float) $latitude;
				$longitude = (float) $longitude;
				if(($latitude != "" || $latitude != 0) && ($longitude != "" || $longitude != 0)){
			  ?>
			  <script>

				function CoordMapType(tileSize) {
					  this.tileSize = tileSize;
					}

					CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
					  var div = ownerDocument.createElement('div');
					  div.innerHTML = coord;
					  div.style.width = this.tileSize.width + 'px';
					  div.style.height = this.tileSize.height + 'px';
					  div.style.fontSize = '10';
					  div.style.borderStyle = 'solid';
					  div.style.borderWidth = '1px';
					  div.style.borderColor = '#AAAAAA';
					  return div;
					};

					var map;
					var chicago = new google.maps.LatLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>);

					function initialize() {
					  var mapOptions = {
						zoom: 10,
						center: chicago
					  };
					  map = new google.maps.Map(document.getElementById('map_canvass'),
														mapOptions);

					  // Insert this overlay map type as the first overlay map type at
					  // position 0. Note that all overlay map types appear on top of
					  // their parent base map.
					  map.overlayMapTypes.insertAt(
						  0, new CoordMapType(new google.maps.Size(256, 256)));
					}

					google.maps.event.addDomListener(window, 'load', initialize);

			  </script>

			  <div id="map_canvass" width="95%" height="300">
			    
			  </div><?php }else{ echo "Not enough information to generate map.";} ?>
			</td>
		  </tr>
		</table>
	  </div>
	  <div class="btn-wrapper2">
		<div class="options">
		  <ul>
			<?php if($property->prop_publish == 1){  echo '<li><a href="javascript:void(0)" onclick="hideUnit('.$property->prop_id.')">Hide in Search</a></li>';}?>
			<?php if($property->prop_publish  == 0){  echo '<li><a href="javascript:void(0)" onclick="showUnit('.$property->prop_id.')">Show in Search</a></li>';}?>
			<li><a href="<?php echo base_url(); ?>pb_ctr_agent/edit/<?php echo $property->prop_id; ?>">Edit</a></li>
			<li><a href="<?php echo base_url(); ?>pb_ctr_agent/delete/<?php echo $property->prop_id; ?>">Delete</a></li>
			<li><a href="#picturesModal">Pictures</a></li>
			<li><a href=""><?php echo($likes ==  0 ? 0: $likes); ?> Like(s)</a></li>
		  </ul>
		</div>
	  </div>
	 <div id="picturesModal" class="pModal modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>Unit Photos</h2>
			<div class="modalphoto-wrapper">
				<?php
					$photo_count = 1;
					foreach ($filepath as $p_row):  
				?>
				<div id="photo-wrapper0<?php echo $photo_count; ?>" class="photo">
				  <img id="photo-item" class="opaque" itemprop="image" src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="auto" height="204" alt="Image <?php echo $photo_count; ?>" class="picture" />
				</div>
				
				<?php $photo_count++;  endforeach; ?>
				<div id="more-photos">
				  <ul id="photo-controls">
					<?php
						$photo_count = 1;
						foreach ($filepath as $p_row):  
					?>
					<li>
					  <a class="selected image0<?php echo $photo_count; ?>"><img itemprop="image"  src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="60" height="60" class="picture" /></a>	
					</li>	
					<?php $photo_count++; endforeach; ?>
				  </ul>
				</div>
			</div>
			<div class="modalbtn-area">
				<a href="#close" ><img class="btn-close" src="<?php echo base_url(); ?>common/image/btn_close.png" width="90" height="26"/></a>
			</div>
		</div>
	</div>
	<div id="inquiryModal" class="iModal modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>Inquiry</h2>
			<div class="modalunit-info">
				<div class="list-photo">
				  <img src="<?php echo base_url(); ?><?php echo $property->prop_pic_filepath; ?>" width="auto" height="169" title="<?php echo $property->prop_name; ?>" alt="<?php echo $property->prop_name; ?>" />
				</div>
				<ul class="modalunit-details">
				  <li><?php echo $property->prop_name; ?></li>
				  <li><?php echo $property->prop_type;?></li>
				  <li><?php echo $property->prop_brgy; ?>, <?phpecho $property->prop_city_mun;?></li>
				  <?php echo ($property->prop_monthly_rent == 0 ? "" : "<li>P".$property->prop_monthly_rent." Monthly Rent</li>" );?>
				  <li>Available by 
					<?php 
						if(strtotime(date("Y-m-d")) >= strtotime(date("Y-m-d", strtotime($property->prop_availby)))){
							echo "<strong>NOW</strong>";
						}
						else{
							echo date("F j, Y", strtotime($property->prop_availby));
						}
					?>
				  </li>
				</ul>
			</div>
			<div class="form-wrapper">
				<div>
					<label>Email:</label>
					<input class="textfield" type="email" name="email" id="email" value="" />
				</div>
				<div>
					<label>Message:</label>
					<input class="textarea" type="textarea" name="message" id="message" value="" />
				</div>
				<div class="modalbtn-area">
					<a href="javascript:void(0)" onclick="sendInquiry('<?php echo $property->prop_id; ?>')"><img src="<?php echo base_url(); ?>common/image/btn_submit.png" width="90" height="26" title="Submit" alt="Submit" /></a>
					<a href="<?php echo base_url(); ?>pb_ctr_home/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
				</div>
			</div>
		</div>
	</div>
  </section>
  <section id="inquiries" class="details-wrapper">
    <div><h2>Inquiries</h2>
	<?php if($inquiries != null){?>
        <table>
		  <?php foreach ($inquiries as $i_row): ?>	
		  <tr>
		    <td><?php echo  date("F j, Y", strtotime($i_row['response_dtime_add'])); ?></td>
		    <td><?php echo $i_row['response_text']; ?></td>
		    <td><?php echo $i_row['response_inq_username']; ?></td>
		  </tr>
		  <?php endforeach; ?>
		</table>
	<?php }else{ echo "No inquiries."; }?> 
	</div>
    <ul>
	</ul>
  </section>
  <section id="comments" class="details-wrapper">
    <div>
	  <h2>Comments</h2>
	</div>
    <ul>
	</ul>
  </section>
	<div class="back-wrapper">
	  <p>Back to <a href="">Properties</a></p>
	</div>
  </div>
  </div>
</div>
<?php echo form_close(); ?>