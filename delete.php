<? 
session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);
$num_messages = imap_num_msg($pop);

if ($only_one == 1)
{
	imap_delete($pop, $mail, 0);
}
else
{
	for ($i = 0; $i <= $num_messages; $i++)
	{
		if (!empty ($$i))
			imap_delete($pop, $$i, 0);
	}
}
imap_expunge($pop);
imap_close($pop, CL_EXPUNGE);
if ($is_standalone == 1)
	Header ("Location: action.php");
else
	Header ("Location: index.php");
?>