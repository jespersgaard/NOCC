<?
require ("conf.php");
require ("check_lang.php");
session_start();
session_destroy();
?>
<span class="f">
<? echo $html_wrong ?>
<br>
<a href="index.php"><? echo $html_retry ?></a>
</span>
<br><br><br><br><br>