<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<? echo $html_inside_color ?>">
			<form name="sendform" enctype="multipart/form-data" method="post" onsubmit="return(check_form(this));" action="send.php">
			<input type="hidden" name="sort" value="<? echo $sort ?>" />
			<input type="hidden" name="sortdir" value="<? echo $sortdir ?>" />
			<input type="hidden" name="lang" value="<? echo $lang ?>" />
			<input type="hidden" name="action" value="<? echo $action ?>" />
			<input type="hidden" name="sendaction" value="" />
			<input type="hidden" name="num_attach" value="<? echo $num_attach ?>" />
			<table width="100%" cellspacing="2" cellpadding="1" border="0" bgcolor="<? echo $html_inside_color ?>">
				<tr>
					<td align="right" class="inbox"><? echo $html_from ?> : </td>
					<td>
						<select name="mail_from">
							<option value="<? echo $user."@".$domain ?>"><? echo $user."@".$domain ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right" class="inbox"><? echo $html_to ?> : </td>
					<td><input type="text" name="mail_to" size="60" maxlength="200" value="<? echo $mail_to ?>" /></td>
				</tr>
				<tr>
					<td align="right" class="inbox"><? echo $html_cc ?> : </td>
					<td><input type="text" name="mail_cc" size="60" maxlength="200" value="<? echo $mail_cc ?>" /></td>
				</tr>
				<tr>
					<td align="right" class="inbox"><? echo $html_bcc ?> : </td>
					<td><input type="text" name="mail_bcc" size="60" maxlength="200" value="<? echo $mail_bcc ?>" /></td>
				</tr>
				<tr>
					<td align="right" class="inbox"><? echo $html_subject ?> : </td>
					<td><input type="text" name="mail_subject" size="60" maxlength="200" value="<? echo $mail_subject ?>" /></td>
				</tr>
				<tr>
					<td align="right" class="inbox"><? echo $html_att ?> : </td>
					<td>
						<input type="file" name="mail_att" size="40" maxlength="200" value="" />
						<input type="button" class="button" onclick="attach()" value="<? echo $html_attach ?>" />
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?
						if ($num_attach > 0)
						{
							echo ("<table border=\"0\" cellspacing=\"2\"><tr><td class=\"inbox\">&nbsp;</td><td class=\"inbox\"><b>$html_filename</b></td><td class=\"inbox\"><b>$html_size ($html_bytes)</b></td></tr>");
							$totalsize = 0;
							for ($i = 1; $i <= $num_attach; $i++)
							{	
								$totalsize += $attach_array[$i]->file_size;
								$att_name = imap_mime_header_decode($attach_array[$i]->file_name);
								echo ("<tr><td class=\"inbox\">\n<input type=\"hidden\" name=\"send_att$i\" value=\"".imap_8bit($att_name[0]->text)."\" />\n<input type=\"hidden\" name=\"send_att_tmp$i\" value=\"".$attach_array[$i]->tmp_file."\" />\n<input type=\"hidden\" name=\"send_att_size$i\" value=\"".$attach_array[$i]->file_size."\" />\n<input type=\"hidden\" name=\"send_att_mime$i\" value=\"".$attach_array[$i]->file_mime."\" />\n<input type=\"checkbox\" name=\"file$i\" value=\"file$i\" /></td><td class=\"inbox\">".htmlentities($att_name[0]->text)."</td><td class=\"inbox\">".$attach_array[$i]->file_size."</td></tr>");
							}
							echo ("<tr><td colspan=\"2\"><input type=\"button\" class=\"button\" onclick=\"delete_attach()\" value=\"$html_attach_delete\" /></td><td class=\"inbox\"><b>$html_totalsize : $totalsize $html_bytes</b></td></tr></table>");
						}
						else
							echo ("&nbsp;");
						?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><textarea name="mail_body" cols="70" rows="20"><? echo $mail_body ?></textarea></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<table bgcolor="<? echo $html_inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
							<tr>
								<td align="right" valign="top" width="50%">
									<input type="submit" class="button" value="<? echo $html_send ?>" />&nbsp;
								</td>
								<td align="left" valign="top" width="50%">
									&nbsp;<input type="reset" class="button" value="<? echo $html_cancel ?>" />
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

<script type="text/javascript">
<!--
function check_form(form)
{
	if (validate(form) == false)
		return (false);
}

function validate(f) 
{
	if (window.RegExp) 
	{
		var reg = new RegExp("[0-9A-Za-z]+","g");
		if (!reg.test(f.elements['mail_to'].value))
		{
			alert("<? echo $to_empty ?>");
			f.elements['mail_to'].focus();
			return (false);
		}
	}
	if (f.elements['mail_att'].value != "")
	{
		alert("<? echo $html_attach_forget ?>")
		return (false);
	}
	f.elements['sendaction'].value = "send";
}

function attach()
{
	if (document.sendform.mail_att.value != "")
	{
		document.sendform.sendaction.value = "add";
		document.sendform.submit();
	}
}

function delete_attach()
{
	document.sendform.sendaction.value = "delete";
	document.sendform.submit();
}
//-->
</script>