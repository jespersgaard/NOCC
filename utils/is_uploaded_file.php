<?php
/**
 * Function is_uploaded_file() in case PHP < 4.0.2 is used
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Utilities
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

function is_uploaded_file($filename)
{
    if (!$tmp_file = ini_get('upload_tmp_dir'))
        $tmp_file = dirname(tempnam('', ''));
    $tmp_file .= '/' . basename($filename);
    return (ereg_replace('/+', '/', $tmp_file) == $filename);
}
?>