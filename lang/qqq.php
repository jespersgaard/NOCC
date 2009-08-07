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

/** Message documentation (Message documentation)
 *
 * See the qqq 'language' for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Lloffiwr
 * @author McDutchie
 * @author Purodha
 * @author Siebrand
 */

$lang_locale = 'What language to use (Here, english US --> en_US). See [http://unicode.org/cldr/apps/survey CLDR] for more information';
$lang_dir = '"ltr" if your language uses left-to-right script, "rtl" if right-to-left. Default is ltr.';
$default_date_format = 'What format string should be passed to strftime() for messages sent on days other than today?';
$no_locale_date_format = 'If the locale is not implemented on the host, how we display the date. %-signs, and the letters following them, indicate parts of a date. So do not translate them, but adjust the whole date pattern to the format used in your languages environment.';
$default_time_format = 'What format string should be passed to strftime() for messages sent today? %-signs, and the letters following them, indicate parts of a time. So do not translate them, but adjust the entire pattern to the format used in your languages environment.';
$alt_new_msg = '{{Identical|New messages}}';
$alt_next = '{{Identical|Next}}';
$alt_prev = '{{Identical|Previous}}';
$title_next_page = '{{Identical|Next page}}';
$title_prev_page = '{{Identical|Previous page}}';
$html_passwd = '{{Identical|Password}}';
$html_help = '{{Identical|Help}}';
$html_lang_label = '{{Identical|Language}}';
$html_msgperpage_label = 'Text before an input box in the user\'s \'preferences\'. The user chooses the number of messages to display together on each page of a list of messages.';
$html_preferences = '{{Identical|Preferences}}';
$html_signature = '{{Identical|Signature}}';
$html_signature_label = '{{Identical|Signature}}';
$html_display_struct = 'This is a prompt of a yes/no switch. If set to true (yes), NOCC will render few simple formatting options commonly used in plaintext ASCII e-mail via html markup, such as:
<span style="white-space:nowrap">"<code>+-</code>" → "&plusmn;"</span>, and
<span style="white-space:nowrap">"<code>xyz^2</code>" → "xyz<sup>2</sup>"</span>, and
<span style="white-space:nowrap">"<code>*strong*</code>" → "<strong>strong</strong>"</span>, and
<span style="white-space:nowrap">"<code>/emphasised/</code>" → "<em>emphasised</em>"</span>, and
<span style="white-space:nowrap">"<code>_underlined_</code>" → "<u>underlined</u>"</span>, and
<span style="white-space:nowrap">"<code>|code|</code>" → "<code>code</code>"</span>.';
$html_folder_subscribe = 'Part of the interface for managing folders, see the [[Translating talk:NOCC#NOCC_screenshots|screenshot]].';
$html_folder_rename = 'Part of the interface for managing folders, see the [[Translating talk:NOCC#NOCC_screenshots|screenshot]]. It appears in the option to rename a folder: \'Rename [input box to select folder to be renamed] to [input box to write new name]\'.

{{Identical|Rename}}';
$html_folder_create = 'Part of the interface for managing folders, see the [[Translating talk:NOCC#NOCC_screenshots|screenshot]].';
$html_folder_remove = 'Part of the interface for managing folders, see the [[Translating talk:NOCC#NOCC_screenshots|screenshot]].';
$html_folder_delete = 'Part of the interface for managing folders, see the [[Translating talk:NOCC#NOCC_screenshots|screenshot]].

{{Identical|Delete}}';
$html_folder_to = 'Part of the interface for managing folders, see the [[Translating talk:NOCC#NOCC_screenshots|screenshot]]. It appears in the option to rename a folder: \'Rename [input box to select folder to be renamed] to [input box to write new name]\'.';
$html_filter_remove = '{{Identical|Delete}}';
$html_filter_contains = 'Used in the e-mail filter settings form. See [[:File:Nocc filter.png|screenshot]] for usage.';
$html_and = '{{Identical|And}}

The word is used as \'And\' for three filter fields, each on a row of its own. See [[:File:Nocc filter.png|screenshot of the NOCC Filter preferences]].';
$html_or = '{{Identical|Or}}';
$html_move = '{{Identical|Move}}';
$html_page = '{{Identical|Page}}';
$html_of = 'Appears at the top of a mailbox, to navigate between the pages of a mailbox. \'of\' is part of \'Page x of y\', where n is a page number in an input box and y is the total number of pages in the mailbox. See the [[Translating_talk:NOCC#NOCC_screenshots|screenshot]].';
$html_reply_short = 'Appears at the beginning of the subject box when replying to a message. It is short for reply. See the [[Translating_talk:NOCC#NOCC_screenshots|screenshot]].';
$html_delete = '{{Identical|Delete}}';
$html_new = '{{Identical|New}}';
$html_mark = '{{Identical|Delete}}';
$html_att_unknown = '{{Identical|Unknown}}';
$html_attach_delete = 'This is a button label which appears under the list of attached files when writing an e-mail. When this button is clicked all selected file attachments are removed from the e-mail.';
$html_subject = '{{Identical|Subject}}';
$html_date = '{{Identical|Date}}';
$html_date_label = '{{Identical|Date}}';
$html_wrote = 'The text \'{email sender} wrote\' appears on the reply, before the original message.';
$html_size = '{{Identical|Size}}';
$html_filename = '{{Identical|Filename}}';
$html_send = '{{Identical|Send}}';
$html_cancel = '{{Identical|Cancel}}';
$html_lowest = 'Option in the drop-down box for selecting the priority for tagging an e-mail before sending it. The five options are lowest, low, normal, high and highest.';
$html_low = 'Option in the drop-down box for selecting the priority for tagging an e-mail before sending it. The five options are lowest, low, normal, high and highest.';
$html_normal = 'Option in the drop-down box for selecting the priority for tagging an e-mail before sending it. The five options are lowest, low, normal, high and highest.';
$html_high = 'Option in the drop-down box for selecting the priority for tagging an e-mail before sending it. The five options are lowest, low, normal, high and highest.';
$html_highest = 'Option in the drop-down box for selecting the priority for tagging an e-mail before sending it. The five options are lowest, low, normal, high and highest.';
$html_wrap_none = '{{Identical|None}}';
$html_add = '{{Identical|Add}}';
$html_contact_mod = 'This means the same as \'amend the details of a contact\'.';
$html_contact_list = '%1$s is the username';
$html_down_mail = '{{Identical|Download}}';
$html_search = '{{Identical|Search}}';
