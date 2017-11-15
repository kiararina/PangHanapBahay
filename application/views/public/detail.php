<div id="detail-page" class="agent-page content-wrapper">
  <div class="content">
  <div class="left-content">
	<h3>Unit Information</h3>
	<div class="photos-gallery">
	  <div class="main-image">				
		<img src="<?php echo base_url(); ?><?php echo $property->prop_pic_filepath; ?>" width="361" height="auto" title="<?php echo $property->prop_name; ?>" alt="<?php echo $property->prop_name; ?>" />
	  </div>
	</div>
	<section class="details-wrapper">
	  <div class="main-info">
		<h4><?php echo $property->prop_name; ?></h4>
		<p><?php echo ($property->user_affiliation ? $property->user_affiliation: $property->user_first_name." ".$property->user_middle_name." ".$property->user_last_name); ?></p>
		<p><?php echo ($property->prop_monthly_rent == 0.00 ? "" : "Rent: P".$property->prop_monthly_rent); ?></p>
	  </div>
	  <div class="btn-wrapper">
		<div class="options">
		  <ul>
			<li><a href="#picturesModal">Pictures</a></li>
			<li><a href="#inquiryModal">Inquire</a></li>
			<li><a href="#locationModal">Location</a></li>
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
			  <iframe width="95%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Taguig+City,+Metro+Manila,+Philippines&amp;aq=0&amp;oq=taguig&amp;ie=UTF8&amp;hq=&amp;hnear=Taguig,+Metro+Manila,+Philippines&amp;ll=14.517618,121.050864&amp;spn=1.576947,2.705383&amp;t=m&amp;z=9&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Taguig+City,+Metro+Manila,+Philippines&amp;aq=0&amp;oq=taguig&amp;ie=UTF8&amp;hq=&amp;hnear=Taguig,+Metro+Manila,+Philippines&amp;ll=14.517618,121.050864&amp;spn=1.576947,2.705383&amp;t=m&amp;z=9" style="color:#0000FF;text-align:left">View Larger Map</a></small>
			</td>
		  </tr>
		</table>
	  </div>
	  <div class="btn-wrapper2">
		<div class="options">
		  <ul>
			<li><a href="#picturesModal">Pictures</a></li>
			<li><a href="#inquiryModal">Inquire</a></li>
			<li><a href="#locationModal">Location</a></li>
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
				  <li><?php echo $property->prop_brgy; ?> <?php echo $property->prop_city_mun;?> </li>
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
  <div id="locationModal" class="modalDialog">
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
	</section>
	<div class="back-wrapper">
	  <p>Back to <a href="">Properties</a></p>
	</div>
  </div>
  <!--<div class="right-content">
	<!?php include 'search.php'; ?>
  </div> -->
  </div>
</div>