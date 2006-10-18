<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/index.php,v 1.112 2006/09/01 20:28:19 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './check.php';
//If a previous authentification cookie was set, we use it to bypass login
//window.
if ($_COOKIE['NoccIdent'] != '' && $_COOKIE['NoccIdent'] != null) {
  header("Location: ".$conf->base_url."action.php?action=cookie");
}
require_once './common.php';
require ('./html/header.php');
?>
<script type="text/javascript">
<!--
function updatePort () 
{
    if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'imap') 
    {
        document.getElementById("nocc_webmail_login").port.value = 143;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'notls')
    {
        document.getElementById("nocc_webmail_login").port.value = 143;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'ssl') 
    {
        document.getElementById("nocc_webmail_login").port.value = 993;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'ssl/novalidate-cert') 
    {
        document.getElementById("nocc_webmail_login").port.value = 993;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'pop3')
    {
        document.getElementById("nocc_webmail_login").port.value = 110;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'pop3/notls')
    {
        document.getElementById("nocc_webmail_login").port.value = 110;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'pop3/ssl')
    {
        document.getElementById("nocc_webmail_login").port.value = 995;
    }
    else if (document.getElementById("nocc_webmail_login").servtype.options[document.getElementById("nocc_webmail_login").servtype.selectedIndex].value == 'pop3/ssl/novalidate-cert')
    {
        document.getElementByI("nocc_webmail_login").port.value = 995;
    }
}

function updateLang() 
{
    if (document.getElementById("nocc_webmail_login").user.value == "" && document.getElementById("nocc_webmail_login").passwd.value == "")
    {
        var lang_page = "index.php?lang=" + document.getElementById("nocc_webmail_login").lang[document.getElementById("nocc_webmail_login").lang.selectedIndex].value;
        self.location = lang_page;
    }
}

function updateTheme() 
{
    if (document.getElementById("nocc_webmail_login").user.value == "" && document.getElementById("nocc_webmail_login").passwd.value == "")
    {
        var lang_page = "index.php?theme=" + document.getElementById("nocc_webmail_login").theme[document.getElementById("nocc_webmail_login").theme.selectedIndex].value;
        self.location = lang_page;
    }
}

function updatePage() 
{
    if (document.getElementById("nocc_webmail_login").user.value == "" && document.getElementById("nocc_webmail_login").passwd.value == "")
    {
        if (document.getElementById("nocc_webmail_login").theme && document.getElementById("nocc_webmail_login").lang) {
            var lang_page = "index.php?theme=" + document.getElementById("nocc_webmail_login").theme[document.getElementById("nocc_webmail_login").theme.selectedIndex].value + "&lang=" + document.getElementById("nocc_webmail_login").lang[document.getElementById("nocc_webmail_login").lang.selectedIndex].value;
            self.location = lang_page;
        }
        if (!document.getElementById("nocc_webmail_login").theme && document.getElementById("nocc_webmail_login").lang) {
            var lang_page = "index.php?lang=" + document.getElementById("nocc_webmail_login").lang[document.getElementById("nocc_webmail_login").lang.selectedIndex].value;
            self.location = lang_page;
        }
        if (document.getElementById("nocc_webmail_login").theme && !document.getElementById("nocc_webmail_login").lang) {
            var lang_page = "index.php?theme=" + document.getElementById("nocc_webmail_login").theme[document.getElementById("nocc_webmail_login").theme.selectedIndex].value;
            self.location = lang_page;
        }
        if (!document.getElementById("nocc_webmail_login").theme && !document.getElementById("nocc_webmail_login").lang) {
            var lang_page = "index.php";
            self.location = lang_page;
        }
    }
}


