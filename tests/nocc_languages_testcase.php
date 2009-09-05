<?php
/**
 * Testcase for NOCC_Languages
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
require_once('../classes/nocc_languages.php');

class NOCC_Languages_TestCase extends UnitTestCase {

    function NOCC_Languages_TestCase() {
        $this->UnitTestCase('NOCC_Languages');
    }

    function test1() {
        $languages = new NOCC_Languages('');
        
        $this->assertEqual(0, $languages->count(), 'count() - %s');
    }

    function test2() {
        $languages = new NOCC_Languages('./lang');
        
        $this->assertEqual(3, $languages->count(), 'count() - %s');
    }

    function test3() {
        $languages = new NOCC_Languages('./lang/');
        
        $this->assertEqual(3, $languages->count(), 'count() - %s');
    }

    function testParseAcceptLanguageHeader() {
        $this->assertEqual(0, count(@NOCC_Languages::parseAcceptLanguageHeader()), 'parseHttpAcceptLanguage() - %s');
        $this->assertEqual(0, count(NOCC_Languages::parseAcceptLanguageHeader('')), 'parseHttpAcceptLanguage("") - %s');
        $this->assertEqual(1, count(NOCC_Languages::parseAcceptLanguageHeader('de')), 'parseHttpAcceptLanguage("de") - %s');
        $this->assertEqual(1, count(NOCC_Languages::parseAcceptLanguageHeader('de-de')), 'parseHttpAcceptLanguage("de-de") - %s');
        $this->assertEqual(2, count(NOCC_Languages::parseAcceptLanguageHeader('de,de-de')), 'parseHttpAcceptLanguage("de,de-de") - %s');
        $this->assertEqual(1, count(NOCC_Languages::parseAcceptLanguageHeader('de-de;q=0.5')), 'parseHttpAcceptLanguage("de-de;q=0.5") - %s');
        $this->assertEqual(4, count(NOCC_Languages::parseAcceptLanguageHeader('de-de,de;q=0.8,en-us;q=0.5,en;q=0.3')), 'parseHttpAcceptLanguage("de-de,de;q=0.8,en-us;q=0.5,en;q=0.3") - %s');
        $this->assertEqual(1, count(NOCC_Languages::parseAcceptLanguageHeader('De-De ; Q = 0.5')), 'parseHttpAcceptLanguage("de-de;q=0.5") - %s');
        $this->assertEqual(4, count(NOCC_Languages::parseAcceptLanguageHeader('   de-de , de; q=0.8, en-us;q=0.5, en;q=0.3')), 'parseHttpAcceptLanguage("   de-de , de; q=0.8, en-us;q=0.5, en;q=0.3") - %s');
        $this->assertEqual(0, count(NOCC_Languages::parseAcceptLanguageHeader(',,,;;;')), 'parseHttpAcceptLanguage(",,,;;;") - %s');
    }
}

$test = &new NOCC_Languages_TestCase();
$test->run(new HtmlReporter());
?>