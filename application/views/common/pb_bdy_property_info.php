<?php
/*
| format form fields with information from table
*/
	if (empty($phb_prop_pics)) {
		$f_prop_pic_filepath 	= "";
		$f_caption				= "";
	} else {
		$f_prop_pic_filepath 	= $phb_prop_pics['prop_pic_filepath'];
		$f_caption				= $phb_prop_pics['prop_caption'];
	}
	
	$f_prop_name 			= $phb_prop['prop_name'];
	$f_owner_id				= $phb_prop['prop_owner_id'];
	$f_barangay				= $phb_prop['prop_brgy'];
	$f_city					= $phb_prop['prop_city_mun'];
	$f_monthly_rent			= $phb_prop['prop_monthly_rent'];
	$prop_type_id 			= $phb_prop['prop_type_id'];	
	
	$result = $this->pb_mod_all->get_phb_prop_type($prop_type_id);
	$f_prop_type = $result['prop_type'];
	
	$result = $this->pb_mod_all->get_phb_username($f_owner_id);
	$f_owner = $result ['user_username'];
		
/* display "now" if availability date is less than or equal to current date
*/
	$year 	= substr($phb_prop['prop_availby'],0,4);
	$month 	= substr($phb_prop['prop_availby'],5,2);
	$day	= substr($phb_prop['prop_availby'],8,2);
	$datetime = mktime(0,0,0,$month,$day,$year);
	
	if (date("Y/m/d",$datetime) <= date("Y/m/d")) {
		$f_availby = "Now!";
	} else {
		$f_availby =date("j M Y",$datetime);
	}
	
?>
<div class="content-wrapper">
	<div class="content">
		<div class="left-content">
			<div class="unit-details">
<!-- Format property details -->
				<table>
					<td style="vertical-align:text_bottom;">
						<img 	src="<?php echo $f_prop_pic_filepath; ?>" width="100" height="84" 
								title="<?php echo $f_prop_name;?>" alt="<?php echo $f_prop_name; ?>" /><br>
						<p><?php echo $f_caption;       ?></p><br>
					</td>
					<td style="vertical-align:text-bottom;">
						<!-- values from the DB tables will be converted into text for //-->
						<p><?php echo $f_prop_name; 	?><br>
						   <?php echo $f_owner;         ?><br>
						   <?php echo $f_barangay;      ?>,&nbsp;<?php echo $f_city;?>
						</p><br>
						<p><?php echo $f_prop_type;     ?>&nbsp;|&nbsp;
						For <?php echo $f_monthly_rent; ?> PHP monthly&nbsp;|&nbsp;
						Available by <?php echo $f_availby;       ?></p>
					</td>
				</table>
			</div>
		</div>
	</div>
</div>