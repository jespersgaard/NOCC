<!-- start of $Id: html_mail_header.php,v 1.33 2002/05/29 19:17:28 rossigee Exp $ -->
<?php

global $conf;

// Show/hide header link
$verbose = (isset($_REQUEST['verbose']) && $_REQUEST['verbose'] == 1) ? '1' : '0';
if ($conf->use_verbose)
    if($verbose == '1')
	    echo '<tr><td class="mail"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=0" class="mail">' . $html_remove_header . '</a></td>';
    else
	    echo '<tr><td class="mail"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=1" class="mail">' . $html_view_header . '</a></td>';
else
    echo '<tr><td>&nbsp;</td>';

// Next/prev message links
echo "<td align=\"right\">";
if (($content['prev'] != '') && ($content['prev'] != 0))
    echo '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['prev'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $_SESSION['nocc_theme'] . '/img/left_arrow.gif" alt="' . $alt_prev . '" title="' . $alt_prev . '" border="0" /></a>';
echo "&nbsp;";
if (($content['next'] != '') && ($content['next'] != 0))
    echo '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['next'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $_SESSION['nocc_theme'] . '/img/right_arrow.gif" alt="' . $alt_next . '" title="' . $alt_next . '" border="0" /></a>';
echo "</td></tr>";

// If not displaying verbose headers, display normal headers
if ($conf->use_verbose && $verbose == '0') {
    echo '<tr><td align="right" class="mail">'.$html_from.'</td><td bgcolor="'.$glob_theme->mail_properties.'" class="mail"><b>'.htmlspecialchars($content['from']).'</b></td></tr>';
    echo '<tr><td align="right" class="mail">'.$html_to.'</td><td bgcolor="'.$glob_theme->mail_properties.'" class="mail">'.htmlspecialchars($content['to']).'</td></tr>';
    if ($content['cc'] != '') {
        echo '<tr><td align="right" class="mail">'.$html_cc.'</td><td bgcolor="'.$glob_theme->mail_properties.'" class="mail">'.htmlspecialchars($content['cc']).'</td></tr>';
    }
    if ($content['subject'] == '')
        $content['subject'] = $html_nosubject;
    echo '<tr><td align="right" class="mail">'.$html_subject.'</td><td bgcolor="'.$glob_theme->mail_properties.'" class="mail"><b>'.htmlspecialchars($content['subject']).'</b></td></tr>';
    echo '<tr><td align="right" class="mail">'.$html_date.'</td><td bgcolor="'.$glob_theme->mail_properties.'" class="mail">'.$content['date'].'</td></tr>';
    if($content['att'] != '') {
        echo $content['att'];
    }
}

else {
    if($content['att'] != '') {
        echo $content['att'];
    }
    echo '<tr><td colspan="2" bgcolor="'.$glob_theme->mail_color.'" class="mail"><pre>'.$content['header'].'</pre></td></tr>';
}

//echo @convert_cyr_string($content['body'], $content['charset'], $charset);
echo '<tr><td colspan="2" bgcolor="'.$glob_theme->mail_color.'" class="mail">'.$content['body'].'</td></tr>';

?>

<!-- end of $Id: html_mail_header.php,v 1.33 2002/05/29 19:17:28 rossigee Exp $ -->
