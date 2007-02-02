<!-- start of $Id: footer.php,v 1.19 2007/02/01 07:28:59 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

$custom_footer = './themes/' . str_replace('..','',convertLang2Html($_SESSION['nocc_theme'])) . '/footer.php';
if(file_exists($custom_footer)) {
    include($custom_footer);
}
else {
?>
	</div>
        <div id="footer">
            <a href="javascript:void(0);" onclick="window.open('http://nocc.sourceforge.net');">
                <img src="themes/<?php echo str_replace('..','',convertLang2Html($_SESSION['nocc_theme'])) ?>/img/button.png" id="footerLogo" alt="Powered by NOCC" />
            </a>
        </div>
    </body>
</html>
<?php
}
?>
<!-- end of $Id: footer.php,v 1.19 2007/02/01 07:28:59 goddess_skuld Exp $ -->
