<?
require ("conf.php");
require ("check_lang.php");
if ($is_standalone == true)
{
	session_register("user");
	session_register("passwd");
	require ("html/standalone_top.php");
}

require ("functions.php");
$current_date = $days[date("D")].", ".date("d")." ".$months[date("M")]; 

switch ($action)
{
	case "aff_mail":
		require ("html/menu_mail.php");
		require ("html/html_mail_top.php"); 
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, true);
		require ("html/html_mail_header.php"); 
		while ($tmp = array_shift($attach_tab))
		{
			if (eregi ("image", $tmp["mime"]))
			{
				$img_type = array_pop(explode("/", $tmp["mime"]));
				if (eregi ("JPEG", $img_type) || eregi("JPG", $img_type) || eregi("GIF", $img_type))
				{
					echo "<hr>";
					echo "<center><img src=\"get_img.php?mail=".$mail."&num=".$tmp["number"]."&mime=".$img_type."&transfer=".$tmp["transfer"]."\"></center>";
				}
			}
		} 
		require ("html/html_mail_bottom.php");
		require ("html/menu_mail.php");
		break;
	case "logout":
		Header("Location: logout.php");
		break;
	case "write":
		require ("html/menu_inbox.php");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "reply":
		require ("html/menu_inbox.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, false);
		$mail_to = $content["from"];
		$mail_subject = $html_reply_short.": ".$content["subject"];
		$mail_body = $original_msg."\n".$html_from.": ".$content["from"]."\n".$html_to.": ".$content["to"]."\n".$html_sent.": ".$content["date"]."\n".$html_subject.": ".$content["subject"]."\n\n".strip_tags($content["body"], "");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "reply_all":
		require ("html/menu_inbox.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, false);
		$mail_to = get_reply_all($user, $provider, $content["from"], $content["to"], $content["cc"]);
		$mail_subject = $html_reply_short.": ".$content["subject"];
		$mail_body = $original_msg."\n".$html_from.": ".$content["from"]."\n".$html_to.": ".$content["to"]."\n".$html_sent.": ".$content["date"]."\n".$html_subject.": ".$content["subject"]."\n\n".strip_tags($content["body"], "");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "forward":
		require ("html/menu_inbox.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, false);
		$mail_subject = $html_forward_short.": ".$content["subject"];
		$mail_body = $original_msg."\n".$html_from.": ".$content["from"]."\n".$html_to.": ".$content["to"]."\n".$html_sent.": ".$content["date"]."\n".$html_subject.": ".$content["subject"]."\n\n".strip_tags($content["body"], "");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	default:
		$tab_mail = inbox($servr, $user, $passwd, $sort, $sortdir);
		switch ($tab_mail)
		{
			case -1:
				echo "wrong password or username";
				break;
			case 0:
				require ("html/menu_inbox.php");
				require ("html/html_top_table.php");
				include ("no_mail.php");
				require ("html/html_bottom_table.php");
				break;
			default:
				$num_msg = sizeof($tab_mail);
				require ("html/menu_inbox.php");
				echo $tab_mail[0]["sort"];
				require ("html/html_top_table.php");
				while ($tmp = array_shift($tab_mail))
				{
					require ("html/html_inbox.php");
				}
				require ("html/html_bottom_table.php");
				break;
		}
		break;
}

if ($is_standalone == true)
	require ("html/standalone_bottom.php");
?>