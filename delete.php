<? 
/*
NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>  

  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/

// this file just delete the selected message(s)

session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);
$num_messages = imap_num_msg($pop);

if ($only_one == 1)
	imap_delete($pop, $mail, 0);
else
{
	for ($i = 0; $i <= $num_messages; $i++)
	{
		if (!empty ($$i))
			imap_delete($pop, $$i, 0);
	}
}
imap_close($pop, CL_EXPUNGE);

Header ("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang");
?>