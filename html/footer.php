<!-- start of $Id$ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

if (!isset($theme)) //if the $theme variable NOT set...
    $theme = new NOCC_Theme($_SESSION['nocc_theme']);

$custom_footer = $theme->getCustomFooter();
if(file_exists($custom_footer)) {
    include($custom_footer);
}
else {
?>
    </div>
        <div id="footer">
            <a href="http://nocc.sourceforge.net" target="_blank">
                <img src="<?php echo $theme->getPath(); ?>/img/button.png" id="footerLogo" alt="Powered by NOCC" />
            </a>
        </div>
    </body>
</html>
<?php
}
?>
<!-- end of $Id$ -->
