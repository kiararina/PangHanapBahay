<?php
$attributes = array(
  //'name' => 'frmArticle',
  //'accept-charset' => 'UTF-8'
  'name' => 'frmUploadProperty'
);
echo  form_open_multipart('pb_ctr_agent/upload', $attributes); ?>
<div id="add-property-page" class="agent-page content-wrapper">
  <input type="hidden" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>" />
  <div class="content">
	<div class="center-content">
	  <h3>Add/Update Property Pictures</h3>
	  <div class="form-wrapper">
		  <table id="property">
			<tr>
			  <td class="label">Main Image</td>
			  <td class="file-input"><input type="file" name="userfile" id="userfile" size="20" value="" /></td>
			</tr>
			<!--<tr>
			  <td class="label">Other Image (1)</td>
			  <td class="file-input"><input class="file" type="file" name="image2" id="image2" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Other Image (2)</td>
			  <td class="file-input"><input class="file" type="file" name="image3" id="image3" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Other Image (3)</td>
			  <td class="file-input"><input class="file" type="file" name="image4" id="image4" value="" /></td>
			</tr>
			<tr>
			  <td class="label">Other Image (4)</td>
			  <td class="file-input"><input class="file" type="file" name="image5" id="image5" value="" /></td>
			</tr>-->
		  </table>
		  <div class="btn-area">
			<input type="hidden" name="upload" value="upload" />
			<input id="addproperty-btn" type="submit" value="" />
			<a href="<?php echo base_url(); ?>pb_ctr_agent/index"><img src="<?php echo base_url(); ?>common/image/btn_cancel.png" width="94" height="26" title="Cancel" alt="Cancel" /></a>
		  </div>
	  </div>
	</div>
  </div>
</div>
<?php echo form_close(); ?>