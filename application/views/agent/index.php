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
	
	echo form_open('pb_ctr_agent/index', $attributes);
?>
    <div id="agent-content" class="agent-page content-wrapper">
	  <input type="hidden" name="hideUnit" value="" />
	  <input type="hidden" name="showUnit" value="" />
	  <div class="content">
	  <div class="center-content">
	    <h3>Properties for Rent</h3>
		<div class="searchview-options">
		  <div class="addunit-options">
		    <a href="<?php echo base_url(); ?>agent/add"><img src="<?php echo base_url(); ?>common/image/btn_addunit.png" width="99" height="26" alt="" title="" /></a>
		  </div>
		  <div class="view-options">
		    <label>Viewing Option :</label>
		    <input class="view-radio" type="radio" name="view" id="basic" value="Basic"> Basic</input>
		    <input class="view-radio" type="radio" name="view" id="detailed" value="Detailed" checked> Detailed</input>
		  </div>
		  <!--<div class="sort-options">
		    <label>Sort by :</label>
			<select>
		    <option value="Default">Default</option>
		    <option value="Availability">Availability</option>
			<option value="Province">Province</option>
			<option value="City">City</option>
			<option value="Barangay">Barangay</option>
		    <option value="RentLowest">Rent - Lowest to Highest</option>
			<option value="RentHighest">Rent - Highest to Lowest</option>
			<option value="Property">Property Type</option>
			<option value="AFSmallest">Floor Area - Smallest to Biggest</option>
			<option value="AFBiggest">Floor Area - Biggest to Smallest</option>
		  </select> 
		  </div>-->
		</div>
		<div id="basic-view" class="result-wrapper">
	
			<?php 
				$div_counter = 1;
				foreach ($events as $row):  
			?>
			<div class="unit-wrapper">
				<div class="list-photo">
				  <img src="<?php echo base_url(); ?><?php echo $row['prop_pic_filepath']; ?>" width="200" height="169" title="Unit 1" alt="Unit 1" />
				</div>
				<ul>
				  <li><?php echo $row['prop_name']; ?></li>
				  <li><?php echo $row['prop_type']; ?></li>
				  <li><?php echo $row['prop_brgy']; ?>, <?php echo $row['prop_city_mun']; ?></li>
				  <li>P<?php echo $row['prop_monthly_rent']; ?> Monthly Rent</li>
				  <li>Available by <?php echo date("F j, Y", strtotime($row['prop_availby'])); ?></li>
				</ul>
				<div class="options">
				  <ul>
					<?php if($row['prop_publish'] == 1){  echo '<li><a href="javascript:void(0)" onclick="hideUnit('.$row['prop_id'].')">Hide in Search</a></li>';}?>
					<?php if($row['prop_publish'] == 0){  echo '<li><a href="javascript:void(0)" onclick="showUnit('.$row['prop_id'].')">Show in Search</a></li>';}?>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/detail/<?php echo $row['prop_id']; ?>">View</a></li>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/edit/<?php echo $row['prop_id']; ?>">Edit</a></li>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/delete/<?php echo $row['prop_id']; ?>">Delete</a></li>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/upload/<?php echo $row['prop_id']; ?>">Add/Update Pictures</a></li>
					<li><a href="#picturesModal0<?php echo $div_counter; ?>">View Pictures</a></li>
					<!--<li><a href=""><!?php echo($row['likes'] ==  0 ? 0: $row['likes']); ?> Like(s)</a></li>-->
					<li><a href="<?php echo base_url(); ?>pb_ctr_comments/action/<?php echo $row['prop_id']; ?>#comments"><?php echo($row['comments'] ==  0 ? 0: $row['comments']); ?> Comment(s)</a></li>
					<!--<li><a href="<!?php echo base_url(); ?>pb_ctr_agent/detail/<!?php echo $row['prop_id']; ?>#inquiries"><!?php echo($row['inquiry'] ==  0 ? 0: $row['inquiry']); ?> Inquiries</a></li> -->
					<!--<li><a href="#locationModal_<!?php echo $div_counter; ?>">Location</a></li> -->
				  </ul>
				</div>
				<div id="picturesModal0<?php echo $div_counter; ?>" class="pModal modalDialog">
					<div>
					  <a href="#close" title="Close" class="close">X</a>
					  <h2>Unit Photos</h2>
					  <div class="modalphoto-wrapper">
						<?php
							$photo_count = 1;
							foreach ($filepath as $p_row):  
								if($p_row['prop_id'] == $row['prop_id']){
						?>
						<div id="photo-wrapper0<?php echo $photo_count; ?>" class="photo">
						  <img id="photo-item" class="opaque" itemprop="image" src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="auto" height="204" alt="Image <?php echo $photo_count; ?>" class="picture" />
						</div>
						
					    <?php $photo_count++; }  endforeach; ?>
						<div id="more-photos">
						  <ul id="photo-controls">
							<?php
								$photo_count = 1;
								foreach ($filepath as $p_row):  
									if($p_row['prop_id'] == $row['prop_id']){
							?>
							<li>
							  <a class="selected image0<?php echo $photo_count; ?>"><img itemprop="image"  src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="60" height="60" class="picture" /></a>	
							  <div id="photo<?php echo $photo_count; ?>" class="delete-photo">
								<a href="">Delete</a>
							  </div>
							</li>	
							<?php $photo_count++;}  endforeach; ?>
						  </ul>
						</div>
					  </div>
					  <div class="modalbtn-area">
						<a href="#close" ><img class="btn-close" src="<?php echo base_url(); ?>common/image/btn_close.png" width="90" height="26"/></a>
					  </div>
					</div>
				  </div>
				  <div id="locationModal_<?php echo $div_counter; ?>" class="modalDialog">
					<div>
					  <a href="#close" title="Close" class="close">X</a>
					  <h2>Location</h2>
					  <ul>
						<li>Apartment</li>
						<li>Brgy. Mapayapa, Taguig City</li>
					  </ul>
					  <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Taguig+City,+Metro+Manila,+Philippines&amp;aq=0&amp;oq=taguig&amp;ie=UTF8&amp;hq=&amp;hnear=Taguig,+Metro+Manila,+Philippines&amp;t=m&amp;ll=14.517618,121.050864&amp;spn=0.006149,0.010568&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Taguig+City,+Metro+Manila,+Philippines&amp;aq=0&amp;oq=taguig&amp;ie=UTF8&amp;hq=&amp;hnear=Taguig,+Metro+Manila,+Philippines&amp;t=m&amp;ll=14.517618,121.050864&amp;spn=0.006149,0.010568&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
					  <div class="modalbtn-area">
						<a href="#close" ><img class="btn-close" src="<?php echo base_url(); ?>common/image/btn_close.png" width="90" height="26"/></a>
					  </div>
					</div>
				  </div>
			</div>	
			<?php $div_counter++; endforeach; 
			?>

		 <!-- <div class="result-navlinks">
		  <ul>
		    <li>1</li>
		    <li>2</li>
		    <li>3</li>
		    <li>4</li>
		    <li>5</li>
		    <li class="dots">...</li>
		    <li>10</li>
		    <li class="text">Next</li>
		  </ul>
		</div>
		<div class="result_count">
		  <p>1 to 15 of 150 managed properties.</p>
		</div>-->
		</div>
		<div id="detail-view" class="result-wrapper" style="display: block;">
		<?php 
				$div_counter = 1;
				foreach ($events as $row):  
			?>
			<div class="unit-wrapper">
				<div class="unit-header">
				  <div class="unit-name">
					<h4><a href="<?php echo base_url(); ?>agent/detail/<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?> - <?php echo $row['prop_city_mun']; ?>, <?php echo $row['prop_prov_reg']; ?></a></h4>
				  </div>
				  <div class="unit-price"><p>Rent: P<?php echo $row['prop_monthly_rent']; ?></p></div>
				  <div class="unit-availability"><p>Available by: <?php echo date("F j, Y", strtotime($row['prop_availby'])); ?></p></div>
				</div>
				<div class="unit-details">
				  <div class="unit-photo">
					<img src="<?php echo base_url(); ?><?php echo $row['prop_pic_filepath']; ?>" width="100" height="84" title="Unit 1" alt="Unit 1" />
				  </div>
				  <div class="unit-info">
					<ul class="info-01">
					  <li><?php echo $row['prop_city_mun']; ?>, <?php echo $row['prop_prov_reg']; ?></li>
					  <li><?php echo $row['prop_brgy']; ?> </li>
					</ul><br />
					<ul class="info-02">
					  <li><?php echo $row['prop_type']; ?></li>
					  <li><?php echo $row['prop_floor_area']; ?>m²  floor area</li>
					  <li><?php echo $row['prop_lot_area']; ?>m² lot area </li>
					</ul>
					<ul class="info-03">
						<?php
							foreach ($amenities as $a_row):  
								if($a_row['prop_id'] == $row['prop_id']){
						?>
						<li><?php echo $a_row['description']; ?></li>		
					    <?php } endforeach; ?>
					</ul>
				  </div>    
				</div>
				<div class="options">
				  <ul>
					<?php if($row['prop_publish'] == 1){  echo '<li><a href="javascript:void(0)" onclick="hideUnit('.$row['prop_id'].')">Hide in Search</a></li>';}?>
					<?php if($row['prop_publish'] == 0){  echo '<li><a href="javascript:void(0)" onclick="showUnit('.$row['prop_id'].')">Show in Search</a></li>';}?>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/detail/<?php echo $row['prop_id']; ?>">View</a></li>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/edit/<?php echo $row['prop_id']; ?>">Edit</a></li>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/delete/<?php echo $row['prop_id']; ?>">Delete</a></li>
					<li><a href="<?php echo base_url(); ?>pb_ctr_agent/upload/<?php echo $row['prop_id']; ?>">Add/Update Pictures</a></li>
					<li><a href="#picturesModal<?php echo $div_counter; ?>">View Pictures</a></li>
					<!--<li><a href=""><!?php echo($row['likes'] ==  0 ? 0: $row['likes']); ?> Like(s)</a></li> -->
					<li><a href="<?php echo base_url(); ?>pb_ctr_comments/action/<?php echo $row['prop_id']; ?>#comments"><?php echo($row['comments'] ==  0 ? 0: $row['comments']); ?> Comment(s)</a></li>
					<!--<li><a href="<!?php echo base_url(); ?>pb_ctr_agent/detail/<!?php echo $row['prop_id']; ?>#inquiries"><!?php echo($row['inquiry'] ==  0 ? 0: $row['inquiry']); ?> Inquiries</a></li>
					<li><a href="#locationModal<!?php echo $div_counter; ?>">Location</a></li> -->
				  </ul>
				</div>
				  <div id="picturesModal<?php echo $div_counter; ?>" class="pModal modalDialog">
					<div>
					  <a href="#close" title="Close" class="close">X</a>
					  <h2>Unit Photos</h2>
					  <div class="modalphoto-wrapper">
						<?php
							$photo_count = 1;
							foreach ($filepath as $p_row):  
								if($p_row['prop_id'] == $row['prop_id']){
						?>
						<div id="photo-wrapper<?php echo $photo_count; ?>" class="photo">
						  <img id="photo-item" class="opaque" itemprop="image" src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="auto" height="204" alt="Image <?php echo $photo_count; ?>" class="picture" />
						</div>
						
					    <?php $photo_count++; }  endforeach; ?>
						<div id="more-photos">
						  <ul id="photo-controls">
							<?php
								$photo_count = 1;
								foreach ($filepath as $p_row):  
									if($p_row['prop_id'] == $row['prop_id']){
							?>
							<li>
							  <a class="selected image<?php echo $photo_count; ?>"><img itemprop="image"  src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="60" height="60" class="picture" /></a>	
							  <div id="photo<?php echo $photo_count; ?>" class="delete-photo">
								<a href="">Delete</a>
							  </div>
							</li>	
							<?php $photo_count++;}  endforeach; ?>
						  </ul>
						</div>
					  </div>
					  <div class="modalbtn-area">
						<a href="#close" ><img class="btn-close" src="<?php echo base_url(); ?>common/image/btn_close.png" width="90" height="26"/></a>
					  </div>
					</div>
				  </div>
				  <div id="locationModal<?php echo $div_counter; ?>" class="modalDialog">
					<div>
					  <a href="#close" title="Close" class="close">X</a>
					  <h2>Location</h2>
					  <ul>
						<li>Apartment</li>
						<li>Brgy. Mapayapa, Taguig City</li>
					  </ul>
					  <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Taguig+City,+Metro+Manila,+Philippines&amp;aq=0&amp;oq=taguig&amp;ie=UTF8&amp;hq=&amp;hnear=Taguig,+Metro+Manila,+Philippines&amp;t=m&amp;ll=14.517618,121.050864&amp;spn=0.006149,0.010568&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Taguig+City,+Metro+Manila,+Philippines&amp;aq=0&amp;oq=taguig&amp;ie=UTF8&amp;hq=&amp;hnear=Taguig,+Metro+Manila,+Philippines&amp;t=m&amp;ll=14.517618,121.050864&amp;spn=0.006149,0.010568&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
					  <div class="modalbtn-area">
						<a href="#close" ><img class="btn-close" src="<?php echo base_url(); ?>common/image/btn_close.png" width="90" height="26"/></a>
					  </div>
					</div>
				  </div>
			</div>
			<?php $div_counter++; endforeach; ?>
		
		  <!--<div class="result-navlinks">
		  <ul>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>5</li>
			<li class="dots">...</li>
			<li>15</li>
			<li class="text">Next</li>
		  </ul>
		</div>
		<div class="result_count">
		  <p>1 to 10 of 150 search results.</p>
		</div>-->
	  </div>
	  </div>
	  </div>
	</div>
<?php echo form_close(); ?>