// -->
</script>

            <form action="action.php" method="post" id="nocc_webmail_login">
            <div class="loginContent">
              <input type="hidden" name="folder" value="INBOX" />
              <input type="hidden" name="action" value="login" />
              <div class="loginForm">
                <table>
                  <tr> 
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td colspan="3" class="loginTitle"><?php echo $html_welcome.' '.$conf->nocc_name.' v'.$conf->nocc_version; ?></td>
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
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
                    <td class='f right' ><?php echo $html_login; ?></td>
                    <td>&nbsp;</td>
                    <td class="f left">
                      <input class="button" type="text" name="user" size="15" value="<?php if(isset($REMOTE_USER)) echo $REMOTE_USER; ?>"/>
                      <?php
                        if (count($conf->domains) > 1)
                        {
                          //Add fill-in domain
                          if( isset($conf->typed_domain_login) )
                            echo '@ <input class="button" type="text" name="fillindomain">';
                          else if ( isset($conf->vhost_domain_login) && $conf->vhost_domain_login == true ) {
                            $i = 0;
                            while (!empty($conf->domains[$i]->in))
                            {
                              if (strpos($_SERVER["HTTP_HOST"],$conf->domains[$i]->domain))
                                echo "<input type=\"hidden\" name=\"domainnum\" value=\"" . $i . "\" />\n";
                                $i++;
                            }
                          }    
                          else
                          {
                            echo '@ <select class="button" name="domainnum">';
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
                    <td class="f right"><?php echo $html_passwd ?></td>
                    <td>&nbsp;</td>
                    <td class="f left"> 
                      <input class="button" type="password" name="passwd" size="15" />
                    </td>
                  </tr>
                  <?php
                    if ($conf->domains[0]->in == '')
                    {
                      echo '<tr>';
                      echo '<td class="f right">'.$html_server.'</td>';
                      echo '<td>&nbsp;</td>';
                      echo '<td class="f left">';
                      echo '<input class="button" type="text" name="server" value="mail.example.com" size="15" /><br /><input class="button" type="text" size="4" name="port" value="143" />';
                      echo '<select class="button" name="servtype" onchange="updatePort()">';
                      echo '<option value="imap">IMAP</option>';
                      echo '<option value="notls">IMAP (no TLS)</option>';
                      echo '<option value="ssl">IMAP SSL</option>';
                      echo '<option value="ssl/novalidate-cert">IMAP SSL (self signed)</option>';
                      echo '<option value="pop3">POP3</option>';
                      echo '<option value="pop3/notls">POP3 (no TLS)</option>';
                      echo '<option value="pop3/ssl">POP3 SSL</option>';
                      echo '<option value="pop3/ssl/novalidate-cert">POP3 SSL (self signed)</option>';
                      echo '</select>';
                      echo '</td>';
                      echo '</tr>';
                    }
                  ?>
                  <tr>
                    <td class="f right"><?php echo $html_lang ?></td>
                    <td>&nbsp;</td>
                    <td class="f left">
                    <?php
                      echo '<select class="button" name="lang" onchange="updatePage()">';
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
                  <?php
                    if ($conf->use_theme == true) 
                    {
                      echo '<tr>';
                      echo '<td class="f right">'.$html_theme.'</td>';
                      echo '<td>&nbsp;</td>';
                      echo '<td class="f left">';
                      echo '<select class="button" name="theme" onchange="updatePage()">';
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
                      echo '</select>';
                      echo '</td>';
                      echo '</tr>';
                    }
                  ?>
                  <?php
                    if (isset($conf->prefs_dir) && $conf->prefs_dir != '') {
                  ?>
                  <tr>
                    <td class="f right"><?php echo $html_remember ?></td>
                    <td>&nbsp;</td>
                    <td class="f left">
                       <input type="checkbox" name="remember" value="true" />
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="3" class="f center">
                      <input name="enter" class="button" type="submit" value="<?php echo $html_submit ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                </table>
              </div>
            </div>
            </form>
            <script type="text/javascript">
            <!--
                document.getElementById("nocc_webmail_login").user.focus();
                document.getElementById("nocc_webmail_login").passwd.value='';
            // -->
            </script>
<?php
require ('./html/footer.php');
session_name("NOCCSESSID");
session_unset();
session_destroy();
?>
