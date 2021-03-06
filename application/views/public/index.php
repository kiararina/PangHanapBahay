<script language="JavaScript" type="text/javascript">

function sendInquiry( unit_id )
{
  document.frmPublicIndex.sendinquiryid.value = unit_id;
  document.frmPublicIndex.sendinquiry.value = true;
  document.frmPublicIndex.submit() ;
}


</script> 
<?php 
$attributes = array(

  'name' => 'frmPublicIndex'
);
echo  form_open('pb_ctr_home/index', $attributes); ?>
<div class="content-wrapper">
  <input name="sendinquiry" type="hidden" value="" />
  <input name="sendinquiryid" type="hidden" value="" />
  <input name="sortby" type="hidden" value="" />
  <div class="content">
  <div class="left-content">
	<h3>For Rent</h3>
	<div class="searchview-options">
	  <div class="view-options">
		<label>Viewing Option :</label>
		<input class="view-radio" type="radio" name="view" id="basic" value="Basic" checked> Basic</input>
		<input class="view-radio" type="radio" name="view" id="detailed" value="Detailed"> Detailed</input>
	  </div>

	</div>
	<div id="basic-view" class="result-wrapper" style="display: block;">
		<?php 
            if($count == 0){
                echo "<p>".$message."</p><br /><br />";
            }else{
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
			  <?php echo ($row['prop_monthly_rent'] == 0 ? "" : "<li>P".$row['prop_monthly_rent']." Monthly Rent</li>" );?>
			  <li>Available by 
                <?php 
                    if(strtotime(date("Y-m-d")) >= strtotime(date("Y-m-d", strtotime($row['prop_availby'])))){
                        echo "<strong>NOW</strong>";
                    }
                    else{
                        echo date("F j, Y", strtotime($row['prop_availby']));
                    }
                ?>
              </li>
			</ul>
			
			<div class="options">
			  <ul>
				<li><a href="#inquiryModal0<?php echo $div_counter; ?>">Inquiry</a></li>
				<li><a href="#picturesModal0<?php echo $div_counter; ?>">Pictures</a></li>
				<li><a href="<?php echo base_url(); ?>pb_ctr_home/detail/<?php echo $row['prop_id']; ?>">Details</a></li>
				<!--<li><a href="#locationModal0<!?php echo $div_counter; ?>">Location</a></li> -->
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
			<div id="inquiryModal0<?php echo $div_counter; ?>" class="iModal modalDialog">
				<div>
					<a href="#close" title="Close" class="close">X</a>
					<h2>Inquiry</h2>
					<div class="modalunit-info">
						<div class="list-photo">
						  <img src="<?php echo base_url(); ?><?php echo $row['prop_pic_filepath']; ?>" width="auto" height="169" title="<?php echo $row['prop_name']; ?>" alt="<?php echo $row['prop_name']; ?>" />
						</div>
						<ul class="modalunit-details">
						  <li><?php echo $row['prop_name']; ?></li>
						  <li><?php echo $row['prop_type']; ?></li>
						  <li><?php echo $row['prop_brgy']; ?>, <?php echo $row['prop_city_mun']; ?></li>
						  <?php echo ($row['prop_monthly_rent'] == 0 ? "" : "<li>P".$row['prop_monthly_rent']." Monthly Rent</li>" );?>
						  <li>Available by 
							<?php 
								if(strtotime(date("Y-m-d")) >= strtotime(date("Y-m-d", strtotime($row['prop_availby'])))){
									echo "<strong>NOW</strong>";
								}
								else{
									echo date("F j, Y", strtotime($row['prop_availby']));
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
							<a href="javascript:void(0)" onclick="sendInquiry('<?php echo $row['prop_id']; ?>')"><img src="<?php echo base_url(); ?>common/image/btn_submit.png" width="90" height="26" title="Submit" alt="Submit" /></a>
							<a href="<?php echo base_url(); ?>pb_ctr_home/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
						</div>
					</div>
				</div>
			</div>	
			</div>	
	
		<?php $div_counter++; endforeach; } ?>
		
	</div>
	<div id="detail-view" class="result-wrapper">
	<?php     
            if($count == 0){
                echo "<p>".$message."</p>";
            }else{
			$div_counter = 1;
			foreach ($events as $row):  
		?>
		<div class="unit-wrapper">
			<div class="unit-header">
			  <div class="unit-name">
				<h4><a href="<?php echo base_url(); ?>pb_ctr_home/detail/<?php echo $row['prop_id']; ?>"><?php echo $row['prop_name']; ?> - <?php echo $row['prop_city_mun']; ?>, <?php echo $row['prop_prov_reg']; ?></a></h4>
			  </div>
			  <div class="unit-price"><p>Rent: P<?php echo $row['prop_monthly_rent']; ?></p></div>
			  <div class="unit-availability"><p>Available by: 
                <?php 
                    if(strtotime(date("Y-m-d")) >= strtotime(date("Y-m-d", strtotime($row['prop_availby'])))){
                        echo "<strong>NOW</strong>";
                    }
                    else{
                        echo date("F j, Y", strtotime($row['prop_availby']));
                    }
                ?>
              </p></div>
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
				  <?php echo ($row['prop_type'] == "" ? "" : "<li>".$row['prop_type']."</li>" );?>
				  <?php echo ($row['prop_floor_area'] == 0 ? "" : "<li>".$row['prop_floor_area']."</li>" );?>
				  <?php echo ($row['prop_lot_area'] == 0 ? "" : "<li>".$row['prop_lot_area']."</li>" );?>
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
				<li><a href="#inquiryModal<?php echo $div_counter; ?>">Inquiry</a></li>
				<li><a href="#picturesModal<?php echo $div_counter; ?>">Pictures</a></li>
				<!--<li><a href="#locationModal">Location</a></li>-->
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
					  <img id="photo-item" class="opaque" itemprop="image" src="<?php echo base_url(); ?><?php echo $p_row['prop_pic_filepath']; ?>" width="auto" height="204" alt="Image <?php echo $photo_count; ?>" class="picture"  />
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
			  <div id="inquiryModal<?php echo $div_counter; ?>" class="iModal modalDialog">
				<div>
					<a href="#close" title="Close" class="close">X</a>
					<h2>Inquiry</h2>
					<div class="modalunit-info">
						<div class="list-photo">
						  <img src="<?php echo base_url(); ?><?php echo $row['prop_pic_filepath']; ?>" width="auto" height="169" title="<?php echo $row['prop_name']; ?>" alt="<?php echo $row['prop_name']; ?>" />
						</div>
						<ul class="modalunit-details">
						  <li><?php echo $row['prop_name']; ?></li>
						  <li><?php echo $row['prop_type']; ?></li>
						  <li><?php echo $row['prop_brgy']; ?>, <?php echo $row['prop_city_mun']; ?></li>
						  <?php echo ($row['prop_monthly_rent'] == 0 ? "" : "<li>P".$row['prop_monthly_rent']." Monthly Rent</li>" );?>
						  <li>Available by 
							<?php 
								if(strtotime(date("Y-m-d")) >= strtotime(date("Y-m-d", strtotime($row['prop_availby'])))){
									echo "<strong>NOW</strong>";
								}
								else{
									echo date("F j, Y", strtotime($row['prop_availby']));
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
							<a href="javascript:void(0)" onclick="sendInquiry('<?php echo $row['prop_id']; ?>')"><img src="<?php echo base_url(); ?>common/image/btn_submit.png" width="90" height="26" title="Submit" alt="Submit" /></a>
							<a href="<?php echo base_url(); ?>pb_ctr_home/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $div_counter++; endforeach; }?>
	
	  <!---<div class="result-navlinks">
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
	  <p>1 to 15 of <?php echo $count." ".$count_message; ?></p>
	</div>-->
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
  </div>
<div class="right-content">
	<?php include 'search.php'; ?>
  </div>
  </div>
</div>
<?php echo form_close(); ?>