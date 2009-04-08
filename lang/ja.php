<?php
/**
 * Language configuration file for NOCC
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Translations
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

/** Japanese (日本語)
 *
 * @ingroup Language
 * @file
 *
 * @author Fryed-peach
 * @author Tadashi Jokagi <elf2000@users.sourceforge.net>
 * @author 青子守歌
 */

$charset = 'UTF-8';
$lang_locale = 'ja_JP.UTF-8';
$lang_dir = 'ltr';
$default_date_format = '%Y年%m月%d日';
$no_locale_date_format = '%Y-%m-%d';
$default_time_format = '%H:%M';
$err_user_empty = 'ログイン欄が空です';
$err_passwd_empty = 'パスワード欄が空です';
$alt_delete = '選択メッセージ削除';
$alt_delete_one = 'メッセージ削除';
$alt_new_msg = '新規メッセージ';
$alt_reply = '著者に返信';
$alt_reply_all = '全員に返信';
$alt_forward = '転送';
$alt_next = '次';
$alt_prev = '前';
$title_next_page = '次のページ';
$title_prev_page = '前のページ';
$title_next_msg = '次のメッセージ';
$title_prev_msg = '前のメッセージ';
$html_on = 'オン';
$html_theme = 'テーマ';
$html_lang = '言語';
$html_welcome = 'ようこそ';
$html_login = 'ログイン';
$html_passwd = 'パスワード';
$html_submit = '送信';
$html_help = 'ヘルプ';
$html_server = 'サーバー';
$html_wrong = 'ログインまたはパスワードは正しくありません。';
$html_retry = '再挑戦';
$html_remember = '設定を覚える';
$html_msgperpage = 'ページ毎メッセージ';
$html_preferences = '設定';
$html_full_name = 'フルネーム';
$html_email_address = '電子メールアドレス';
$html_ccself = '自分を Cc に';
$html_hide_addresses = 'アドレスを隠す';
$html_outlook_quoting = 'Outlook スタイルの引用';
$html_reply_to = '返信先';
$html_use_signature = '署名を使う';
$html_signature = '署名';
$html_reply_leadin = '返信の先頭';
$html_prefs_updated = '設定を更新しました。';
$html_manage_folders_link = 'IMAP フォルダー管理';
$html_manage_filters_link = '電子メールフィルター管理';
$html_use_graphical_smilies = 'グラフィカルな絵文字を使用';
$html_sent_folder = '専用のフォルダーに送信メールをコピーしました';
$html_trash_folder = '削除されたメールを専用のフォルダへ移動する';
$html_colored_quotes = '色つき引用';
$html_display_struct = '構造化されたテキストを表示';
$html_send_html_mail = 'HTML形式でメールを送る';
$html_folders = 'フォルダ';
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
$html_folder_to = 'へ';
$html_filter_remove = '削除';
$html_filter_body = 'メッセージ本文';
$html_filter_subject = 'メッセージ件名';
$html_filter_to = 'To フィールド';
$html_filter_cc = 'Cc フィールド';
$html_filter_from = 'From フィールド';
$html_filter_change_tip = 'フィルターを変更するには、単純に上書きしてください。';
$html_reapply_filters = 'すべてのフィルターを再適用する';
$html_filter_contains = '含む';
$html_filter_name = 'フィルター名';
$html_filter_action = 'フィルター操作';
$html_filter_moveto = '次へ移動：';
$html_select_one = '--ひとつ選択--';
$html_and = 'と';
$html_new_msg_in = '新規メッセージがあるフォルダー:';
$html_or = 'または';
$html_move = '移動';
$html_copy = 'コピー';
$html_messages_to = '対象フォルダー:';
$html_gotopage = 'ページ移動';
$html_gotofolder = 'フォルダーに移動';
$html_other_folders = 'フォルダー一覧';
$html_page = 'ページ';
$html_of = 'の';
$html_view_header = 'ヘッダーを表示';
$html_remove_header = 'ヘッダーを隠す';
$html_inbox = '受信箱';
$html_new_msg = '作成';
$html_reply = '返信';
$html_reply_short = '返';
$html_reply_all = '全員に返信';
$html_forward = '転送';
$html_forward_short = '転送';
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
$html_sort = '並び替え';
$html_from = '差出人';
$html_subject = '件名';
$html_date = '日付';
$html_sent = '送信';
$html_wrote = '書きました';
$html_size = 'サイズ';
$html_totalsize = '総容量';
$html_kb = 'キロバイト';
$html_mb = 'メガバイト';
$html_gb = 'ギガバイト';
$html_bytes = 'バイト';
$html_filename = 'ファイル名';
$html_to = '宛先';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = '件名なし';
$html_send = '送信';
$html_cancel = '取り消し';
$html_no_mail = 'メッセージがありません';
$html_logout = 'ログアウト';
$html_msg = 'メッセージ';
$html_msgs = '個のメッセージ';
$html_configuration = 'このサーバーはセットアップされていません!';
$html_priority = '優先度';
$html_lowest = '最低';
$html_low = '低';
$html_normal = '通常';
$html_high = '高';
$html_highest = '最高';
$html_receipt = 'メール受領通知を要求する';
$html_select = '選択';
$html_select_all = '選択反転';
$html_loading_image = '画像読み込み中';
$html_send_confirmed = 'メッセージの配送を受け付けました。';
$html_no_sendaction = '操作が指定されていません。JavaScript を有効にして試してください。';
$html_error_occurred = 'エラーが発生しました';
$html_prefs_file_error = '設定ファイルを書き込むために開けません。';
$html_wrap = '送信メールをワードラップ:';
$html_wrap_none = 'なし';
$html_usenet_separator = '署名の前に Usenet セパレーター ("-- \n")';
$html_mark_as = 'マークを';
$html_read = '既読';
$html_unread = '未読';
$html_encoding = '文字エンコーディング';
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
$original_msg = '-- 元のメッセージ --';
$to_empty = '「To」 フィールドは空に出来ません!';
$html_images_warning = 'セキュリティのため、遠隔の画像は表示されません。';
$html_images_display = '画像を表示';
$html_smtp_error_no_conn = 'SMTP 接続を開けません。';
$html_smtp_error_unexpected = '予期しない SMTP の反応:';
$lang_could_not_connect = 'サーバーに接続できません。';
$lang_invalid_msg_num = '間違ったメッセージ番号';
$html_file_upload_attack = 'ファイルアップロードアタックの可能性';
$html_invalid_email_address = '不正な電子メールアドレスです。';
$html_invalid_msg_per_page = '不正なページ中メッセージ番号です。';
$html_invalid_wrap_msg = '不正なメッセージ折り返し幅です。';
$html_seperate_msg_win = '分離ウィンドウのメッセージ';
$html_err_file_contacts = 'アドレス帳を書き込むためにファイルを開けませんでした。';
$html_session_file_error = 'セッションファイルを書き込みのために開くことができません。';
$html_login_not_allowed = 'このログインは接続許可されていません。';
$lang_err_send_delay = '2つのメールの合間を待たなければなりません';
$lang_seconds = '秒';
$html_search = '検索';
