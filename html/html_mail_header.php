<!-- start of $Id: html_mail_header.php,v 1.29 2002/05/15 10:12:19 rossigee Exp $ -->
<?php
// Show/hide header
$verbose = (isset($_REQUEST['verbose']) && $_REQUEST['verbose'] == 1) ? '1' : '0';
if ($conf->use_verbose)
    echo '<tr><td class="mail"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=' . $verbose . '" class="mail">' . $html_remove_header . '</a></td>';
else
    echo '<tr><td>&nbsp;</td>';

if (($content['prev'] != '') && ($content['prev'] != 0))
    $prev = '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['prev'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $theme . '/img/left_arrow.gif" alt="' . $alt_prev . '" title="' . $alt_prev . '" border="0" /></a>';
if (($content['next'] != '') && ($content['next'] != 0))
    $next =  '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['next'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $theme . '/img/right_arrow.gif" alt="' . $alt_next . '" title="' . $alt_next . '" border="0" /></a>';

?>    
<td    align="right"><?php if (isset($prev)) echo $prev; ?>&nbsp;<?php if (isset($next)) echo $next; ?></td></tr>
<tr><td align="right" class="mail"><?php echo $html_from ?></td><td bgcolor="<?php echo $glob_theme->mail_properties ?>" class="mail"><b><?php echo htmlspecialchars($content['from']) ?></b></td></tr>

<tr><td align="right" class="mail"><?php echo $html_to ?></td><td bgcolor="<?php echo $glob_theme->mail_properties ?>" class="mail"><?php echo htmlspecialchars($content['to']) ?></td></tr>

<?php 
if ($content['cc'] != '')
{ ?>
<tr><td align="right" class="mail"><?php echo $html_cc ?></td><td bgcolor="<?php echo $glob_theme->mail_properties ?>" class="mail"><?php echo htmlspecialchars($content['cc']) ?></td></tr>
<?php
}

if ($content['subject'] == '')
    $content['subject'] = $html_nosubject;
?>

<tr><td align="right" class="mail"><?php echo $html_subject ?></td><td bgcolor="<?php echo $glob_theme->mail_properties ?>" class="mail"><b><?php echo htmlspecialchars($content['subject']) ?></b></td></tr>

<tr><td align="right" class="mail"><?php echo $html_date?></td><td bgcolor="<?php echo $glob_theme->mail_properties ?>" class="mail"><?php echo $content['date'] ?></td></tr>

<?php echo $content['att'] ?>

<tr><td colspan="2" bgcolor="<?php echo $glob_theme->mail_color ?>" class="mail"><pre><?php echo $content['header'] ?></pre><br />
<?php //echo @convert_cyr_string($content['body'], $content['charset'], $charset); ?>
<?php echo $content['body'] ?>
<!-- end of $Id: html_mail_header.php,v 1.29 2002/05/15 10:12:19 rossigee Exp $ -->
