<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ja.php,v 1.9 2006/10/13 19:56:59 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the japanese language
 * Translation by Tadashi Jokagi <elf2000@users.sourceforge.net>
 */
//  EN-Revision: 1.84
$charset = 'UTF-8';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'ja_JP.UTF-8';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y 年 %m 月 %d 日'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'ログインフィールドが空です。';
$err_passwd_empty = 'パスワードフィールドが空です。';


// html message

$alt_delete = '選択メッセージ削除';
$alt_delete_one = 'メッセージ削除';
$alt_new_msg = '新規メッセージ';
$alt_reply = '著者に返信';
$alt_reply_all = '全員に返信';
$alt_forward = '転送';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = '次のメッセージ';
$title_prev_msg = '前のメッセージ';
$html_on = 'オン';
$html_theme = 'テーマ';

// index.php

$html_lang = '言語';
$html_welcome = 'ようこそ';
$html_login = 'ログイン';
$html_passwd = 'パスワード';
$html_submit = '送信';
$html_help = 'ヘルプ';
$html_server = 'サーバー';
$html_wrong = 'ログインまたはパスワードは正しくありません。';
$html_retry = '再挑戦';
$html_remember = "設定を覚える";

// prefs.php

$html_msgperpage = 'ページ毎メッセージ';
$html_preferences = '設定';
$html_full_name = 'フルネーム';
$html_email_address = '電子メールアドレス';
$html_ccself = '自分を Cc に';
$html_hide_addresses = 'アドレスを隠す';
$html_outlook_quoting = 'Outlook スタイルの引用';
$html_reply_to = 'Reply to'; //to translate
$html_use_signature = '署名を使う';
$html_signature = '署名';
$html_reply_leadin = 'Reply Leadin'; //to translate
$html_prefs_updated = '設定を更新しました。';
$html_manage_folders_link = 'IMAP フォルダー管理';
$html_manage_filters_link = '電子メールフィルター管理';
$html_use_graphical_smilies = 'グラフィカルな絵文字を使用';
$html_sent_folder = '専用のフォルダーに送信メールをコピーしました';
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate

// folders.php
$html_folders_create_failed = 'フォルダーを作成できませんでした!';
$html_folders_sub_failed = 'フォルダーを購読出来ませんで強いた!';
$html_folders_unsub_failed = 'フォルダーを未購読に出来ませんでした!';
$html_folders_rename_failed = 'フォルダー名を変更出来ませんでした!';
$html_folders_updated = 'フォルダーを更新しました';
$html_folder_subscribe = 'フォルダー購読 フォルダー:';
$html_folder_rename = '名称変更';
$html_folder_create = '新しいフォルダー名:';
$html_folder_remove = 'フォルダー購読をやめる フォルダー:';
$html_folder_delete = '削除';
$html_folder_to = 'to'; //to translate

// filters.php
$html_filter_remove = '削除';
$html_filter_body = 'メッセージ本文';
$html_filter_subject = 'メッセージ件名';
$html_filter_to = 'To フィールド';
$html_filter_cc = 'Cc フィールド';
$html_filter_from = 'From フィールド';
$html_filter_change_tip = 'To change a filter simply overwrite it.'; //to translate
$html_reapply_filters = 'すべてのフィルターを再適用する';
$html_filter_contains = '含む';
$html_filter_name = 'フィルター名';
$html_filter_action = 'フィルター操作';
$html_filter_moveto = 'Move to'; //to translate

