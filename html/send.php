<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="#cacaca">

			<TABLE WIDTH="100%" CELLSPACING="2" CELLPADDING="1" BORDER="0" bgcolor="<? echo $html_tb_color ?>" bordercolor="#000000">
				<FORM ENCTYPE="multipart/form-data" METHOD="POST" ACTION="send.php" onSubmit="this.att_name.value=this.mail_att.value;">
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_from ?> : </TD>
					<TD>
						<SELECT name="from">
							<option value="<? echo $user."@".$provider ?>"><? echo $user."@".$provider ?></option>
						</SELECT>
					</td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_to ?> : </TD>
					<TD><INPUT TYPE="text" NAME="to" SIZE="80" MAXLENGTH="200" VALUE="<?echo $mail_to?>"></td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_cc ?> : </TD>
					<TD><INPUT TYPE="text" NAME="cc" SIZE="80" MAXLENGTH="200" VALUE="<?echo $mail_cc?>"></td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_bcc ?> : </TD>
					<TD><INPUT TYPE="text" NAME="bcc" SIZE="80" MAXLENGTH="200" VALUE="<?echo $mail_bcc?>"></td>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_subject ?> : </TD>
					<TD><INPUT TYPE="text" NAME="subject" SIZE="80" MAXLENGTH="200" VALUE="<?echo $mail_subject?>"></TD>
				</TR>
				<TR>
					<TD ALIGN="RIGHT" class="inbox"><? echo $html_att ?> : </TD>
					<TD>
						<INPUT TYPE="file" NAME="mail_att" SIZE="66" MAXLENGTH="200" VALUE="">
						<INPUT TYPE="hidden" NAME="att_name" VALUE="">
					</td>
				</TR>
				<TR>
					<TD colspan="2" align="center"><TEXTAREA NAME="body" COLS="80" ROWS="20" WRAP="physical"><?echo $mail_body?></TEXTAREA></TD>
				</TR>
				<TR>
					<TD align="center" colspan="2">
						<TABLE bgcolor="<? echo $html_tb_color ?>" bordercolor="#000000" WIDTH="100%" CELLSPACING="0" CELLPADDING="0" BORDER="0">
							<TR>
									<TD ALIGN="RIGHT" VALIGN="TOP" width="50%">
										<INPUT TYPE="submit" value="<? echo $html_send ?>">&nbsp;
									</TD>
									<TD ALIGN="LEFT" VALIGN="TOP" width="50%"></FORM>
										<FORM METHOD="GET" ACTION="action.php">
										&nbsp;<INPUT TYPE="submit" value="<? echo $hmtl_cancel ?>">
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