<!DOCTYPE html>
<html>
<head>

<?php ?>

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
<?php
/*
|  Set variables
*/
	$url_common = base_url().'common';
	$url_common_img = $url_common.'/image';
	$url_views_common = base_url().'views/common';
	$msg = "";
	$f_user_first_name ="";
	
/*
| format welcome message depending on user persona
*/	
	$f_user_first_name = $phb_user['user_first_name'];
	if ($in_persona == PERSONA_AGENT or $in_persona == PERSONA_TENANT) {
	
	} else {
	
		if ($phb_user['user_persona'] == PERSONA_BOTH) {
			$in_persona = PERSONA_TENANT;
		} else {
			$in_persona = $phb_user['user_persona'];
		}
	}
	
	if ($phb_user['user_persona'] == PERSONA_BOTH ) {
		if ($in_persona == PERSONA_AGENT) {
			$msg = "You are logged in as agent or owner. To switch to tenant, click here.";		
		} else {
			$msg = "You are logged in as tenant. To switch to agent or owner, click here.";
		}
	} else {
		if ($phb_user['user_persona'] == PERSONA_AGENT) {
			$msg = "You are logged in as agent/owner. To switch to tenant, update your profile.";
		} else {
			$msg = "You are logged in as tenant. To switch to agent/owner, update your profile."; 
		}
	}
	
	
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo $url_common; ?>/javascript/pikachoose-4.3.3/lib/jquery.pikachoose.full.js" type="text/javascript"></script>
<script src="<?php echo $url_common; ?>/javascript/shadowbox-3.0.3/shadowbox.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $url_common; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url_common; ?>/javascript/pikachoose-4.3.3/styles/bottom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url_common; ?>/javascript/shadowbox-3.0.3/shadowbox.css" />

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
 <div id="tenant-page" class="public-page">
	<header>
	  <div class="header-inner">
		<h1><img src="<?php echo $url_common_img; ?>/logo_top.png" width="485" height="90" title="PangHanapBahay" alt="PangHanapBahay" /></h1>
		<div id="logo-caption">
		  <p>Helping Filipinos find the perfect to call home.</p>
		</div>
		<div id="login">
		  <form type="submit" name="logout" 
			action="<?php echo base_url(); ?>index.php">
			<p class="welcome-text">Welcome, <?php echo $f_user_first_name ?>!</p>
			<p class="Welcome-text-small"><?php echo $msg; ?></p>
			<input id="logout-btn" name="b_logout" type="submit" value="" />
		  </form>
		</div>
	  </div>
	  <div id="main-menu">
		<nav>
		  <a href="<?php echo base_url(); ?>index.php/pb_ctr_reset">Reset Password</a>
		  <a href="<?php echo base_url(); ?>index.php/pb_ctr_profile">Profile</a>
		  <a href="<?php echo base_url(); ?>index.php/pb_ctr_common_page/contact/<?php echo $in_username.'/'.$in_persona.'/'.$in_prop_id; ?>">Contact Us</a>
		  <a href="<?php echo base_url(); ?>index.php/pb_ctr_common_page/about/<?php echo $in_username.'/'.$in_persona.'/'.$in_prop_id; ?>">About Us</a>
		  <a href="<?php echo base_url(); ?>index.php">Home</a>
		</nav>
	  </div>
	</header>
</html>
