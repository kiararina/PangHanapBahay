<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="all" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="keywords" content="PangHanapBahay" />
<meta name="description" content="PangHanapBahay" />
<meta name="author" content="" lang="en" />
<meta name="copyright" content="Copyright (c) 2014 PangHanapBahay. All Rights Reserved." />
<meta name="revisit_after" content="7 days" />
<title>PangHanapBahay</title>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/javascript/pikachoose-4.3.3/lib/jquery.pikachoose.full.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/javascript/shadowbox-3.0.3/shadowbox.js" ></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/javascript/pikachoose-4.3.3/styles/bottom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/javascript/shadowbox-3.0.3/shadowbox.css" />

<style>
.error {
    color: red;
	font-weight:bold;
}
</style>

<script type="text/javascript">
	function go(){
	location= document.myform.myselect.options[document.myform.myselect.selectedIndex].value
	}
</script>
<script type="text/javascript">
  $(function() {
    $('input[name=view]').change(function() {
    if($(this).val() == 'Basic') {
		$('#basic-view').slideToggle('500');
		document.getElementById('detail-view').style.display = "none";
	}
    if($(this).val() == 'Detailed') {
		$('#detail-view').slideToggle('500');
		document.getElementById('basic-view').style.display = "none";
	} 
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.image1').click(function(){
		document.getElementById('photo-wrapper1').style.display = "block";
		document.getElementById('photo-wrapper2').style.display = "none";
		document.getElementById('photo-wrapper3').style.display = "none";
		document.getElementById('photo-wrapper4').style.display = "none";
		document.getElementById('photo-wrapper5').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image2').click(function(){
		document.getElementById('photo-wrapper2').style.display = "block";
		document.getElementById('photo-wrapper1').style.display = "none";
		document.getElementById('photo-wrapper3').style.display = "none";
		document.getElementById('photo-wrapper4').style.display = "none";
		document.getElementById('photo-wrapper5').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image3').click(function(){
		document.getElementById('photo-wrapper3').style.display = "block";
		document.getElementById('photo-wrapper2').style.display = "none";
		document.getElementById('photo-wrapper1').style.display = "none";
		document.getElementById('photo-wrapper4').style.display = "none";
		document.getElementById('photo-wrapper5').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image4').click(function(){
		document.getElementById('photo-wrapper4').style.display = "block";
		document.getElementById('photo-wrapper1').style.display = "none";
		document.getElementById('photo-wrapper2').style.display = "none";
		document.getElementById('photo-wrapper3').style.display = "none";
		document.getElementById('photo-wrapper5').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image5').click(function(){
		document.getElementById('photo-wrapper5').style.display = "block";
		document.getElementById('photo-wrapper1').style.display = "none";
		document.getElementById('photo-wrapper2').style.display = "none";
		document.getElementById('photo-wrapper3').style.display = "none";
		document.getElementById('photo-wrapper4').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image01').click(function(){
		document.getElementById('photo-wrapper01').style.display = "block";
		document.getElementById('photo-wrapper02').style.display = "none";
		document.getElementById('photo-wrapper03').style.display = "none";
		document.getElementById('photo-wrapper04').style.display = "none";
		document.getElementById('photo-wrapper05').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image02').click(function(){
		document.getElementById('photo-wrapper02').style.display = "block";
		document.getElementById('photo-wrapper01').style.display = "none";
		document.getElementById('photo-wrapper03').style.display = "none";
		document.getElementById('photo-wrapper04').style.display = "none";
		document.getElementById('photo-wrapper05').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image03').click(function(){
		document.getElementById('photo-wrapper03').style.display = "block";
		document.getElementById('photo-wrapper02').style.display = "none";
		document.getElementById('photo-wrapper01').style.display = "none";
		document.getElementById('photo-wrapper04').style.display = "none";
		document.getElementById('photo-wrapper05').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image04').click(function(){
		document.getElementById('photo-wrapper04').style.display = "block";
		document.getElementById('photo-wrapper01').style.display = "none";
		document.getElementById('photo-wrapper02').style.display = "none";
		document.getElementById('photo-wrapper03').style.display = "none";
		document.getElementById('photo-wrapper05').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image05').click(function(){
		document.getElementById('photo-wrapper05').style.display = "block";
		document.getElementById('photo-wrapper01').style.display = "none";
		document.getElementById('photo-wrapper02').style.display = "none";
		document.getElementById('photo-wrapper03').style.display = "none";
		document.getElementById('photo-wrapper04').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
});
</script>
<script type="text/javascript">
	function initialize() {
        var address = (document.getElementById('my-address'));
        var autocomplete = new google.maps.places.Autocomplete(address);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
      });
	}
	function codeAddress() {
		geocoder = new google.maps.Geocoder();
		var address = document.getElementById("my-address").value;
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {

		  alert("Latitude: "+results[0].geometry.location.lat());
		  alert("Longitude: "+results[0].geometry.location.lng());
		  } 

		  else {
			alert("Geocode was not successful for the following reason: " + status);
		  }
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div id="home-page" class="public-page">
	<header>
		<div class="header-inner">
			<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>common/image/logo_top.png" width="485" height="90" title="PangHanapBahay" alt="PangHanapBahay" /></a></h1>
			<div id="logo-caption">
				<p>Helping Filipinos find the perfect to call home.</p>
			</div>
		
			<?php	if($this->session->userdata('is_logged_in')) 
			{ 
				$user_type_page = $this->session->userdata('user_type_page');
				
			?>
				<?php 
				if($this->session->userdata('user_persona')== 1)
				{ $user_type_page = "tenant"; 
				?>
				<div id="login">
					<br>
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <span style="color:#02ACF0;">
					<?php echo $this->session->userdata('user_first_name'); ?>!</span> You are logged in as Tenant
					<a href="<?php echo base_url(); ?>login/logout"><button id="logout-btn">  </button></a>
				</div>
				
				<?php
				}
				elseif ($this->session->userdata('user_persona')== 2)
				{ $user_type_page = "agent"; 
				?>
					<div id= "login">
					<br>
					<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <span style="color:#02ACF0;">
						<?php echo $this->session->userdata('user_first_name'); ?>!</span> You are logged in as Agent or Owner
						<a href="<?php echo base_url(); ?>login/logout"><button id="logout-btn">  </button></a>
					</div>
				<?php 
				}
				elseif ($this->session->userdata('user_persona')== 3)
				{ 
						
				?>
					<div id= "login">
					<br>
					<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <span style="color:#02ACF0;">
						<?php echo $this->session->userdata('user_first_name'); ?>! 
						</span>You are logged in as
						<span style="color:#530072;"><strong>
						<?php if ($user_type_page == "tenant") 
						{echo 'Tenant. ';} else {echo 'Agent or Owner. ';} ?></strong></span>
						<a href="<?php 
							echo base_url(); 
							if ($user_type_page == "tenant") { echo "pb_ctr_agent";} else { echo "pb_ctr_tenant";}?>">
							<?php
							if ($user_type_page == "tenant") { echo "Switch as Agent";} else { echo " Switch as Tenant";} ?>.</a> 
						
						<a href="<?php echo base_url(); ?>login/logout"><button id="logout-btn">  </button></a>
					</div>
				<?php 
				}
				?>
			
			
			<?php }else 
			{ 
				$user_type_page = "home";
				
			?>
			
				<?php echo form_open('login/validate_credentials'); ?> 
				<?php $message_error = $this->session->userdata('message_error'); ?>
				
				<?php if(isset($message_error) && ($message_error == TRUE) ){echo '<span style="color:#FF002A;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid Username or Password</span>';} ?>		
			
				<div id="login">
				
					<div class="login-div"><label>Username:</label> 
						<input type="text" name="user_username" id="user_username" />
					</div>
					<div class="login-div"><label>Password:</label> 
						<input type="password" name="user_password" id="user_password" />
					</div>
					<input id="login-btn" type="submit" value="" />
				
				<?php echo form_close();?>
			   
				<div class="login-links">
					<a href="<?php echo base_url(); ?>register">Register!</a>
					<a href="<?php echo base_url(); ?>forgot">Forgot username or password?</a>
				</div>
				
				</div>
			<?php 
			} 
			?>
			
	</div>
	
	<div id="main-menu">
		<nav>
			<?php if($this->session->userdata('is_logged_in')) { ?>
			<a href="<?php echo base_url(); ?>pb_ctr_reset">Reset Password</a>
			<a href="<?php echo base_url(); ?>pb_ctr_change_profile">Profile</a>
			<?php } ?>
			<a href="<?php echo base_url(); ?>pb_ctr_contact">Contact Us</a>
			<a href="<?php echo base_url(); ?>pb_ctr_about">About Us</a>
			
			<a href="<?php 
						echo base_url(); 
						if ($user_type_page == "tenant") { 
								echo "pb_ctr_tenant";
							} else { 
								if ($user_type_page == 'agent') {
									echo "pb_ctr_agent";
								} else {
									echo "pb_ctr_home";
								}}?>"  class="selected">Home</a>

		
		</nav>
	</div>
	</header>
	
	
