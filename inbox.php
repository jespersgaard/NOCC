<?
$attach_tab = Array();
$body = "";

/* ----------------------------------------------------- */

function inbox($servr, $user, $passwd, $sort)
{
	$pop = @imap_open("{".$servr."}INBOX", $user, $passwd);

	if ($pop == false)
		return (-1);
	else
	{ 
		if (($num_messages = @imap_num_msg($pop)) == 0)
		{
			imap_close($pop);
			return (0);
		}
		else
		{
			if (empty($sort))
			{
				$sort = "SORTARRIVAL";
				$sorted = imap_sort($pop, $sort, 1, SE_UID); 
			}
			else
				$sorted = imap_sort($pop, $sort, 0, SE_UID); 
			for ($i = 0; $i < $num_messages; $i++)
			{
				$msgnum = $sorted[$i];
				$ref_contenu_message = imap_header($pop, imap_msgno($pop, $msgnum));
				$struct_msg = imap_fetchstructure($pop, imap_msgno($pop, $msgnum));
				$msg_size = ($struct_msg->bytes > 1024) ? round($struct_msg->bytes / 1024) : 1;
				if ($struct_msg->type == 1)
				{
					if ($struct_msg->subtype == "ALTERNATIVE")
						$attach = "&nbsp;";
					else
						$attach = "<img src=img/attach.gif>";
				}
				else
					$attach = "&nbsp;";
				if (($ref_contenu_message->Unseen == 'U') || ($ref_contenu_message->Recent == 'N'))
					$newmail = "<img src=img/new.gif>";
				else
					$newmail = "&nbsp;";
				$msg_list[$i] =  Array(
						"new" => $newmail, 
						"number" => imap_msgno($pop, $msgnum), 
						"attach" => $attach, 
						"from" => htmlspecialchars($ref_contenu_message->fromaddress), 
						"subject" => htmlspecialchars($ref_contenu_message->subject), 
						"date" => chop($ref_contenu_message->date), 
						"size" => $msg_size);
			}
			imap_close($pop);
			return ($msg_list);
		}
	}
}

/* ----------------------------------------------------- */

function add_url_and_email($tmp_url="")
{
	preg_match_all("/http:\/\/([_a-zA-Z0-9-.\/]+)/si", $tmp_url, $url_array);
	for($i = 0; $i < count($url_array[0]); $i++)
	{
	    if($url_done[$url_array[0][$i]] != "done")
	    {
			$tmp_url = ereg_replace( $url_array[0][$i], "<A HREF=\"".$url_array[0][$i]."\"target=\"_blank\">".$url_array[0][$i]."</A>", $tmp_url );
			$url_done[$url_array[0][$i]] = "done";
		}
	}
	preg_match_all("/[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)/si", $tmp_url, $email_array);
	for($i = 0; $i < count($email_array[0]); $i++)
	{
		$tmp_url = ereg_replace( $email_array[0][$i], "<A HREF=\"mailto:".$email_array[0][$i]."\">".$email_array[0][$i]."</A>", $tmp_url );
		return $tmp_url;
	}
}

/* ----------------------------------------------------- */

function aff_mail($servr, $user, $passwd, $mail, $verbose)
{
	require ("conf.php");
	require ("check_lang.php");
	GLOBAL $attach_tab;
	GLOBAL $body;
	GLOBAL $PHP_SELF;

	$current_date = date("D, d M");
	$pop = @imap_open("{".$servr."}INBOX", $user, $passwd);
	$num_messages = @imap_num_msg($pop);
	$ref_contenu_message = @imap_header($pop, $mail);
	//$struct_msg = @imap_fetchstructure($pop, @imap_msgno($pop, $mail));
	$struct_msg = @imap_fetchstructure($pop, $mail);

	if (sizeof($struct_msg->parts) > 0)
	{
//		for ($i = 0; $i < sizeof($struct_msg->parts); $i++)
//		{
			$body = "";
			GetPart($struct_msg, 0);
//		}
	}
	else
		//$body = @imap_fetchbody($pop, $mail, 1);
		$body = @imap_body($pop, $mail);

	if ($verbose == 1 && $use_verbose == 1)
	{
		$headers = imap_fetchheader($pop, $mail);
		//$body = $headers."\n".$body;
	}
	else
		$headers = "";
	//imap_close($pop);
	if ($body != "")
	{
		$body = htmlspecialchars($body);
		$body = eregi_replace("(http|https|ftp)://([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+]*)","<A HREF=\"open.php?\\1://\\2\" TARGET=_blank>\\1://\\2</a>", $body);
		$body = "<PRE>".$body."</PRE>";
		//$body = add_url_and_email($body);
	}
	else
	{
		$tmp = array_shift($attach_tab);
		/*for ($i = 0; $i < sizeof($attach_tab); $i++)
		{*/
			//echo $attach_tab[$i]["mime"];
			if (eregi("text/HTML", $tmp["mime"]))
			{	
				if (eregi("QUOTED-PRINTABLE", $tmp["transfer"]))
					$body = imap_qprint(imap_fetchbody($pop, $mail, $tmp["number"]));
				else
					$body = imap_fetchbody($pop, $mail, $tmp["number"]);
				$body = remove_stuff($body);			
			}
		//}
	}
	imap_close($pop);
	if (sizeof($attach_tab) > 0)
		$link_att = "<tr><td align=right><font face=".$html_font." size=".$html_size.">".$html_att."</font></td><td colspan=5 bgcolor=".$html_mail_tr_color."><font face=".$html_font." size=".$html_size.">".link_att($servr, $mail, $attach_tab)."</font></td></tr>";
	else
		$link_att = "";

	if ($verbose == 1 && $use_verbose == true)
		echo "<TR><TD><a href=\"$PHP_SELF?action=aff_mail&mail=$mail&verbose=0\">Remove headers</A></TD>";
	elseif ($use_verbose == true)
		echo "<TR><TD><a href=\"$PHP_SELF?action=aff_mail&mail=$mail&verbose=1\">View headers</A></TD>";
	else
		echo "<TR><TD>&nbsp;</TD>";

	if (($mail == 1) && ($num_messages > 1))
	{
		echo "<TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD ALIGN=RIGHT colspan=2><a href=\"$PHP_SELF?action=aff_mail&mail=2&verbose=0\"><img src=\"img/next.gif\" border=\"0\"></A></TD></TR>";
	}
	elseif (($mail == $num_messages) && ($mail > 1))
	{
		$mailp = $mail - 1;
		echo "<TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD ALIGN=RIGHT colspan=2><a href=\"$PHP_SELF?action=aff_mail&mail=$mailp&verbose=0\"><img src=\"img/previous.gif\" border=\"0\"></A></TD></TR>";
	}
	elseif (($mail < $num_messages) && ($mail >= 1))
	{
		$mailp = $mail - 1;
		$mailn = $mail + 1;
		echo "<TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD ALIGN=RIGHT colspan=2><a href=\"$PHP_SELF?action=aff_mail&mail=$mailp&verbose=0\"><img src=\"img/previous.gif\" border=\"0\"></A>&nbsp;<a href=\"$PHP_SELF?action=aff_mail&mail=$mailn&verbose=0\"><img src=\"img/next.gif\" border=\"0\"></A></TD></TR>";
	}
	$content = Array(
				"from" => htmlspecialchars($ref_contenu_message->fromaddress),
				"to" => htmlspecialchars($ref_contenu_message->toaddress),
				"cc" => htmlspecialchars($ref_contenu_message->ccaddress),
				"subject" => htmlspecialchars($ref_contenu_message->subject),
				"date" => chop($ref_contenu_message->date),
				"att" => $link_att,
				"body" => $body);
	return ($content);
}

