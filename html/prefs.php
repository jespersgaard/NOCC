<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<?php echo $glob_theme->inside_color ?>">
			<form method="post" action="<?php echo $PHP_SELF; ?>">
			<input type="hidden" name="action" value="setprefs" />
			<input type="hidden" name="submit_prefs" value="set" />
			<table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
				<tr>
					<td align="right" class="prefs" valign="top"><?php echo $html_full_name ?> : </td>
					<td align="left" class="prefs">
						<input type="text" name="full_name" value="<?php echo $full_name ?>" size="40"/>
					</td>
				</tr>
				<tr>
					<td align="right" class="prefs" valign="top"><?php echo $html_email_address ?> : </td>
					<td align="left" class="prefs">
						<input type="text" name="email_address" value="<?php echo $email_address ?>" size="40"/>
					</td>
				</tr>
				<tr>
					<td align="right" class="prefs" valign="top"><?php echo $html_ccself ?> : </td>
					<td align="left" class="prefs">
						<input type="checkbox" name="cc_self" value="on" <?php if($cc_self != '') echo "checked"; ?> />
					</td>
				</tr>
				<tr>
					<td align="right" class="prefs" valign="top"><?php echo $html_signature ?> : </td>
					<td align="left" class="prefs">
						<textarea name="signature" rows="5" cols="40"><?php echo $signature ?></textarea>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<?php
							if(isset($submit_prefs))
								echo '<p class="prefs">'.$html_prefs_updated.'</p>';
						?>
						<table bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
							<tr>
								<td align="right" valign="top" width="50%">
									<input type="submit" class="button" value="<?php echo $html_submit ?>" />&nbsp;
								</td>
								<td align="left" valign="top" width="50%">
									&nbsp;<input type="reset" class="button" value="<?php echo $html_cancel ?>" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>