<?
/*
	$Author: nicocha $
	$Revision: 1.25 $
	$Date: 2000/11/06 18:43:12 $

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
the function get_part is based on a function from matt@bonneau.net
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/


$attach_tab = Array();
$glob_body = "";

/* ----------------------------------------------------- */

function inbox($servr, $user, $passwd, $sort, $sortdir, $lang)
{
	$mailhost = $servr;
	require("conf.php");
	$pop = imap_open("{".$mailhost."}INBOX", $user, $passwd);
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
			$sorted = imap_sort($pop, $sort, $sortdir, SE_UID); 
			for ($i = 0; $i < $num_messages; $i++)
			{
				$msgnum = $sorted[$i];
				$ref_contenu_message = imap_header($pop, imap_msgno($pop, $msgnum));
				$struct_msg = imap_fetchstructure($pop, imap_msgno($pop, $msgnum));
				$subject = imap_mime_header_decode($ref_contenu_message->subject);
				$from = imap_mime_header_decode($ref_contenu_message->fromaddress);
				if (ereg("IMAP", $mailhost))
					$msg_size = get_mail_size($struct_msg);
				else
					$msg_size = ($struct_msg->bytes > 1024) ? round($struct_msg->bytes / 1024) : 1;
				if ($struct_msg->type == 1)
				{
					if ($struct_msg->subtype == "ALTERNATIVE")
						$attach = "&nbsp;";
					else
						$attach = "<img src=\"img/attach.png\" alt=\"A\" height\"28\" width=\"27\">";
				}
				else
					$attach = "&nbsp;";
				// Check Status Line with UCB POP Server to
				// see if this is a new message. This is a
				// non-RFC standard line header.
				// Set this in conf.php
				if ($have_ucb_pop_server)
                {
					$header_msg = imap_fetchheader($pop, imap_msgno($pop, $msgnum));
					$header_lines = explode("\r\n", $header_msg);
					while (list($k, $v) = each($header_lines))
					{
						list ($header_field, $header_value) = explode(":", $v);
						if ($header_field == "Status") 
							$new_mail_from_header = $header_value;
					}
				}
				else
				{
					if (($ref_contenu_message->Unseen == 'U') || ($ref_contenu_message->Recent == 'N'))
						$new_mail_from_header = "";
					else
						$new_mail_from_header = "&nbsp;";
				}
				if ($new_mail_from_header == "")
					$newmail = "<img src=\"img/new.png\" alr=\"N\" height=\"17\" width=\"17\">";
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
						"date" => change_date(chop($ref_contenu_message->date), $lang),
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

function aff_mail($servr, $user, $passwd, $mail, $verbose, $read, $lang)
{
	$mailhost = $servr;
	require ("conf.php");
	require ("check_lang.php");
	GLOBAL $attach_tab;
	GLOBAL $glob_body;
	GLOBAL $PHP_SELF;

	$current_date = date("D, d M");
	$pop = @imap_open("{".$mailhost."}INBOX", $user, $passwd);
	$num_messages = @imap_num_msg($pop);
	$ref_contenu_message = @imap_header($pop, $mail);
	$struct_msg = @imap_fetchstructure($pop, $mail);

	if (sizeof($struct_msg->parts) > 0)
	{
			$glob_body = "";
			GetPart($struct_msg, "", $read, $display_rfc822);
	}
	else
		$glob_body = @imap_body($pop, $mail);
	if ($verbose == 1 && $use_verbose == 1)
		$header = htmlspecialchars(imap_fetchheader($pop, $mail));
	else
		$header = "";
	if ($glob_body != "")
	{
		$glob_body = stripcslashes(htmlspecialchars($glob_body));
		$glob_body = remove_stuff($glob_body, $lang, "");
	}
	else
	{
		$tmp = array_pop($attach_tab);
		if (eregi("text/html", $tmp["mime"]) || eregi("text/plain", $tmp["mime"]))
		{	
			$glob_body_mime = $tmp["mime"];
			if ($tmp["transfer"] == "QUOTED-PRINTABLE")
				$glob_body = imap_qprint(imap_fetchbody($pop, $mail, $tmp["number"]));
			elseif ($tmp["transfer"] == "BASE64")
				$glob_body = base64_decode(imap_fetchbody($pop, $mail, $tmp["number"]));
			else
				$glob_body = imap_fetchbody($pop, $mail, $tmp["number"]);
			$glob_body = remove_stuff($glob_body, $lang, $tmp["mime"]);			
		}
	}
	@imap_close($pop);
	switch (sizeof($attach_tab))
	{
		case 0:
			$link_att = "";
			break;
		case 1:
			$link_att = "<tr><td align=\"right\" valign=\"top\" class=\"mail\">".$html_att."</td><td bgcolor=\"".$html_mail_properties."\" class=\"mail\">".link_att($mailhost, $mail, $attach_tab, $display_part_no)."</td></tr>";
			break;
		default:
			$link_att = "<tr><td align=\"right\" valign=\"top\" class=\"mail\">".$html_atts."</td><td bgcolor=\"".$html_mail_properties."\" class=\"mail\">".link_att($mailhost, $mail, $attach_tab, $display_part_no)."</td></tr>";
			break;
	}
	$subject = imap_mime_header_decode($ref_contenu_message->subject);
	$from = imap_mime_header_decode($ref_contenu_message->fromaddress);

	$content = Array(
				"from" => htmlspecialchars($from[0]->text),
				"to" => htmlspecialchars($ref_contenu_message->toaddress),
				"cc" => htmlspecialchars($ref_contenu_message->ccaddress),
				"subject" => htmlspecialchars($subject[0]->text),
				"date" => change_date(chop($ref_contenu_message->date), $lang),
				"att" => $link_att,
				"body" => $glob_body,
				"body_mime" => $glob_body_mime,
				"header" => $header,
				"verbose" => $verbose);
	
	return ($content);
}

/* ----------------------------------------------------- */

// based on a function from matt@bonneau.net
function GetPart($this_part, $part_no, $read, $display_rfc822)
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
					// if it's an alternative, we skip the text part to only keep the HTML part
					if ($this_part->subtype == ALTERNATIVE && $read == true)
						GetPart($this_part->parts[++$i], $part_no.($i + 1), $read, $display_rfc822);
					else 
						GetPart($this_part->parts[$i], $part_no.($i + 1), $read, $display_rfc822);
				}
			}
			break;
		case TYPEMESSAGE:
			$mime_type = "message";
			// well it's a message we have to parse it to find attachments or text message
			for ($i = 0; $i < count($this_part->parts[0]->parts); $i++)
				GetPart($this_part->parts[0]->parts[$i], $part_no.".".($i + 1), $read, $display_rfc822);
			break;
		// Maybe we can do something with the mime types later ??
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

	if (($full_mime_type == "message/RFC822" && $display_rfc822 == true) || ($mime_type != "multipart" && $full_mime_type != "message/RFC822"))
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
		//$body = strip_tags($body, "<b>,<i>,<a>,<font>,<table>,<tr>,<td>,<ul>,<li>,<img>,<div>,<p>,<pre>,<center>");
		$body = preg_replace("|<([^>]*)style|i", "<nocc_removed_style_tag", $body);
		$body = preg_replace("|<([^>]*)script|i", "<nocc_removed_script_tag", $body);
		$body = preg_replace("|href=\"(.*)script:|i", "href=\"nocc_removed_script:", $body);
		$body = preg_replace("|<([^>]*)embed|i", "<nocc_removed_embed_tag", $body);
		$body = preg_replace("|<([^>]*)java|i", "<nocc_removed_java_tag", $body);
		$body = preg_replace("|<([^>]*)object|i", "<nocc_removed_object_tag", $body);
		$body = preg_replace("|<([^>]*)&{.*}([^>]*)>|i", "<&{;}\\3>", $body);
		$body = preg_replace("|<([^>]*)mocha:([^>]*)>|i", "<nocc_removed_mocha:\\2>",$body);
		//$body = eregi_replace("<SCRIPT", "<NOCC REMOVED", $body);
		//$body = eregi_replace("SCRIPT>", "SCRIPT> !>", $body);
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

