<?
/*
NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>  

  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/

session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);
$img = imap_fetchbody($pop, $mail, $num);
imap_close($pop);
if ($transfer == "BASE64")
	$img = base64_decode($img);
elseif ($transfer == "QUOTED-PRINTABLE")
	$img = imap_qprint($img);

header("Content-type: image/".$mime);
echo $img;
?>