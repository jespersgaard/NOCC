<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<? echo $html_inside_color ?>">
			<TABLE WIDTH="100%" CELLSPACING="2" CELLPADDING="1" BORDER="0" bgcolor="<? echo $html_inside_color ?>">
				<FORM name="sendform" ENCTYPE="multipart/form-data" METHOD="POST" onSubmit="return(check_form(this));" ACTION="send.php">
				<input type="hidden" name="sort" value="<? echo $sort ?>">
				<input type="hidden" name="sortdir" value="<? echo $sortdir ?>">
				<input type="hidden" name="lang" value="<? echo $lang ?>">
				<input type="hidden" name="sendaction" value="">
				<input type="hidden" name="num_attach" value="<? echo $num_attach ?>">
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_from ?> : </TD>
					<TD>
						<SELECT name="mail_from">
							<option value="<? echo $user."@".$domain ?>"><? echo $user."@".$domain ?></option>
						</SELECT>
					</td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_to ?> : </TD>
					<TD><INPUT TYPE="text" NAME="mail_to" SIZE="60" MAXLENGTH="200" VALUE="<? echo $mail_to ?>"></td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_cc ?> : </TD>
					<TD><INPUT TYPE="text" NAME="mail_cc" SIZE="60" MAXLENGTH="200" VALUE="<? echo $mail_cc ?>"></td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_bcc ?> : </TD>
					<TD><INPUT TYPE="text" NAME="mail_bcc" SIZE="60" MAXLENGTH="200" VALUE="<? echo $mail_bcc ?>"></td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_subject ?> : </TD>
					<TD><INPUT TYPE="text" NAME="mail_subject" SIZE="60" MAXLENGTH="200" VALUE="<? echo $mail_subject ?>"></TD>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_att ?> : </TD>
					<TD>
						<INPUT TYPE="file" NAME="mail_att" SIZE="40" MAXLENGTH="200" VALUE="">
						<input type="button" class="button" onclick="attach()" value="<? echo $html_attach ?>">
					</td>
				</TR>
				<TR>
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
								echo ("<tr><td class=\"inbox\"><input type=\"checkbox\" name=\"file$i\" value=\"file$i\"></td><td class=\"inbox\">".$attach_array[$i]->file_name."</td><td class=\"inbox\">".$attach_array[$i]->file_size."</td></tr>");
								echo ("\n<input type=\"hidden\" name=\"send_att$i\" value=\"".$attach_array[$i]->file_name."\">\n<input type=\"hidden\" name=\"send_att_tmp$i\" value=\"".$attach_array[$i]->tmp_file."\">\n<input type=\"hidden\" name=\"send_att_size$i\" value=\"".$attach_array[$i]->file_size."\">\n<input type=\"hidden\" name=\"send_att_mime$i\" value=\"".$attach_array[$i]->file_mime."\">\n");
							}
							echo ("<tr><td colspan=\"2\"><input type=\"button\" class=\"button\" onclick=\"delete_attach()\" value=\"$html_attach_delete\"></td><td class=\"inbox\"><b>$html_totalsize : $totalsize $html_bytes</b></td></tr></table>");
						}
						else
							echo ("&nbsp;");
						?>
					</td>
				</TR>
				<TR>
					<TD colspan="2" align="center"><TEXTAREA NAME="mail_body" COLS="70" ROWS="20" WRAP="physical"><? echo $mail_body ?></TEXTAREA></TD>
				</TR>
				<TR>
					<TD align="center" colspan="2">
						<TABLE bgcolor="<? echo $html_inside_color ?>" WIDTH="100%" CELLSPACING="0" CELLPADDING="0" BORDER="0">
							<TR>
								<TD ALIGN="RIGHT" VALIGN="TOP" width="50%">
									<INPUT TYPE="submit" class="button" value="<? echo $html_send ?>">&nbsp;
								</TD>
								<TD ALIGN="LEFT" VALIGN="TOP" width="50%"></FORM>
									<FORM METHOD="GET" ACTION="action.php">
									<INPUT TYPE="HIDDEN" NAME="lang" VALUE="<? echo $lang ?>">
									&nbsp;<INPUT TYPE="submit" class="button" value="<? echo $html_cancel ?>">
									</FORM>
								</TD>
							</TR>
						</TABLE>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
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
	if (sendform.mail_att.value != "")
	{
		alert("<? echo $html_attach_forget ?>")
		return (false);
	}
	sendform.sendaction.value = "send";
}

function attach()
{
	if (sendform.mail_att.value != "")
	{
		sendform.sendaction.value = "add";
		sendform.submit();
	}
}

function delete_attach()
{
	sendform.sendaction.value = "delete";
	sendform.submit();
}
//-->
</script>