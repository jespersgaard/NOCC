<?
/*
	$Author: nicocha $
	$Revision: 1.13 $
	$Date: 2000/11/06 18:41:27 $

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/


/*
This file is the main file of NOCC each function starts from here
*/

require ("conf.php");
require ("check_lang.php");
require ("html/header.php");
require ("functions.php");

if (setlocale ("LC_TIME", $lang_locale) != $lang_locale)
	$default_date_format = $no_locale_date_format;
$current_date = strftime($default_date_format, time());

switch ($action)
{
	case "aff_mail":
		// Here we display the message
		require ("html/menu_mail.php");
		require ("html/html_mail_top.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, true, $lang);
		require ("html/html_mail_header.php"); 
		if (!eregi("html", $content["body_mime"]))
			while ($tmp = array_shift($attach_tab))
			{
				// $attach_tab is the array of attachments
				if (eregi ("image", $tmp["mime"]))
				{
					// if it's an image, we display it
					$img_type = array_pop(explode("/", $tmp["mime"]));
					if (eregi ("JPEG", $img_type) || eregi("JPG", $img_type) || eregi("GIF", $img_type) || eregi ("PNG", $img_type))
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
		require ("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "reply":
		require ("html/menu_inbox.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, false, $lang);
		$mail_to = $content["from"];
		$mail_subject = $html_reply_short.": ".$content["subject"];
		$mail_body = $original_msg."\n".$html_from.": ".$content["from"]."\n".$html_to.": ".$content["to"]."\n".$html_sent.": ".$content["date"]."\n".$html_subject.": ".$content["subject"]."\n\n".strip_tags($content["body"], "");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "reply_all":
		require ("html/menu_inbox.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, false, $lang);
		$mail_to = get_reply_all($user, $domain, $content["from"], $content["to"], $content["cc"]);
		$mail_subject = $html_reply_short.": ".$content["subject"];
		$mail_body = $original_msg."\n".$html_from.": ".$content["from"]."\n".$html_to.": ".$content["to"]."\n".$html_sent.": ".$content["date"]."\n".$html_subject.": ".$content["subject"]."\n\n".strip_tags($content["body"], "");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "forward":
		require ("html/menu_inbox.php");
		$content = aff_mail($servr, $user, $passwd, $mail, $verbose, false, $lang);
		$mail_subject = $html_forward_short.": ".$content["subject"];
		$mail_body = $original_msg."\n".$html_from.": ".$content["from"]."\n".$html_to.": ".$content["to"]."\n".$html_sent.": ".$content["date"]."\n".$html_subject.": ".$content["subject"]."\n\n".strip_tags($content["body"], "");
		require("html/send.php");
		require ("html/menu_inbox.php");
		break;
	default:
		// Default we display the mailbox
		$tab_mail = inbox($servr, $user, $passwd, $sort, $sortdir, $lang);
		switch ($tab_mail)
		{
			case -1:
				// -1 either the login and/or the password are wrong or the server is down
				require ("wrong.php");
				break;
			case 0:
				// the mailbox is empty
				require ("html/menu_inbox.php");
				require ("html/html_top_table.php");
				include ("no_mail.php");
				require ("html/html_bottom_table.php");
				break;
			default:
				// there are messages, we display
				$num_msg = sizeof($tab_mail);
				require ("html/menu_inbox.php");
				require ("html/html_top_table.php");
				while ($tmp = array_shift($tab_mail))
					require ("html/html_inbox.php");
				require ("html/html_bottom_table.php");
				break;
		}
		break;
}

require ("html/footer.php");
?>
