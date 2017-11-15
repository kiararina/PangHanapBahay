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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/javascript/pikachoose-4.3.3/lib/jquery.pikachoose.full.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/javascript/shadowbox-3.0.3/shadowbox.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/javascript/pikachoose-4.3.3/styles/bottom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/javascript/shadowbox-3.0.3/shadowbox.css" />


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
	$('.image00').click(function(){
		document.getElementById('photo-wrapper').style.display = "block";
		document.getElementById('photo-wrapper01').style.display = "none";
		document.getElementById('photo-wrapper02').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image01').click(function(){
		document.getElementById('photo-wrapper01').style.display = "block";
		document.getElementById('photo-wrapper').style.display = "none";
		document.getElementById('photo-wrapper02').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
	$('.image02').click(function(){
		document.getElementById('photo-wrapper02').style.display = "block";
		document.getElementById('photo-wrapper01').style.display = "none";
		document.getElementById('photo-wrapper').style.display = "none";
		$("#photo-controls a").removeClass("selected");
		$(this).addClass("selected");
	});
});
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
		?>
			<?php if($this->session->userdata('user_persona')== 1)
			{ ?>
			<div id="login">
				<br>
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <span style="color:#02ACF0;"><?php echo $this->session->userdata('user_first_name'); ?>!</span> you are login as Tenant
				<a href="<?php echo base_url(); ?>login/logout"><button id="logout-btn">  </button></a>
			</div>
			
			<?php
			}
			else 
			{ if ($this->session->userdata('user_persona')== 2) ?>
				<div id= "login">
				<br>
				<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <span style="color:#02ACF0;"><?php echo $this->session->userdata('user_first_name'); ?>!</span> you are login as Agent
					<a href="<?php echo base_url(); ?>login/logout"><button id="logout-btn">  </button></a>
				</div>
			<?php 
			}
			?>
		
		<?php }else 
		{ 
		?>
		
		
		<?php echo form_open('login/validate_credentials'); ?> 
			<?php if(isset($message_error) && $message_error){echo '<span style="color:#FF002A;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid Username or Password</span>';} ?>		
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
		  <a href="<?php echo base_url(); ?>index.php/pb_ctr_common_page/contact/<?php echo $in_username.'/'.$in_persona.'/'.$in_prop_id; ?>">Contact Us</a>
		  <a href="<?php echo base_url(); ?>index.php/pb_ctr_common_page/about/<?php echo $in_username.'/'.$in_persona.'/'.$in_prop_id; ?>">About Us</a>
		  <a href="<?php echo base_url(); ?>home" class="selected">Home</a>
		</nav>
	  </div>
	</header>
	
	
	<div class="content-wrapper">