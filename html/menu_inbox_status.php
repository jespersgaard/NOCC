<tr>
 <td colspan="7">
<table border="0" align="center" cellpadding="5" cellspacing="0" width="100%">
    <tr bgcolor="<?php echo $glob_theme->inbox_text_color ?>">
        <td align="right" class="inbox">
            <?php echo $html_new_msg_in ?>
        </td>
        <td align="left" class="inbox">
            <?php
                $box_array = array();
                $boxes = $pop->getsubscribed();

                $temp_box = new nocc_imap($servr, $box, $user, $passwd, $ev, OP_READONLY|OP_HALFOPEN);

                while(list($junk,$box) = each($boxes)) {
                    if ($temp_box->reopen($box->name, OP_READONLY)) {
                        $test = $temp_box->search('UNSEEN');
                        if (is_array($test) && count($test) > 1) {
                            list($junk,$name) = split("$servr}", $temp_box->utf7_decode($box->name));
                            if (!(in_array($name, $box_array))) {
                                array_push($box_array, $name);
                            }
                        }
                    }
                }
                $temp_box->close();

                $box_line = array();
                while(list($junk,$name) = each($box_array)) {
                    array_push($box_line, ' <a href="'.$PHP_SELF."?folder=$name\"> $name </a> ");
                }

                echo join('|', $box_line);
            ?>
        </td>
    </tr>
</table>
 </td>
</tr>
