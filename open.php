<?
/*
NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>  

  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/
?>
<html>
<frameset rows="40, *" border="0" marginheight="0" marginwidth="0">
	<frame name="top" src="outside.php?lang=<? echo $lang ?>" scrolling="no">
	<frame name="site" src="<? echo $f ?>" scrolling="auto">
</frameset>
<noframes>
<? echo $noframes ?>
</noframes>
</html>