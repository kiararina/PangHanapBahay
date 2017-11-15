<div class="banner-wrapper">
  <script type="text/javascript">
	$(document).ready(
	  function (){
		var height = $(".pikachoose").height();
		var width = $(".pikachoose").width();
		$("#top_loader").height(height);
		$("#top_loader").width(width);
		$("#pikame").PikaChoose({speed:5000, carousel:true, IESafe:false, text:{previous: "", next: ""}});
		$("#top_loader").hide();
		$("div.pikachoose").removeClass('hide_pika');
	  });
  </script>
  <div id='top_loader' style="text-align:-moz-center;"><img src='common/image/ajax-loader-small.gif' alt='loading...' width="48" height="48" /></div>
  <div class="pikachoose hide_pika" width="334" height="980">
	<ul id="pikame" class="jcarousel-skin-pika">
	  <li><a href=""><img src="<?php echo base_url(); ?>common/image/banner/thumbnail1.jpg" width="147" height="38" ref="<?php echo base_url(); ?>common/image/banner/banner1.jpg" alt="" title="" /></a><span>Sample Text 1</span></li>
	  <li><a href=""><img src="<?php echo base_url(); ?>common/image/banner/thumbnail2.jpg" width="147" height="38" ref="<?php echo base_url(); ?>common/image/banner/banner2.jpg" alt="" title="" /></a><span>Sample Text 2</span></li>
	  <li><a href=""><img src="<?php echo base_url(); ?>common/image/banner/thumbnail3.jpg" width="147" height="38" ref="<?php echo base_url(); ?>common/image/banner/banner3.jpg" alt="" title="" /></a><span>Sample Text 3</span></li>
	  <li><a href=""><img src="<?php echo base_url(); ?>common/image/banner/thumbnail4.jpg" width="147" height="38" ref="<?php echo base_url(); ?>common/image/banner/banner4.jpg" alt="" title="" /></a><span>Sample Text 4</span></li>
	</ul>
  </div>
</div>