<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/index.php,v 1.99 2004/06/24 05:26:10 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './common.php';
require_once './proxy.php';
Header("Content-type: text/html; Charset=$charset");
require_once './check.php';
require ('./html/header.php');
?>
<script type="text/javascript">
<!--
function updatePort () 
{
    if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'imap') 
    {
        document.nocc_webmail_login.port.value = 143;
    }
    else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'ssl') 
    {
        document.nocc_webmail_login.port.value = 993;
    }
    else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'ssl/novalidate-cert') 
    {
        document.nocc_webmail_login.port.value = 993;
    }
    else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'pop3')
    {
        document.nocc_webmail_login.port.value = 110;
    }
    else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'pop3/ssl')
    {
        document.nocc_webmail_login.port.value = 995;
    }
    else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'pop3/ssl/novalidate-cert')
    {
        document.nocc_webmail_login.port.value = 995;
    }
}

function updateLang() 
{
    if (document.nocc_webmail_login.user.value == "" && document.nocc_webmail_login.passwd.value == "")
    {
        var lang_page = "index.php?lang=" + document.nocc_webmail_login.lang[document.nocc_webmail_login.lang.selectedIndex].value;
        self.location = lang_page;
    }
}

function updateTheme() 
{
    if (document.nocc_webmail_login.user.value == "" && document.nocc_webmail_login.passwd.value == "")
    {
        var lang_page = "index.php?theme=" + document.nocc_webmail_login.theme[document.nocc_webmail_login.theme.selectedIndex].value;
        self.location = lang_page;
    }
}
// -->
</script>

            <form action="action.php" method="post" name="nocc_webmail_login" target="_top">
            <input type="hidden" name="folder" value="INBOX" />
            <table bgcolor="<?php echo $glob_theme->login_border ?>" border="0" cellpadding="1" cellspacing="0" width="428" align="center">
                <tr> 
                    <td valign="bottom"> 
                        <table bgcolor="<?php echo $glob_theme->login_box_bgcolor ?>" border="0" cellpadding="0" cellspacing="0" width="428">
                            <tr> 
                                <td colspan="3" height="18"><font size="-3">&nbsp;</font></td>
                            </tr>
                            <tr> 
                                <td colspan="3" height="18"><font size="-3">&nbsp;</font></td>
                            </tr>
                            <tr valign="top"> 
                               <td align="center" colspan="3" class="f"><b><?php echo $html_welcome.' '.$conf->nocc_name.' v'.$conf->nocc_version; ?></b></td>
                            </tr>
                            <tr> 
                                <td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
                            </tr>
                            <tr>
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
<!-- abcdefghijklmnopqrstuvwxyz 01234567890 -->
                                <?php print "<td class='f' align='right' >$html_login</td>\n"; ?>
                                <td><font size="-3">&nbsp;</font></td>
                                <td class="f" align="left" >
                                    <input type="text" name="user" size="15" value="<?php if(isset($REMOTE_USER)) echo $REMOTE_USER; ?>"/>
                                    <?php
                                    if (count($conf->domains) > 1)
                                    {
                                        //Add fill-in domain
                                        if( isset($conf->typed_domain_login) )
                                            echo '@ <input type="text" name="fillindomain">';
                                        else
                                        {
                                            echo '@ <select name="domainnum">';
                                            $i = 0;
                                            while (!empty($conf->domains[$i]->in))
                                            {
                                                echo "<option value=\"$i\">".$conf->domains[$i]->domain.'</option>';
                                                $i++;
                                            }
                                            echo '</select>'."\n";
                                        }
                                    }
                                    else
                                    {
                                        echo '<input type="hidden" name="domainnum" value="0" />'."\n";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
                            </tr>
                            <tr> 
                                <td align="right" class="f"><?php echo $html_passwd ?></td>
                                <td><font size="-3">&nbsp;</font></td>
                                <td class="f" align="left"> 
                                    <input type="password" name="passwd" size="15" />
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
                            </tr>
                            <?php
                            if ($conf->domains[0]->in == '')
                            {
                                echo '<tr><td align="right" class="f">'.$html_server.'</td>';
                                echo '<td><font size="-3">&nbsp;</font></td>';
                                echo '<td class="f" align="left">';
                                echo '<input type="text" name="server" value="mail.example.com" size="15" /><br /><input type="text" size="4" name="port" value="143" />';
                                echo '<select name="servtype" onchange="updatePort()">';
                                echo '<option value="imap">IMAP</option>';
                                //echo '<option value="ssl">IMAP SSL</option>';
                                //echo '<option value="ssl/novalidate-cert">IMAP SSL (self signed)</option>';
                                echo '<option value="pop3">POP3</option>';
                                //echo '<option value="pop3/ssl">POP3 SSL</option>';
                                //echo '<option value="pop3/ssl/novalidate-cert">POP3 SSL (self signed)</option>';
                                echo '</select></td>';
                                echo '</tr><tr><td colspan="3" height="12"><font size="-3">&nbsp;</font></td></tr>';
                            }
                            ?>
                            <tr>
                                <td align="right" class="f"><?php echo $html_lang ?></td>
                                <td><font size="-3">&nbsp;</font></td>
                                <td class="f" align="left">
                                    <?php
                                        echo '<select name="lang" onchange="updateLang()">';
                                        for ($i = 0; $i < sizeof($lang_array); $i++)
                                            if (file_exists('lang/'.$lang_array[$i]->filename.'.php'))
                                            {
                                                echo '<option value="'.$lang_array[$i]->filename.'"';
                                                if ($_SESSION['nocc_lang'] == $lang_array[$i]->filename)
                                                    echo ' selected="selected"';
                                                echo '>'.$lang_array[$i]->label.'</option>';
                                            }
                                        echo '</select>'."\n";
                                    ?>
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
                            </tr>
                            <?php if ($conf->use_theme == true) 
                            {
                                echo '<tr><td align="right" class="f">'.$html_theme.'</td><td><font size="-3">&nbsp;</font></td><td class="f" align="left">';
                                echo '<select name="theme" onchange="updateTheme()">';
                                $handle = opendir('./themes');
                                while (($file = readdir($handle)) != false) 
                                {
                                    if (($file != '.') && ($file != '..'))
                                    {
                                        echo '<option value="'.$file.'"';
                                        if ($file == $_SESSION['nocc_theme'])
                                                echo ' selected="selected"';
                                        echo '>'.$file.'</option>';
                                    }
                                }
                                closedir($handle); 
                                echo '</select></td></tr><tr><td colspan="3">&nbsp;</td></tr>';
                            }
                            ?>
                            <tr>
                                <td colspan="3" align="center" class="f">
                                    <input name="enter" class="button" type="submit" value="<?php echo $html_submit ?>" />
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </form>
            <script type="text/javascript">
            <!--
                document.nocc_webmail_login.user.focus();
                document.nocc_webmail_login.passwd.value='';
            // -->
            </script>
<?php
require ('./html/footer.php');
session_name("NOCCSESSID");
session_destroy();
?>
