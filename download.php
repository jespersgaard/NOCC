<?
/*
	$Author$
	$Revision$
	$Date$

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/


// File for downloading the attachments

session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);	
$file = imap_fetchbody($pop, $mail, $part);
imap_close($pop);
if ($transfer == "BASE64")
	$file = base64_decode($file);
// We use "Content-Type: unknown" to be sure the file is downloaded and not display
header("Content-Type: unknown");
header("Content-Disposition: attachment; filename=".$filename);
echo $file;
?>