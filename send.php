<?
/*
NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>  
the function get_part is based on a function from matt@bonneau.net

  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/

require ("conf.php");
require ("class_send.php");
//require ("class_smtp.php");
require ("functions.php");
require ("check_lang.php");

$ip = getenv("REMOTE_ADDR");

$mail = new mime_mail();
$mail->smtp_server = $smtp_server;
$mail->smtp_port = $smtp_port;
$mail->from = $from;
$mail->headers = "X-Originating-Ip: [".$ip."]\nX-Mailer: ".$name." ".$version;
$mail->to = cut_address($to);
$mail->cc = cut_address($cc);
$mail->bcc = cut_address($bcc);
if ($subject != "")
	$mail->subject = stripcslashes($subject);
if ($body != "")
	$mail->body = stripcslashes($body)."\n\n".$ad;
else
	$mail->body = $ad;

if (file_exists($mail_att))
{
	$file = fread(fopen($mail_att, "r"), filesize($mail_att));
	$mail->add_attachment($file, get_filename($att_name), $mail_att_type, "base64");
}
if ($mail->send() !=0)
	$error = true; // There has been an error while sending the message
Header ("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang");

function get_filename($filename)
{
	$tab = explode("\\", $filename);
	return (array_pop($tab));
}
?>