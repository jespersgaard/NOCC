<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/themes/blue/colors.php,v 1.3 2001/05/27 11:01:07 wolruf Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */


// ################### color configuration ################### //
class theme {
  var $bgcolor = "";
  var $login_border = "";
  var $login_box_bgcolor = "";
  var $menu_color = "";
  var $menu_color_on = "";
  var $mail_properties = "";
  var $inside_color = "";
  var $tr_color = "";
  var $sort_color = "";
  var $link_color = "";
  var $text_color = "";
  var $inbox_text_color = "";
  var $inbox_color = "";
  var $mail_color = "";
  var $vlink_color = "";
  var $alink_color = "";
}

$glob_theme = new theme();

// Color on the pages background - default is 'white'
$glob_theme->bgcolor = '#000080';

// Color of the login box border - default is 'black'
$glob_theme->login_border = '#FF9900';

// Inside color of the login box
$glob_theme->login_box_bgcolor = '#000080';

// Color of the navigation button (inbox, write, answer, etc.)
// default is 'sky blue'
$glob_theme->menu_color = '#99cc99';

// The same as above when the user is in that part
// default is 'orange'
$glob_theme->menu_color_on = '#FF9900';

// Mail properties color (to, from, subject, attachments, etc.)
// default is 'sky blue'
$glob_theme->mail_properties = '#002266';

// Color of all the inside border
// default is 'grey'
$glob_theme->inside_color = '#000080';

// Color of the Inbox line and the garbage line and of the outside page
// default is 'dark blue'
$glob_theme->tr_color = '#002266';

// color for the highlight of the sorting in the mailbox
// default is 'yellow'
$glob_theme->sort_color = '#002266';

// Color of the links
$glob_theme->link_color = '#FF9900';

// Color of the text
$glob_theme->text_color = '#FFFFFF';

// Color of the Inbox Text display (Delete, new, attachment ...)
// default is 'white'
$glob_theme->inbox_text_color = '#000080';

// Color of the Inbox display - default is 'white'
$glob_theme->inbox_color = '#002266';

// Color of the Message display - default is 'white'
$glob_theme->mail_color = '#002266';

// Color of the visited links
$glob_theme->vlink_color ='#33CC00';

$glob_theme->alink_color = '#33CC00';
?>