function link_att($servr, $mail, $tab, $display_part_no)
{
	sort($tab);
	$link = "<table border='0'";
	while ($tmp = array_shift($tab))
	{
		$link .= "<tr>";
		if ($display_part_no == true)
			$link .= "<td class='inbox'>".$tmp["number"]."</td>";
		$link .="<td class='inbox'><a href=download.php?mail=".$mail."&part=".$tmp["number"]."&transfer=".$tmp["transfer"]."&filename=".urlencode($tmp["name"]).">".$tmp["name"]."</a></td><td class='inbox'>".$tmp["mime"]."</td><td class='inbox'>".$tmp["size"]." kb</td><tr>";
	}
	$link .= "</table>";
	return ($link);
}

/* ----------------------------------------------------- */

function change_date($date, $lang)
{
	require ("check_lang.php");
	$date = eregi_replace("  ", " ", $date);
	$tab = explode(" ", $date);
	$tab[0] = eregi_replace(",", "", $tab[0]);
	//$tab[1] = eregi_replace(" ", "", $tab[1]);
	return ($days[$tab[0]].", ".$tab[1]." ".$months[$tab[2]]." ".$tab[3]);
}


/* ----------------------------------------------------- */

// We have to figure out the entire mail size
function get_mail_size($this_part)
{
	$size = 0;
	for ($i = 0; $i < count($this_part->parts); $i++)
		$size += $this_part->parts[$i]->bytes;
	$size = ($size > 1024) ? round($size / 1024) : 1;
	return ($size);
}

/* ----------------------------------------------------- */

// this function build an array with all the recipients of the message for later reply or reply all 
function get_reply_all($user, $domain, $from, $to, $cc)
{
	if (!eregi($user."@".$domain, $from))
		$rcpt = $from.", ";
	$tab = explode(",", $to);
	while ($tmp = array_shift($tab))
		if (!eregi($user."@".$domain, $tmp))
			$rcpt .= $tmp.", ";
	$tab = explode(",", $cc);
	while ($tmp = array_shift($tab))
		if (!eregi($user."@".$domain, $tmp))
			$rcpt .= $tmp.", ";
	return (substr($rcpt, 0, strlen($rcpt) - 2));
}

/* ----------------------------------------------------- */

// We need that to build a correct list of all the recipient when we send a message
function cut_address($addr)
{
	$addr = ereg_replace(",", " ", $addr);
	$addr = ereg_replace(";", " ", $addr);
	return (explode(" ", $addr));
}

/* ----------------------------------------------------- */
?>
