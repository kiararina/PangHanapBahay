<div class="content-wrapper">
	<div class="content">
		<div class="left-content">
   	<!-- Form fields arranged in table are defined here //-->
	<!-- User comments //-->
	<!-- All user published user comments will be displayed.
	---- Additional unpublished user comments will be displayed only for the current user //-->
	<!-- Logged-in user comments //-->

	<h3>Comments</h3><br>
	<!-- retrieve variables //-->
	<?php $in_show_all = $this->session->userdata('show_all_comments'); ?>
	<?php $in_errmsg   = $this->session->userdata('error_message'); ?>
	<?php $in_user_type_page = $this->session->userdata('user_type_page'); 
	
		switch ($in_user_type_page)
		{
			case 'tenant':
				$action_close = base_url().'pb_ctr_tenant';
				break;
			case 'agent':
				$action_close = base_url().'pb_ctr_agent';
				break;
			default:
				$action_close = base_url().'pb_ctr_home';
		}
		
	?>
	<?php echo form_open("$action_close"); ?>
			<input type="submit" name="b_close" value="Close Comments" ></input>
			<br><br>
	<?php echo form_close(); ?>
	
	
	<?php $action = base_url()."/pb_ctr_comments/action/{$in_prop_id}"; ?>		
	
	<?php echo form_open("$action"); ?>
			<button type="submit" name="b_show_own_comments" 
					value="show_comments">
					<?php if ($in_show_all == TRUE) { echo 'MY comments only'; } else { echo 'ALL comments'; } ?>
			</button>
	<?php echo form_close(); ?>	
	

	<!-- <form name="add_comments" method="post" accept-charset="utf-8" action="comments/add"/> //-->
	<!-- new comments //-->
	
	<?php $action = base_url()."/pb_ctr_comments/action/{$in_prop_id}"; ?>		
	<?php echo form_open("$action"); ?>

				<table>
				<div class="error"><b>
				<br>
				<span style="color:red;font-weight:bold"><p><?php if ($in_errmsg !== FALSE) { echo $in_errmsg;} ?></p></span>
				</b>
				</div>
				
				<input name="f_username" type="hidden" 
					value="<?php echo $in_username; ?>"/></input>
				<input name="f_prop_id" type="hidden" 
					value="<?php echo $in_prop_id; ?>"/></input>
				
				<a name="anchor_0"></a>
				
				<label for="f_comment_new"></label><br>
				<textarea cols="50" rows="5" 
					name="f_comment_new" placeholder="Enter new comment" required/></textarea><br>
					<span style="color:red;font-weight:bold"><?php echo form_error('f_comment_new'); ?></span>
				
				<input name="f_publish_user_comment_new" 
					type="radio" value="0" required checked/>private</input>
				
				<input name="f_publish_user_comment_new" 
					type="radio" value="1" required/>public</input>
					&nbsp;&nbsp;&nbsp;
				<button name="b_add_comment"
					type="submit" value="add_comment"/>add</button><br>
					<span style="color:red;font-weight:bold"><?php echo form_error('f_publish_user_comment_new'); ?></span>
								
				</td>
				<br><br>
				</tr>
				</table>

	<?php echo form_close(); ?>
<?php
/* format comment fields with values retrieved
*/
	$counter = 0;
	foreach  ($phb_comments as $item): 
				$counter++;
/*
|  	compute rows of text to display.
*/
			$numlines = strlen($item['comment_text'])/NUM_COLS_COMMENTS+1;
			if ($numlines >= NUM_LINES_MAX) {
				$numlines = NUM_LINES_MAX;
			} else {
				$numlines = NUM_LINES_MIN;
			}
/*
|	allow edit or delete, only if the comment belongs to the current user.
*/

			$allow_edit = FALSE;
			if ($item['comment_username'] == $in_username) {
				$allow_edit = TRUE;
			} 
?>
			<!-- <form name="view_comments" method="post" accept-charset="utf-8" action="comments/add"/> // -->
			<?php echo form_open("$action"); ?>
			<tr>
				<td>
				
				<input name="f_comment_id" type="hidden" 
					value="<?php echo $item['comment_id'];?>"/></input>
				
				<input name="f_username" type="text" 
					value="<?php echo $item['comment_username']; ?>" 
					readonly style="border-style:none;"></input>&nbsp;
				<input name="f_datetime" type="text" 
					value="<?php echo $item['comment_dtime_add']; ?>"	
					readonly style="border-style:none; font-size:70%"></input><br>
				<hr></hr>
				<a name="anchor_<?php echo $counter; ?>"></a>
				<input name="f_counter" type="hidden" value=<?php echo $counter; ?>></a>
				<textarea name="f_comment_text" 
					cols="50" rows="<?php echo $numlines;?>"
					placeholder="Enter comment text"
					<?php if ($allow_edit == TRUE) { 
								echo ' required';
							} else {
								echo ' readonly style="border-style:none;"';							
							}?>>
					<?php echo $item['comment_text'];?></textarea><br>
				
				<?php 
				if ($allow_edit == TRUE) {
					echo form_radio('f_publish_user_comment', '0', !$item['comment_publish']);
					echo 'private</input>';
					echo form_radio('f_publish_user_comment', '1', $item['comment_publish']);
					echo 'public</input>';
					echo nbs(3);
					echo form_submit('b_upd_comment', 'update');
					echo nbs(1);
					echo form_submit('b_del_comment', 'delete');
					echo br(2);
				}
				?>

				</td>
				</tr>
			<?php echo form_close(); ?>
<?php endforeach ?>
			<form action="<?php echo $action_close; ?>">
				<br>
				<input type="submit" name="b_close" value="Close Comments" ></input>
			</form>
		</div>
	</div>
</div>