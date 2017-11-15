<?php
$attributes = array(
  //'name' => 'frmArticle',
  //'accept-charset' => 'UTF-8'
  'name' => 'frmDeleteProperty'
);
echo form_open('pb_ctr_agent/delete/'.$property->prop_id, $attributes); ?>
<div id="add-property-page" class="agent-page content-wrapper">
  <input type="hidden" name="id" id="id" value="<?php echo $property->prop_id; ?>" />
  <div class="content">
	<div class="center-content">
	  <h3>Delete Property</h3>
	  <div class="form-wrapper">
		  <div class="btn-area">
		    <p class="del-warning">Are you sure you want to delete the <?php echo $property->prop_name; ?> property?</p>
			<input type="hidden" name="button2" value="confirm" />
			<input id="deleteproperty-btn" type="submit" value="" />
			<a href="<?php echo base_url(); ?>pb_ctr_agent/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
		  </div>
	  </div>
	</div>
  </div>
</div>
<?php echo form_close(); ?>