<?php
/**
 * Testcase for NOCC_Themes
 *
 * Copyright 2009 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Tests
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once('simpletest/unit_tester.php');
require_once('simpletest/reporter.php');
require_once('../classes/nocc_themes.php');

class NOCC_Themes_TestCase extends UnitTestCase {

    function NOCC_Themes_TestCase() {
        $this->UnitTestCase('NOCC_Themes');
    }

    function test1() {
        $themes = new NOCC_Themes('');
        
        $this->assertEqual(0, $themes->getCount(), 'getCount() - %s');
    }

    function test2() {
        $themes = new NOCC_Themes('./themes');
        
        $this->assertEqual(2, $themes->getCount(), 'getCount() - %s');
    }

    function test3() {
        $themes = new NOCC_Themes('./themes/');
        
        $this->assertEqual(2, $themes->getCount(), 'getCount() - %s');
    }
}

$test = &new NOCC_Themes_TestCase();
$test->run(new HtmlReporter());
?>