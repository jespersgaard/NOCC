<?
/*
	$Author: nicocha $
	$Revision: 1.3 $
	$Date: 2000/10/23 23:56:20 $

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/

/*
 Configuration file for the english language
*/

// Configuration for the days and months
$days = Array(
	Mon => "Monday",
	Tue => "Tuesday",
	Wed => "Wednesday",
	Thu => "Thursday",
	Fri => "Friday",
	Sat => "Saturday",
	Sun => "Sunday");

$months = Array(
	Jan => "January",
	Feb => "February",
	Mar => "March",
	Apr => "April",
	May => "May",
	Jun => "June",
	Jul => "July",
	Aug => "August",
	Sep => "September",
	Oct => "October",
	Nov => "November",
	Dec => "December");

// Here is the configuration for the HTML

$err_user_empty = "The login field is empty";
$err_passwd_empty = "The password field is empty";


// html message

$alt_delete = "Delete selected messages";
$alt_delete_one = "Delete the message";
$alt_new_msg = "New messages";
$alt_reply = "Reply to the author";
$alt_reply_all = "Reply all";
$alt_forward = "Forward";
$alt_next = "Next";
$alt_prev = "Previous";


// index.php

$html_welcome = "Welcome to";
$html_login = "Login";
$html_passwd = "Password";
$html_submit = "Ok";
$html_help = "Help";
$html_server = "Server";
$html_wrong = "The login or the password are incorrect";
$html_retry = "Retry";

// Other pages

$html_view_header = "View header";
$html_remove_header = "Hide header";
$html_inbox = "Inbox";
$html_new_msg = "Write";
$html_reply = "Reply";
$html_reply_short = "Re";
$html_reply_all = "Reply all";
$html_forward = "Forward";
$html_forward_short = "Fw";
$html_delete = "Delete";
$html_new = "New";
$html_mark = "Delete";
$html_att = "Attachment";
$html_atts = "Attachments";
$html_att_unknown = "[unknown]";
$html_from = "From";
$html_subject = "Subject";
$html_date = "Date";
$html_sent = "Send";
$html_size = "Size";
$html_to = "To";
$html_cc = "Cc";
$html_bcc = "Bcc";
$html_nosubject = "No subject";
$html_send = "Send";
$hmtl_cancel = "Cancel";
$html_no_mail = "No new messages.";
$html_logout = "Logout";
$html_msg = "Message";
$html_msgs = "Messages";

$original_msg = "-- Original Message --";
$to_empty = "The 'To' field must not be empty !";

$html_outside = "You see that page outside of <b>".$name."</b>. To go back, close this window.";

// This message is added to every message, the user cannot delete it
$ad = "\n\n________________________________________________________________________\nNOCC, Your e-mails everywhere : http://nocc.sourceforge.net";
?>
