<!-- start of $Id: html_top_table.php,v 1.42 2001/12/13 10:39:09 nicocha Exp $ -->
<?php
$arrow = ($sortdir == 0) ? 'up' : 'down';
$new_sortdir = ($sortdir == 0) ? 1 : 0;
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="<?php echo $glob_theme->inside_color ?>">
<form method="post" action="delete.php" name="delete_form">
<input type="hidden" name="lang" value="<?php echo $lang ?>" />

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<?php echo $glob_theme->inside_color ?>">
	<tr bgcolor="<?php echo $glob_theme->tr_color ?>">
		<td <?php if (($is_imap) || ($conf->have_ucb_pop_server)) echo 'colspan="5"'; else echo 'colspan="4"'; ?>align="left" class="titlew">
			<b><?php echo $folder ?></b>
		</td>
		<td align="right" class="titlew" colspan="2">
			<?php echo $num_msg ?> <?php if ($num_msg == 1) {echo $html_msg;} else {echo $html_msgs;}?>
		</td>
	</tr>
	<tr bgcolor="<?php echo $glob_theme->inbox_text_color ?>">
		<td align="center" class="inbox" colspan="2">
			<?php echo $html_select ?>
		</td>
		<?php if (($is_imap) || ($conf->have_ucb_pop_server)) { ?>
		<td align="center" class="inbox">
			<?php echo $html_new ?>
		</td>
		<?php } ?>
		<td align="center" class="inbox" <?php if ($sort == 2) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
			<a href="<?php echo $PHP_SELF ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_from; ?>" /></a>
			&nbsp;
			<a href="<?php echo $PHP_SELF ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<?php echo $html_from ?></a>
		</td>
		<td align="center" class="inbox" <?php if ($sort == 3) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
			<a href="<?php echo $PHP_SELF ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_subject; ?>" /></a>
			&nbsp;
			<a href="<?php echo $PHP_SELF ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<?php echo $html_subject ?></a>
		</td>
		<td align="center" class="inbox" <?php if ($sort == 1) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
			<a href="<?php echo $PHP_SELF ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_date; ?>" /></a>
			&nbsp;
			<a href="<?php echo $PHP_SELF ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<?php echo $html_date ?></a>
		</td>
		<td align="right" class="inbox" <?php if ($sort == 6) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
			<a href="<?php echo $PHP_SELF ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_size; ?>" /></a>
			&nbsp;
			<a href="<?php echo $PHP_SELF ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>">
			<?php echo $html_size ?></a>
		</td>
	</tr>
<!-- start of $Id: html_top_table.php,v 1.42 2001/12/13 10:39:09 nicocha Exp $ -->
