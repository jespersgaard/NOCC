<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/action.php,v 1.53 2001/10/18 21:24:41 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * This file is the main file of NOCC each function starts from here
 */

require ('conf.php');
require ('check_lang.php');
require ('functions.php');
require ('prefs.php');
checkForPrefs($prefs_dir, $user);

if (!session_is_registered('loggedin'))
	$action = '';
header ("Content-type: text/html; Charset=$charset");
require ('html/header.php');

if (setlocale (LC_TIME, $lang_locale) != $lang_locale)
	$default_date_format = $no_locale_date_format;
$current_date = strftime($default_date_format, time());

// Get preferences
$prefs_full_name = getPref($prefs_dir, $user, 'full_name');
$prefs_email_address = getPref($prefs_dir, $user, 'email_address');
$prefs_signature = getSig($prefs_dir, $user);

// Default e-mail address on send form
$mail_from = $prefs_email_address;
if($prefs_email_address == "") {
	$mail_from = $user."@".$domain;
}
if($prefs_full_name != "") {
	$mail_from = $prefs_full_name." <".$mail_from.">";
}

switch (trim($action))
{
	case 'aff_mail':
		// Here we display the message
		require ('html/menu_mail.php');
		require ('html/html_mail_top.php');
		$content = aff_mail($servr, $user, stripslashes($passwd), $folder, $mail, $verbose, $lang, $sort, $sortdir);
		require ('html/html_mail_header.php'); 
		while ($tmp = array_shift($attach_tab))
		{
			// $attach_tab is the array of attachments
			// If it's a text/plain, display it
			if ((!eregi('ATTACHMENT', $tmp['disposition'])) && $display_text_attach && (eregi('text/plain', $tmp['mime'])))
				echo '<hr />'.view_part($servr, $user, stripslashes($passwd), $folder, $mail, $tmp['number'], $tmp['transfer'], $tmp['charset'], $charset);
			if ($display_img_attach && (eregi('image', $tmp['mime']) && ($tmp['id'] == '')))
			{
				// if it's an image, display it
				$img_type = array_pop(explode('/', $tmp['mime']));
				if (eregi('JPEG', $img_type) || eregi('JPG', $img_type) || eregi('GIF', $img_type) || eregi ('PNG', $img_type))
				{
					echo '<hr />';
					echo '<center><img src="get_img.php?'.$php_session.'='.$$php_session.'&amp;mail='.$mail.'&amp;folder='.$folder.'&amp;num='.$tmp['number'].'&amp;mime='.$img_type.'&amp;transfer='.$tmp['transfer'].'" /></center>';
				}
			}
		} 
		require ('html/html_mail_bottom.php');
		require ('html/menu_mail.php');
		break;

	case 'logout':
		header("Location: logout.php?lang=$lang&$php_session=".$$php_session);
		break;

	case 'write':

		// Add signature
		$mail_body .= "\n".$prefs_signature;

		$num_attach = 0;
		require ('html/menu_inbox.php');
		require ('html/send.php');
		require ('html/menu_inbox.php');
		break;

	case 'reply':
		$content = aff_mail($servr, $user, stripslashes($passwd), $folder, $mail, 0, $lang, $sort, $sortdir);
		$mail_to = !empty($content['reply_to']) ? $content['reply_to'] : $content['from'];
		// Test for Re: in subject, should not be added twice ! 
		if (!strcasecmp(substr($content['subject'], 0, 2), $html_reply_short))
			$mail_subject = $content['subject'];
		else
			$mail_subject = $html_reply_short.': '.$content['subject'];
		$mail_body = $original_msg."\n".$html_from.': '.$content['from']."\n".$html_to.': '.$content['to']."\n".$html_sent.': '.$content['complete_date']."\n".$html_subject.': '.$content['subject']."\n\n".strip_tags($content['body'], '');

		// Add signature
		$mail_body .= "\n".$prefs_signature;

		// We add the attachments of the original message
		list($num_attach, $attach_array) = save_attachment($servr, $user, stripslashes($passwd), $folder, $mail, $tmpdir);
		// Registering the attachments array into the session
		session_register('num_attach', 'attach_array');
		require ('html/menu_inbox.php');
		require ('html/send.php');
		require ('html/menu_inbox.php');
		break;

	case 'reply_all':
		$content = aff_mail($servr, $user, stripslashes($passwd), $folder, $mail, 0, $lang, $sort, $sortdir);
		$mail_to = get_reply_all($user, $domain, $content['from'], $content['to'], $content['cc']);
		if (!strcasecmp(substr($content['subject'], 0, 2), $html_reply_short))
			$mail_subject = $content['subject'];
		else
			$mail_subject = $html_reply_short.': '.$content['subject'];
		$mail_body = $original_msg."\n".$html_from.': '.$content['from']."\n".$html_to.': '.$content['to']."\n".$html_sent.': '.$content['complete_date']."\n".$html_subject.': '.$content['subject']."\n\n".strip_tags($content['body'], '');

		// Add signature
		$mail_body .= "\n".$prefs_signature;

		// We add the attachments of the original message
		list($num_attach, $attach_array) = save_attachment($servr, $user, stripslashes($passwd), $folder, $mail, $tmpdir);
		// Registering the attachments array into the session
		session_register('num_attach', 'attach_array');
		require ('html/menu_inbox.php');
		require ('html/send.php');
		require ('html/menu_inbox.php');
		break;

	case 'forward':
		$content = aff_mail($servr, $user, stripslashes($passwd), $folder, $mail, 0, $lang, $sort, $sortdir);
		$mail_subject = $html_forward_short.': '.$content['subject'];
		$mail_body = $original_msg."\n".$html_from.': '.$content['from']."\n".$html_to.': '.$content['to']."\n".$html_sent.': '.$content['complete_date']."\n".$html_subject.': '.$content['subject']."\n\n".strip_tags($content['body'], '');
		// Add signature
		$mail_body .= "\n".$prefs_signature;

		// We add the attachments of the original message
		list($num_attach, $attach_array) = save_attachment($servr, $user, stripslashes($passwd), $folder, $mail, $tmpdir);
		// Registering the attachments array into the session
		session_register('num_attach', 'attach_array');
		require ('html/menu_inbox.php');
		require ('html/send.php');
		require ('html/menu_inbox.php');
		break;

	case 'setprefs':
		if(isset($submit_prefs)) {
			if (isset($full_name)) {
				setPref($prefs_dir, $user, 'full_name', $full_name);
			}
			if (isset($email_address)) {
				setPref($prefs_dir, $user, 'email_address', $email_address);
			}
			if ($signature != "" ) {
				setSig($prefs_dir, $user, $signature);
			}
		} else {
			$full_name = $prefs_full_name;
			$email_address = $prefs_email_address;
			$signature = $prefs_signature;
		}
		require ('html/menu_prefs.php');
		require ('html/prefs.php');
		require ('html/menu_prefs.php');
		break;

	default:
		// Default we display the mailbox
		$tab_mail = inbox($servr, $user, stripslashes($passwd), $folder, $sort, $sortdir, $lang, $theme);
		switch ($tab_mail)
		{
			case -1:
				// -1 either the login and/or the password are wrong or the server is down
				require ('wrong.php');
				break;
			case 0:
				$loggedin = 1;
				session_register('loggedin');
				// the mailbox is empty
				$num_msg = 0;
				require ('html/menu_inbox.php');
				require ('html/html_top_table.php');
				include ('html/no_mail.php');
				require ('html/html_bottom_table.php');
				break;
			default:
				if (!isset($attach_array))
					$attach_array = null;
				go_back_index($attach_array, $tmpdir, $php_session, $sort, $sortdir, $lang, false);
				$loggedin = 1;
				session_register('loggedin');
				// there are messages, we display
				$num_msg = count($tab_mail);
				require ('html/menu_inbox.php');
				require ('html/html_top_table.php');
				while ($tmp = array_shift($tab_mail))
					require ('html/html_inbox.php');
				require ('html/html_bottom_table.php');
				break;
		}
		break;
}

require ('html/footer.php');
?>