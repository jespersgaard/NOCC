<?
require ("conf.php");
require ("class_send.php");

//echo $PHPSESSID;
$ip = getenv("REMOTE_ADDR");

$mail = new mime_mail();
$mail->from = $from;
$mail->headers = "X-Originating-Ip: [".$ip."]\nX-Mailer: ".$version;
$mail->to = $to;
$mail->cc = $cc;
$mail->bcc = $bcc;
$mail->subject = $subject;
$mail->body = $body."\n\n".$ad;

if (file_exists($mail_att))
{
	$file = fread(fopen($mail_att, "r"), filesize($mail_att));
	$mail->add_attachment($file, $att_name, guess_mime_type($att_name), "base64");
}
$mail->send();

if ($is_standalone == 1)
	Header ("Location: action.php");
else
	Header ("Location: index.php");

function guess_mime_type($filename)
{
	$tab = split("\.", $filename);
	$ext = $tab[1];
	if ($ext == "")
	{
		return ("application/octet-stream");
	}
	else
	{
		if ($ext == "gif") {return "image/gif";}
		elseif ($ext == "jpg") {return "image/jpg";}
		elseif ($ext == "png") {return "image/png";}
		elseif ($ext == "bmp") {return "image/x-MS-bmp";}
		elseif ($ext == "tif") {return "image/tiff";}
		elseif (($ext == "gz") || ($ext == "tgz")) {return "application/x-gzip";}
		elseif (($ext == "html") || ($ext == "htm")) {return "text/html";}
		elseif ($ext == "tar") {return "application/x-tar";}
		elseif ($ext == "txt") {return "text/plain";}
		elseif ($ext == "zip") {return "application/zip";}
		elseif ($ext == "hqx") {return "application/mac-binhex40";}
		elseif ($ext == "doc") {return "application/msword";}
		elseif ($ext == "pdf") {return "application/pdf";}
		elseif ($ext == "ps") {return "application/postcript";}
		elseif ($ext == "rtf") {return "application/rtf";}
		elseif ($ext == "dvi") {return "application/x-dvi";}
		elseif ($ext == "latex") {return "application/x-latex";}
		elseif ($ext == "swf") {return "application/x-shockwave-flash";}
		elseif ($ext == "tex") {return "application/x-tex";}
		elseif ($ext == "mid") {return "audio/midi";}
		elseif ($ext == "au") {return "audio/basic";}
		elseif ($ext == "mp3") {return "audio/mpeg";}
		elseif (($ext == "ram") || ($ext == "rm")) {return "audio/x-pn-realaudio";}
		elseif ($ext == "ra") {return "audio/x-realaudio";}
		elseif ($ext == "wav") {return "audio/x-wav";}
		elseif (($ext == "mpeg") || ($ext == "mpg")) {return "video/mpeg";}
		elseif (($ext == "wrl") || ($ext == "vrml")) {return "model/vrml";}
		elseif (($ext == "qt") || ($ext == "mov")) {return "video/quicktime";}
		elseif ($ext == "avi") {return "video/x-msvideo";}
	}	
}
?>