// Other pages
$html_select_one = '--ひとつ選択--';
$html_and = 'And'; //to translate
$html_new_msg_in = '新規メッセージがあるフォルダー:';
$html_or = 'または';
$html_move = '移動';
$html_copy = 'コピー';
$html_messages_to = '対象フォルダー:';
$html_gotopage = 'ページ移動';
$html_gotofolder = 'フォルダーに移動';
$html_other_folders = 'フォルダー一覧';
$html_page = 'ページ';
$html_of = 'of'; //to translate
$html_view_header = 'ヘッダーを表示';
$html_remove_header = 'ヘッダーを隠す';
$html_inbox = '受信箱';
$html_new_msg = '作成';
$html_reply = '返信';
$html_reply_short = 'Re'; //to translate
$html_reply_all = '全員に返信';
$html_forward = '転送';
$html_forward_short = 'Fw'; //to translate
$html_forward_info = '転送されたメッセージはひとつの添付として送信されるでしょう。';
$html_delete = '削除';
$html_new = '新規';
$html_mark = '削除';
$html_att = '添付';
$html_atts = '添付';
$html_att_unknown = '[不明]';
$html_attach = '添付';
$html_attach_forget = 'メッセージを送信する前に添付しなければなりません!';
$html_attach_delete = '選択を削除';
$html_attach_none = '添付するファイルを選択しなければなりません!';
$html_sort_by = 'ソート 基準';
$html_sort = 'Sort'; //to translate
$html_from = '差出人';
$html_subject = '件名';
$html_date = '日付';
$html_sent = '送信';
$html_wrote = 'wrote'; //to translate
$html_size = 'サイズ';
$html_totalsize = '総容量';
$html_kb = 'キロバイト';
$html_bytes = 'バイト';
$html_filename = 'ファイル名';
$html_to = '宛先';
$html_cc = 'Cc'; //to translate
$html_bcc = 'Bcc'; //to translate
$html_nosubject = '件名なし';
$html_send = '送信';
$html_cancel = '取り消し';
$html_no_mail = 'メッセージがありません';
$html_logout = 'ログアウト';
$html_msg = 'メッセージ';
$html_msgs = '個のメッセージ';
$html_configuration = 'このサーバーはセットアップされていません!';
$html_priority = '優先度';
$html_low = '低';
$html_normal = '通常';
$html_high = '高';
$html_receipt = 'メール受領通知を要求する';
$html_select = '選択';
$html_select_all = '選択反転';
$html_loading_image = '画像読み込み中';
$html_send_confirmed = 'メッセージの配送を受け付けました。';
$html_no_sendaction = '操作が指定されていません。JavaScript を有効にして試してください。';
$html_error_occurred = 'エラーが発生しました';
$html_prefs_file_error = '設定ファイルを書き込むために開けません。';
$html_wrap = '送信メールをワードラップ:';
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = '署名の前に Usenet セパレーター ("-- \n")';
$html_mark_as = 'マークを';
$html_read = '既読';
$html_unread = '未読';
$html_encoding = '文字エンコーディング';

// Contacts manager
$html_add = '追加';
$html_contacts = 'アドレス帳';
$html_modify = '修正';
$html_back = '戻る';
$html_contact_add = 'アドレス帳新規追加';
$html_contact_mod = 'アドレス帳修正';
$html_contact_first = '名前';
$html_contact_last = '苗字';
$html_contact_nick = 'ニック';
$html_contact_mail = 'メール';
$html_contact_list = 'アドレス帳 所有者:';
$html_contact_del = 'コンタクトリストから';

$html_contact_err1 = '最大のアドレス帳数:';
$html_contact_err2 = 'アドレス帳に追加できませんでした。';
$html_contact_err3 = 'アドレス帳へのアクセス権限を持っていません。';
$html_del_msg = '選択メッセージを削除しますか?';
$html_down_mail = 'ダウンロード';

$original_msg = '-- Original Message --'; //to translate
$to_empty = '「To」 フィールドは空に出来ません!';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'SMTP 接続を開けません。';
$html_smtp_error_unexpected = '予期しない SMTP の反応:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'サーバーに接続できません。';
$lang_invalid_msg_num = '間違ったメッセージ番号';

$html_file_upload_attack = 'ファイルアップロードアタックの可能性';
$html_invalid_email_address = '不正な電子メールアドレスです。';
$html_invalid_msg_per_page = '不正なページ中メッセージ番号です。';
$html_invalid_wrap_msg = '不正なメッセージ折り返し幅です。';
$html_seperate_msg_win = '分離ウィンドウのメッセージ';

// Exceptions
$html_err_file_contacts = 'アドレス帳を書き込むためにファイルを開けませんでした。';
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
?>
