<?php
/**
 * This file is the main file of NOCC; each function starts from here
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once './common.php';

// Remove any attachments from disk and from our session
clear_attachments();

// Reset exception vector
$ev = null;

$remember = '';
if(isset($_REQUEST['remember']))
    $remember = safestrip($_REQUEST['remember']);

// Refresh quota usage
if (!isset($_REQUEST['sort'])) {
    if (NOCC_Session::getQuotaEnable() == true) {
        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            exit;
        }
        $quota = $pop->get_quota_usage($_SESSION['nocc_folder']);
        $_SESSION['quota'] = $quota;
    }
}

// Act on 'action'
$action = '';
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);

switch($action) {
    //--------------------------------------------------------------------------------
    // Display a mail...
    //--------------------------------------------------------------------------------
    case 'aff_mail':
        try {
            $pop = new nocc_imap();

            $attach_tab = array();
            $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], NOCC_Request::getBoolValue('verbose'));
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        // Display or hide distant HTML images
        if (!NOCC_Request::getBoolValue('display_images')) {
            $content['body'] = NOCC_Security::disableHtmlImages($content['body']);
        }
        // Display embedded HTML images
        $tmp_attach_tab = $attach_tab;
        $i = 0;
        while ($tmp = array_pop($tmp_attach_tab)) {
            //TODO: Rewrite!
            $imageType = NOCC_Security::getImageType($tmp['mime']);
            if ($conf->display_img_attach && !empty($imageType) && ($tmp['number'] != '')) {
                if (NOCC_Security::isSupportedImageType($imageType)) {
                    $new_img_src = 'src="get_img.php?mail=' . $_REQUEST['mail'].'&amp;num='
                            . $tmp['number'] . '&amp;mime=' . $imageType . '&amp;transfer=' . $tmp['transfer'] . '"';
                    $img_id = str_replace('<', '', $tmp['id']);
                    $img_id = str_replace('>', '', $img_id);
                    $content['body'] = str_replace('src="cid:'.$img_id.'"', $new_img_src, $content['body']);
                    $content['body'] = str_replace('src=cid:'.$img_id, $new_img_src, $content['body']);
                }
            }
        }
        if (NoccException::isException($ev)) {
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        // Here we display the message
        require './html/header.php';
        require './html/menu_mail.php';
        require './html/submenu_mail.php';
        require './html/html_mail.php';
        //TODO: Use "mailData" DIV from file "html/html_mail.php"!
        echo '<div class="mailData">';
        while ($tmp = array_pop($attach_tab)) {
            // $attach_tab is the array of attachments
            // If it's a text/plain, display it
            if ((!preg_match('|ATTACHMENT|i', $tmp['disposition'])) && $conf->display_text_attach && (preg_match('|text/plain|i', $tmp['mime']))) {
                echo '<hr class="mailAttachSep" />';
                echo '<div class="mailTextAttach">';
                //TODO: Replace URLs and Smilies in text/plain attachment?
                echo view_part($pop, $_REQUEST['mail'], $tmp['number'], $tmp['transfer'], $tmp['charset']);
                echo '</div> <!-- .mailTextAttach -->';
            }
            //TODO: Rewrite!
            $imageType = NOCC_Security::getImageType($tmp['mime']);
            if ($conf->display_img_attach && !empty($imageType) && ($tmp['number'] != '')) {
                // if it's an image, display it#
                if (NOCC_Security::isSupportedImageType($imageType)) {
                    echo '<hr class="mailAttachSep" />';
                    echo '<div class="mailImgAttach">';
                    echo '<img src="get_img.php?mail=' . $_REQUEST['mail'].'&amp;num=' . $tmp['number'] . '&amp;mime='
                            . $imageType . '&amp;transfer=' . $tmp['transfer'] . '" alt="" title="' . $tmp['name'] . '" />';
                    echo '</div> <!-- .mailImgAttach -->';
                }
            }
        }
        echo '</div> <!-- .mailData -->';
        require './html/submenu_mail.php';
        require './html/menu_mail.php';
        require './html/footer.php';

        $pop->close();
        break;

    //--------------------------------------------------------------------------------
    // Logout...
    //--------------------------------------------------------------------------------
    case 'logout':
        require_once './utils/proxy.php';
        header("Location: ".$conf->base_url."logout.php");
        break;

    //--------------------------------------------------------------------------------
    // Write a mail...
    //--------------------------------------------------------------------------------
    case 'write':
        NOCC_Session::setSendHtmlMail($user_prefs->getSendHtmlMail());

        if (isset($_REQUEST['mail_to']) && $_REQUEST['mail_to'] != "") {
            $mail_to = $_REQUEST['mail_to'];
        }
        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            exit;
        }
        $pop->close();
        // Add signature
        add_signature($mail_body);

        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send.php';
        require './html/menu_inbox.php';
        require './html/footer.php';
        break;

    //--------------------------------------------------------------------------------
    // Reply on a mail...
    //--------------------------------------------------------------------------------
    case 'reply':
        $attach_tab = array();

        try {
            $pop = new nocc_imap();

            $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], NOCC_Request::getBoolValue('verbose'));
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        $mail_messageid = urlencode($content['message_id']);

        $mail_to = !empty($content['reply_to']) ? $content['reply_to'] : $content['from'];

        $mail_subject = add_reply_to_subject($content['subject']);

        // Add quoting
        add_quoting($mail_body, $content);

        // Add signature
        add_signature($mail_body);

        // We add the attachments of the original message
        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send.php';
        require './html/menu_inbox.php';
        require './html/footer.php';

        $pop->close();
        break;

    //--------------------------------------------------------------------------------
    // Reply all on a mail...
    //--------------------------------------------------------------------------------
    case 'reply_all':
        $attach_tab = array();

        try {
            $pop = new nocc_imap();

            $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], NOCC_Request::getBoolValue('verbose'));
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        $mail_messageid = urlencode($content['message_id']);
        
        $mail_to = get_reply_all($content['from'], $content['to'], $content['cc']);

        $mail_subject = add_reply_to_subject($content['subject']);

        // Add quoting
        add_quoting($mail_body, $content);

        // Add signature
        add_signature($mail_body);

        // We add the attachments of the original message
        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send.php';
        require './html/menu_inbox.php';
        require './html/footer.php';

        $pop->close();
        break;

    //--------------------------------------------------------------------------------
    // Forward a mail...
    //--------------------------------------------------------------------------------
    case 'forward':
        $attach_tab = array();

        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        $mail_list = explode('$', $_REQUEST['mail']);
        $mail_body = '';
        for ($mail_num = 0; $mail_num < count($mail_list); $mail_num++) {
            try {
                $content = aff_mail($pop, $attach_tab, $mail_list[$mail_num], NOCC_Request::getBoolValue('verbose'));
            }
            catch (Exception $ex) {
                //TODO: Show error without NoccException!
                $ev = new NoccException($ex->getMessage());
                require './html/header.php';
                require './html/error.php';
                require './html/footer.php';
                break;
            }

            if (count($mail_list) == 1) {
                $mail_subject = $html_forward_short.' '.$content['subject'];
            } else {
                $mail_subject = '';
            }

            if (isset($conf->broken_forwarding) && $conf->broken_forwarding) {
                // Set body
                //TODO: Put to own function and merge with code from add_quoting()!
                if ($user_pref->getOutlookQuoting())
                    $mail_body .= $original_msg . $conf->crlf . $html_from_label . ' ' . $content['from'] . $conf->crlf
                            . $html_to_label . ' ' . $content['to'] . $conf->crlf . $html_sent_label.' ' . $content['complete_date']
                            . $conf->crlf . $html_subject_label . ' '. $content['subject'] . $conf->crlf . $conf->crlf
                            . strip_tags2($content['body'], '') . $conf->crlf . $conf->crlf;
                else {
                    $stripped_content = strip_tags2($content['body'], '');
                    $mail_body .= mailquote($stripped_content, $content['from'], $html_wrote) . $conf->crlf . $conf->crlf;
                }
                $broken_forwarding = true;
            } else {
                $broken_forwarding = false;
            }
        }
        // Let send.php know to attach the original message
        $forward_msgnum = $_REQUEST['mail'];

        // Add signature
        add_signature($mail_body);

        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send.php';
        require './html/menu_inbox.php';
        require './html/footer.php';

        $pop->close();
        break;

    //--------------------------------------------------------------------------------
    // Manage folders...
    //--------------------------------------------------------------------------------
    case 'managefolders':
        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

    $do = "";
    if(isset($_REQUEST['do']))
        $do = trim(safestrip($_REQUEST['do']));
        switch ($do) {
            case 'create_folder':
                if ($_REQUEST['createnewbox']) {
                    $pop->createmailbox($_REQUEST['createnewbox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->subscribe($_REQUEST['createnewbox'], $ev, true);
                    if(NoccException::isException($ev)) break;
                }
                break;

            case 'subscribe_folder':
                if ($_REQUEST['subscribenewbox']) {
                    $pop->subscribe($_REQUEST['subscribenewbox'], $ev, false);
                    if(NoccException::isException($ev)) break;
                }
                break;

            case 'remove_folder':
                if ($_REQUEST['removeoldbox']) {
                    // Don't want to remove, just unsubscribe.
                    //$pop->deletemailbox($removeoldbox, $ev);
                    //if(NoccException::isException($ev)) break ;
                    $pop->unsubscribe($_REQUEST['removeoldbox'], $ev);
                    if(NoccException::isException($ev)) break;
                }
                break;

            case 'rename_folder':
                if ($_REQUEST['renamenewbox'] && $_REQUEST['renameoldbox']) {
                    $pop->renamemailbox($_REQUEST['renameoldbox'], $_REQUEST['renamenewbox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->unsubscribe($_REQUEST['renameoldbox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->subscribe($_REQUEST['renamenewbox'], $ev, true);
                    if(NoccException::isException($ev)) break;
                }
                break;
            
            case 'delete_folder':
                if ($_REQUEST['deletebox']) {
                    $pop->unsubscribe($_REQUEST['deletebox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->deletemailbox($_REQUEST['deletebox'], $ev);
                    if(NoccException::isException($ev)) break;
                }
                break;

        }

        require './html/header.php';
        require './html/menu_inbox.php';
        if ($pop->is_imap())
            require './html/folders.php';
        require './html/menu_inbox.php';
        require './html/footer.php';

        $pop->close();

        break;

    //--------------------------------------------------------------------------------
    // Manage filters...
    //--------------------------------------------------------------------------------
    case 'managefilters':
        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            exit;
        }
        $user_key = NOCC_Session::getUserKey();
        $filterset = NOCCUserFilters::read($user_key, $ev);

        if (NoccException::isException($ev)) {
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        if (isset($_REQUEST['do'])) {
            switch (trim($_REQUEST['do'])) {
                case 'delete':
                    if ($_REQUEST['filter']) {
                        unset($filterset->filterset[$_REQUEST['filter']]);
                        $filterset->dirty_flag = 1;
                        $filterset->commit($ev);
                        if (NoccException::isException($ev)) {
                            require './html/header.php';
                            require './html/error.php';
                            require './html/footer.php';
                            break;
                        }
                    }
                    break;
    
                case 'create':
                    if (!$_REQUEST['filtername']) {
                        break;
                    }

                    if ($_REQUEST['thing1'] == '-') {
                        break;
                    } else {
                        $filterset->filterset[$_REQUEST['filtername']]['SEARCH'] = 
                            $_REQUEST['thing1'] . ' "'. $_REQUEST['contains1'] . '"';
                    }
            
                    if ($_REQUEST['thing2'] != '-') {
                        $filterset->filterset[$_REQUEST['filtername']]['SEARCH'] .= 
                            ' ' . $_REQUEST['thing2'] . ' "'. $_REQUEST['contains2'] . '"';
                    }

                    if ($_REQUEST['thing3'] != '-') {
                        $filterset->filterset[$_REQUEST['filtername']]['SEARCH'] .= 
                            ' ' . $_REQUEST['thing3'] . ' "'. $_REQUEST['contains3'] . '"';
                    }
                
                    if ($_REQUEST['filter_action'] == 'DELETE') {
                        $filterset->filterset[$_REQUEST['filtername']]['ACTION'] = 'DELETE';
                    } elseif ($_REQUEST['filter_action'] == 'MOVE') {
                        $filterset->filterset[$_REQUEST['filtername']]['ACTION'] = 'MOVE:'. $_REQUEST['filter_move_box'];
                    } else {
                        break;
                    }
                
                    $filterset->dirty_flag = 1;
                    $filterset->commit($ev);
                    if (NoccException::isException($ev)) {
                        require './html/header.php';
                        require './html/error.php';
                        require './html/footer.php';
                        break;
                    }
                    break;
            }
        }
        $html_filter_select = $filterset->html_filter_select();
        $filter_move_to = $pop->html_folder_select('filter_move_box', '');

        require './html/header.php';
        require './html/menu_prefs.php';
        require './html/submenu_prefs.php';
        require './html/filter_prefs.php';
        require './html/submenu_prefs.php';
        require './html/menu_prefs.php';
        require './html/footer.php';

        $pop->close();

        break;

    //--------------------------------------------------------------------------------
    // Set preferences...
    //--------------------------------------------------------------------------------
    case 'setprefs':
        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            //TODO: Show error without NoccException!
            $ev = new NoccException($ex->getMessage());
            require './html/header.php';
            require './html/error.php)';
            require './html/footer.php';
            break;
        }

        if (isset($_REQUEST['submit_prefs'])) {
            if (isset($_REQUEST['full_name']))
                $user_prefs->full_name = safestrip($_REQUEST['full_name']);
            if (isset($_REQUEST['msg_per_page']))
                $user_prefs->msg_per_page = $_REQUEST['msg_per_page'];
            if (isset($_REQUEST['email_address']))
                $user_prefs->email_address = safestrip($_REQUEST['email_address']);
            $user_prefs->setCcSelf(isset($_REQUEST['cc_self']));
            $user_prefs->setHideAddresses(isset($_REQUEST['hide_addresses']));
            $user_prefs->setOutlookQuoting(isset($_REQUEST['outlook_quoting']));
            $user_prefs->setColoredQuotes(isset($_REQUEST['colored_quotes']));
            $user_prefs->setDisplayStructuredText(isset($_REQUEST['display_struct']));
            $user_prefs->seperate_msg_win = isset($_REQUEST['seperate_msg_win']);
            if (isset($_REQUEST['reply_leadin']))
                $user_prefs->reply_leadin = safestrip($_REQUEST['reply_leadin']);
            if (isset($_REQUEST['signature']))
                if (isset($_REQUEST['html_mail_send']) && $_REQUEST['html_mail_send']) {
                    $user_prefs->signature = $_REQUEST['signature'];
                } else {
                    $user_prefs->signature = safestrip($_REQUEST['signature']);
                }
            if (isset($_REQUEST['wrap_msg']))
                $user_prefs->wrap_msg = $_REQUEST['wrap_msg'];
            $user_prefs->sig_sep = isset($_REQUEST['sig_sep']);
            $user_prefs->setSendHtmlMail(isset($_REQUEST['html_mail_send']));
            $user_prefs->graphical_smilies = isset($_REQUEST['graphical_smilies']);
            $user_prefs->setUseSentFolder(isset($_REQUEST['sent_folder']));
            if (isset($_REQUEST['sent_folder_name'])) {
                $replace = str_replace($_SESSION['imap_namespace'], "", $_REQUEST['sent_folder_name']);
                $user_prefs->sent_folder_name = safestrip($replace);
            }
            $user_prefs->setUseTrashFolder(isset($_REQUEST['trash_folder']));
            if (isset($_REQUEST['trash_folder_name'])) {
                $replace = str_replace($_SESSION['imap_namespace'], "", $_REQUEST['trash_folder_name']);
                $user_prefs->trash_folder_name = safestrip($replace);
            }
            if (isset($_REQUEST['lang']))
                $user_prefs->lang = $_REQUEST['lang'];
            if (isset($_REQUEST['theme'])) {
                $user_prefs->theme = $_REQUEST['theme'];
                $_SESSION['nocc_theme'] = $_REQUEST['theme'];
            }

            if ($conf->prefs_dir) {
                // Commit preferences
                $user_prefs->commit($ev);
            }
            else {
                // Validate preferences
                $user_prefs->validate($ev);
            }
            if (NoccException::isException($ev)) {
                require './html/header.php'; 
                require './html/error.php';
                require './html/footer.php';
                break;
            }

            $_SESSION['nocc_user_prefs'] = $user_prefs;
        }

        require './html/header.php';
        require './html/menu_prefs.php';
        require './html/submenu_prefs.php';
        require './html/prefs.php';
        require './html/submenu_prefs.php';
        require './html/menu_prefs.php';
        require './html/footer.php';

        $pop->close();

        break;

    //--------------------------------------------------------------------------------
    // Login...
    //--------------------------------------------------------------------------------
    default:
        //TODO: Optimize try block!
        try {
            $pop = new nocc_imap();
        }
        catch (Exception $ex) {
            $ev = new NoccException($ex->getMessage());
        }

        if (NoccException::isException($ev)) {
            if ($action == 'login' || $action == 'cookie') {
                session_name("NOCCSESSID");
                $_SESSION['nocc_login'] = '';
                $_SESSION['nocc_user_prefs'] = '';
                session_destroy();
                setcookie("NoccIdent");
            }
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }
        if ($action == 'login') {
            // Subscribe to INBOX, usefull if it's not already done.
            if ($pop->is_imap()) {
                $pop->subscribe($pop->folder, $ev, false);
            }
            // If needed, store a cookie with all needed parameters
            if ($remember == "true") {
                saveSession($ev);
                if (NoccException::isException($ev)) {
                    require './html/header.php';
                    require './html/error.php';
                    require './html/footer.php';
                    break;
                }
                //store cookie for thirty days
                setcookie('NoccIdent', NOCC_Session::getUserKey(), time()+60*60*24*30);
            }
        }

        // We may need to apply some filters to the INBOX...  this is still a work in progress.
        if (!isset($_REQUEST['sort'])) {
            if ($pop->is_imap()) {
                if ($pop->folder == 'INBOX') {
                    $user_key = NOCC_Session::getUserKey();
                    if (!empty($conf->prefs_dir)) {
                        $filters = NOCCUserFilters::read($user_key, $ev);
                        if (NoccException::isException($ev)) {
                            error_log("Error reading filters for user '$user_key': ".$ev->getMessage());
                            $filters = null;
                            $ev = null;
                        }

                        $small_search = 'unseen ';
                        if (NOCC_Request::getBoolValue('reapply_filters')) {
                            $small_search = '';
                        }
                        if ($filters != null) {
                            foreach ($filters->filterset as $name => $filter) {
                                $filter_messages = $pop->search($small_search . $filter['SEARCH'], '', $ev);
                                if (is_array($filter_messages)) {
                                    $filter_to_folder = array();
                                    foreach ($filter_messages as $filt_msg_no) {
                                        if ($filter['ACTION'] == 'DELETE') {
                                            $pop->delete($filt_msg_no, $ev);
                                        } elseif (preg_match("/^MOVE:(.+)$/", $filter['ACTION'], $filter_to_folder)) {
                                            $pop->mail_move($filt_msg_no, $filter_to_folder[1], $ev);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $pop->expunge($ev);
                    if (NoccException::isException($ev)) {
                        error_log("Error expunging mail for user '$user_key': ".$ev->getMessage());
                        $ev = null;
                    }
                }
            }
        }

        // If we get this far, consider ourselves logged in
        $_SESSION['nocc_loggedin'] = 1;

        // Fetch message list
        $tab_mail = array();
        $skip = 0;
        $num_msg = $pop->num_msg();
        if (isset($_REQUEST['skip']))
            $skip = $_REQUEST['skip'];
        if ($num_msg > 0) {
            //TODO: Remove later try/catch block!
            try {
                $tab_mail = inbox($pop, $skip);
            }
            catch (Exception $ex) {
                $ev = new NoccException($ex->getMessage());
            }
        }

        if (NoccException::isException($ev)) {
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/html_top_table.php';
        if (count($tab_mail) < 1) {
            // the mailbox is empty
            include './html/no_mail.php';
        } else {
            // there are messages, we display
            while ($tmp = array_shift($tab_mail)) {
                require './html/html_inbox.php';
            }
        }

        $new_folders = array();
        $list_of_folders = "";

        // If we show it twice, the bottom folder select is sent, and might be
        // wrong.
        if ($pop->is_imap()) {
            if (isset($_REQUEST['sort'])) {
                $subscribed = $_SESSION['subscribed'];
            }
            else {
                try {
                    // gather list of folders for menu_inbox_status
                    $subscribed = $pop->getsubscribed($ev);

                    $_SESSION['subscribed'] = $subscribed;
                }
                catch (Exception $ex) {
                    //TODO: Show error without NoccException!
                    $ev = new NoccException($ex->getMessage());
                    require './html/header.php';
                    require './html/error.php';
                    require './html/footer.php';
                    break;
                }
            }

            foreach ($subscribed as $folder) {
                if (isset($_REQUEST['sort'])) {
                    $list_of_folders =  $_SESSION['list_of_folders'];
                } else {
                    $folder_name = substr(strstr($folder->name, '}'), 1);

                    $status = $pop->status($folder->name);
                    if (!($status == false) && ($status->unseen > 0)) {
                        if (!in_array($folder_name, $new_folders)) {
                            if (isset($unseen_messages)) {
                                $unseen_count = count($unseen_messages);
                            } else {
                                $unseen_count = 0;
                            }
                            $list_of_folders .= ' <a href="' . $_SERVER['PHP_SELF'] . '?folder=' . $folder_name
                            . '">' . $folder_name . " ($status->unseen)" . '</a>';
                            $_SESSION['list_of_folders'] = $list_of_folders;
                            array_push($new_folders, $folder_name);
                        }
                    }
                }
            }
        }

        require './html/html_bottom_table.php';
        require './html/menu_inbox.php';
        require './html/footer.php';

        $pop->close();

        break;
}

function add_signature(&$body) {
    $user_prefs = $_SESSION['nocc_user_prefs'];
    if (isset($user_prefs->signature)) {
        // Add signature with separation if needed
        if (isset($user_prefs->sig_sep) && $user_prefs->sig_sep)
            $body .= "\r\n\r\n"."-- \r\n".$user_prefs->signature;
        else
            $body .= "\r\n\r\n".$user_prefs->signature;
    }
}

function add_quoting(&$mail_body, $content) {
    global $user_prefs, $conf;
    global $original_msg, $html_from_label, $html_to_label, $html_sent_label, $html_subject_label;
    global $html_wrote;

    if ($user_prefs->getOutlookQuoting()) {
        $mail_body = $original_msg . "\n" . $html_from_label . ' ' . $content['from'] . "\n" . $html_to_label . ' '
                . $content['to'] . "\n" . $html_sent_label .' ' . $content['complete_date'] . "\n" . $html_subject_label
                . ' '. $content['subject'] . "\n\n" . enh_html_entity_decode(strip_tags($content['body'], ''));
    }
    else {
        if (isset($conf->enable_reply_leadin)
                && $conf->enable_reply_leadin == true
                && isset($user_prefs->reply_leadin)
                && ($user_prefs->reply_leadin != '')) {
            $parsed_leadin = NOCCUserPrefs::parseLeadin($user_prefs->reply_leadin, $content);
            $mail_body = mailquote(enh_html_entity_decode(strip_tags($content['body'], '')), $parsed_leadin, '');
        }
        else {
            $stripped_content = enh_html_entity_decode(strip_tags($content['body'], ''));
            $mail_body = mailquote($stripped_content, $content['from'], $html_wrote);
        }
    }
}

function add_reply_to_subject($subject) {
    global $html_reply_short;

    $subjectStart = substr($subject, 0, strlen($html_reply_short));
    if (strcasecmp($subjectStart, $html_reply_short) != 0) { //if NOT start with localized "Re:" ...
        return $html_reply_short . ' ' . $subject;
    }
    return $subject;
}

?>
