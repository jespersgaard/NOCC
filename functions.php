<?
$attach_tab = Array();
$body = "";

/* ----------------------------------------------------- */

function inbox($servr, $user, $passwd, $sort, $sortdir)
{
	$pop = @imap_open("{".$servr."}INBOX", $user, $passwd);
	//echo imap_num_recent($pop);
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
				$sort = "0";
				$sortdir = "1";
				$sorted = imap_sort($pop, $sort, $sortdir, SE_UID); 
			}
			else
				$sorted = imap_sort($pop, $sort, $sortdir, SE_UID); 
			for ($i = 0; $i < $num_messages; $i++)
			{
				$msgnum = $sorted[$i];
				$ref_contenu_message = imap_header($pop, imap_msgno($pop, $msgnum));
				$struct_msg = imap_fetchstructure($pop, imap_msgno($pop, $msgnum));
				$subject = imap_mime_header_decode($ref_contenu_message->subject);
				$from = imap_mime_header_decode($ref_contenu_message->fromaddress);
				if (ereg("IMAP", $servr))
					$msg_size = get_mail_size($struct_msg);
				else
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
						"next" => imap_msgno($pop, $sorted[$i+1]),
						"prev" => imap_msgno($pop, $sorted[$i-1]),
						"attach" => $attach, 
						"from" => htmlspecialchars($from[0]->text), 
						"subject" => htmlspecialchars($subject[0]->text), 
						"date" => change_date(chop($ref_contenu_message->date)),  
						"size" => $msg_size,
						"sort" => $sort,
						"sortdir" => $sortdir);
			}
			imap_close($pop);
			return ($msg_list);
		}
	}
}

/* ----------------------------------------------------- */

function aff_mail($servr, $user, $passwd, $mail, $verbose, $read)
{
	$mailhost = $servr;
	require ("conf.php");
	require ("check_lang.php");
	GLOBAL $attach_tab;
	GLOBAL $body;
	GLOBAL $PHP_SELF;

	$current_date = date("D, d M");
	$pop = @imap_open("{".$mailhost."}INBOX", $user, $passwd);
	$num_messages = @imap_num_msg($pop);
	$ref_contenu_message = @imap_header($pop, $mail);
	$struct_msg = @imap_fetchstructure($pop, $mail);

	if (sizeof($struct_msg->parts) > 0)
	{
			$body = "";
			GetPart($struct_msg, "", $read);
	}
	else
		$body = @imap_body($pop, $mail);
	if ($verbose == 1 && $use_verbose == 1)
		$header = htmlspecialchars(imap_fetchheader($pop, $mail));
	else
		$header = "";
	if ($body != "")
	{
		$body = stripcslashes(htmlspecialchars($body));
		$body = remove_stuff($body, $lang, "");
	}
	else
	{
		$tmp = array_pop($attach_tab);
		if (eregi("text/html", $tmp["mime"]) || eregi("text/plain", $tmp["mime"]))
		{	
			if (eregi("QUOTED-PRINTABLE", $tmp["transfer"]))
				$body = imap_qprint(imap_fetchbody($pop, $mail, $tmp["number"]));
			else
				$body = imap_fetchbody($pop, $mail, $tmp["number"]);
			$body = remove_stuff($body, $lang, $tmp["mime"]);			
		}
	}
	@imap_close($pop);
	switch (sizeof($attach_tab))
	{
		case 0:
			$link_att = "";
			break;
		case 1:
			$link_att = "<tr><td align=\"right\" valign=\"top\" class=\"mail\">".$html_att."</td><td bgcolor=\"".$html_mail_tr_color."\" class=\"mail\">".link_att($mailhost, $mail, $attach_tab)."</td></tr>";
			break;
		default:
			$link_att = "<tr><td align=\"right\" valign=\"top\" class=\"mail\">".$html_atts."</td><td bgcolor=\"".$html_mail_tr_color."\" class=\"mail\">".link_att($mailhost, $mail, $attach_tab)."</td></tr>";
			break;
	}
	$subject = imap_mime_header_decode($ref_contenu_message->subject);
	$from = imap_mime_header_decode($ref_contenu_message->fromaddress);

	$content = Array(
				"from" => htmlspecialchars($from[0]->text),
				"to" => htmlspecialchars($ref_contenu_message->toaddress),
				"cc" => htmlspecialchars($ref_contenu_message->ccaddress),
				"subject" => htmlspecialchars($subject[0]->text),
				"date" => change_date(chop($ref_contenu_message->date)),
				"att" => $link_att,
				"body" => $body,
				"header" => $header,
				"verbose" => $verbose);

	return ($content);
}

