<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/help.php,v 1.15 2005/08/01 08:11:14 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './config/conf.php';
require_once './common.php';
$lang = $_SESSION['nocc_lang'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang ?>" lang="<?php echo $lang ?>">
<head>
<title>NOCC - <?php echo $html_help ?></title>
<meta content="text/html; charset=<?php echo $charset ?>" http-equiv="Content-Type" />
<link href="themes/<?php echo $_SESSION['nocc_theme'] ?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body dir="<?php echo $lang_dir; ?>">

</body>
</html>