/* ----------------------------------------------------- */

function GetPart($this_part, $part_no)
{
	GLOBAL $attach_tab;
	$att_name = "unknown";
    for ($lcv = 0; $lcv < count($this_part->parameters); $lcv++)
	{
		$param = $this_part->parameters[$lcv];
        if ($param->attribute == "NAME")
		{
			$att_name = $param->value;
            break;
	    }
	}
	switch ($this_part->type)
	{
		case TYPETEXT:
			$mime_type = "text";
			break;
		case TYPEMULTIPART:
			$mime_type = "multipart";
			for ($i = 0; $i < count($this_part->parts); $i++)
			{
				if ($part_no != "")
					$part_no = $part_no.".";
				for ($i = 0; $i < count($this_part->parts); $i++)
				{
					if ($this_part->subtype == ALTERNATIVE)
						GetPart($this_part->parts[++$i], $part_no.($i + 1));
					else
						GetPart($this_part->parts[$i], $part_no.($i + 1));
				}
			}
			break;
		case TYPEMESSAGE:
			$mime_type = "message";
			break;
		case TYPEAPPLICATION:
			$mime_type = "application";
			break;
		case TYPEAUDIO:
			$mime_type = "audio";
			break;
		case TYPEIMAGE:
			$mime_type = "image";
			break;
		case TYPEVIDEO:
			$mime_type = "video";
			break;
		case TYPEMODEL:
			$mime_type = "model";
			break;
		default:
			$mime_type = "unknown";
	}
	$full_mime_type = $mime_type."/".$this_part->subtype;

	switch ($this_part->encoding)
	{
		case ENC7BIT:
			$encoding = "7BIT";
			break;
		case ENC8BIT:
			$encoding = "8BIT";
			break;
		case ENCBINARY:
			$encoding = "BINARY";
			break;
		case ENCBASE64:
			$encoding = "BASE64";
			break;
		case ENCQUOTEDPRINTABLE:
			$encoding = "QUOTED-PRINTABLE";
			break;
		default:
			$encoding = "none";
			break;
	}

	if ($mime_type != "multipart")
	{
		$tmp = Array(
				"number" => $part_no,
				"name" => $att_name,
				"mime" => $full_mime_type,
				"transfer" => $encoding);
		
		array_push($attach_tab, $tmp);
	}
}

/* ----------------------------------------------------- */

function remove_stuff($body)
{
	$body = strip_tags($body, "<b>,<i>,<a>,<font>,<table>,<tr>,<td>,<ul>,<li><img>");
	$body = eregi_replace("<SCRIPT", "<!-- <SCRIPT", $body);
	$body = eregi_replace("SCRIPT>", "SCRIPT> !>", $body);
	//	$body = eregi_replace("<BODY BGCOLOR=[:alnum:]", "", $body);
	//$body = eregi_replace("</BODY>", "</TABLE>", $body);
	return ($body);
}
//$body = eregi_replace("(http|https|ftp)://([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+]*)","<A HREF=\"\\1://\\2\" TARGET=_blank>\\1://\\2</a>", $body);

/* ----------------------------------------------------- */

function link_att($servr, $mail, $tab)
{
	$link = "";
	while ($tmp = array_shift($tab))
		$link .= "<a href=download.php?mail=".$mail."&part=".$tmp["number"]."&transfer=".$tmp["transfer"]."&filename=".urlencode($tmp["name"]).">".$tmp["name"]."</a> ";
	return ($link);
}
/* ----------------------------------------------------- */
?>