/* ----------------------------------------------------- */

function GetPart($this_part, $part_no, $read)
{
	GLOBAL $attach_tab;
	$att_name = "[unknown]";
	if ($this_part->ifdescription == TRUE)
		$att_name = $this_part->description;
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
					if ($this_part->subtype == ALTERNATIVE && $read == true)
						GetPart($this_part->parts[++$i], $part_no.($i + 1), $read);
					else 
						GetPart($this_part->parts[$i], $part_no.($i + 1), $read);
				}
			}
			break;
		case TYPEMESSAGE:
			$mime_type = "message";
			//GetPart($this_part->parts[0], $part_no, $read);
			//for ($i = 0; $i < count($this_part->parts[0]->parts); $i++)
			//{
				//if (count($this_part->parts[0]->parts) > 0)
				//$part_no = $part_no.".";
				for ($i = 0; $i < count($this_part->parts[0]->parts); $i++)
				{	
					GetPart($this_part->parts[0]->parts[$i], $part_no.".".($i + 1), $read);
				}
			//}
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
				"transfer" => $encoding,
				"size" => ($this_part->bytes > 1024) ? round($this_part->bytes / 1024) : 1);
		
		array_unshift($attach_tab, $tmp);
	}
}

/* ----------------------------------------------------- */

function remove_stuff($body, $lang, $mime)
{
	if (eregi("html", $mime))
	{
		$body = strip_tags($body, "<b>,<i>,<a>,<font>,<table>,<tr>,<td>,<ul>,<li>,<img>,<div>,<p>,<center>");
		$body = eregi_replace("<SCRIPT", "<!-- <SCRIPT", $body);
		$body = eregi_replace("SCRIPT>", "SCRIPT> !>", $body);
		$body = eregi_replace("href=\"mailto:([[:alnum:]/\n+-=%&:_.~?@]+[#[:alnum:]+]*)\"","<A HREF=\"$PHP_SELF?action=write&mail_to=\\1&lang=$lang\"", $body);
		$body = eregi_replace("target=\"([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+]*)\"", "", $body);
		$body = eregi_replace("href=\"([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+]*)\"","<A HREF=\"open.php?f=\\1&lang=$lang\" TARGET=_blank", $body);
	}
	else
	{
		$body = eregi_replace("(http|https|ftp)://([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+]*)","<A HREF=\"open.php?f=\\1://\\2&lang=$lang\" TARGET=_blank>\\1://\\2</a>", $body);
		$body = "<PRE>".$body."</PRE>";
	}	
	return ($body);
}

/* ----------------------------------------------------- */

function link_att($servr, $mail, $tab)
{
	sort($tab);
	$link = "<table border='0'";
	while ($tmp = array_shift($tab))
		$link .= "<tr><td><span class='inbox'>".$tmp["number"]."</span></td><td><span class='inbox'><a href=download.php?mail=".$mail."&part=".$tmp["number"]."&transfer=".$tmp["transfer"]."&filename=".urlencode($tmp["name"]).">".$tmp["name"]."</a></span></td><td><span class='inbox'>".$tmp["mime"]."</span></td><td><span class='inbox'>".$tmp["size"]." kb</span></td><tr>";
	$link .= "</table>";
	return ($link);
}

/* ----------------------------------------------------- */

function change_date($date)
{
	GLOBAL $days;
	GLOBAL $months;

	$tab = split(" ", $date);
	$tab[0] = eregi_replace(",", "", $tab[0]);
	return ($days[$tab[0]].", ".$tab[1]." ".$months[$tab[2]]." ".$tab[3]);
}


/* ----------------------------------------------------- */

function get_mail_size($this_part)
{
	$size = 0;
	for ($i = 0; $i < count($this_part->parts); $i++)
		$size += $this_part->parts[$i]->bytes;
	$size = ($size > 1024) ? round($size / 1024) : 1;
	return ($size);
}

/* ----------------------------------------------------- */

function get_reply_all($user, $provider, $from, $to, $cc)
{
	$from = $from.",";
	$tab = explode(",", $to);
	while ($tmp = array_shift($tab))
		if (!eregi($user."@".$provider, $tmp))
			$from .= $tmp.",";
	$tab = explode(",", $cc);
	while ($tmp = array_shift($tab))
		if (!eregi($user."@".$provider, $tmp))
			$from .= $tmp.",";
	return (substr($from, 0, strlen($from) - 1));
}

/* ----------------------------------------------------- */

?>