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

require_once 'simpletest/unit_tester.php';
require_once 'simpletest/reporter.php';
require_once '../classes/nocc_languages.php';

class NOCC_Languages_TestCase extends UnitTestCase {

    function NOCC_Languages_TestCase() {
        $this->UnitTestCase('NOCC_Languages');
    }

    function test1() {
        $languages = new NOCC_Languages('');
        
        $this->assertEqual(0, $languages->count(), 'count() - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
    }

    function test2() {
        $languages = new NOCC_Languages('./lang', 'de');
        
        $this->assertEqual(3, $languages->count(), 'count() - %s');
        $this->assertEqual('de', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertEqual('de', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
    }

    function test3() {
        $languages = new NOCC_Languages('./lang/', 'DE');
        
        $this->assertEqual(3, $languages->count(), 'count() - %s');
        $this->assertEqual('de', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertEqual('de', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
    }

    function test4() {
        $languages = new NOCC_Languages(array('bug'));
        
        $this->assertEqual(0, $languages->count(), 'count() - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
    }

    function test5() {
        $languages = new NOCC_Languages('./lang/', array('bug'));
        
        $this->assertEqual(3, $languages->count(), 'count() - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
    }

    function testExists() {
        $languages = new NOCC_Languages('./lang');
        
        $this->assertFalse(@$languages->exists(), 'exists() - %s');
        $this->assertFalse($languages->exists(array('bug')), 'exists(array("bug")) - %s');
        $this->assertFalse($languages->exists(''), 'exists("") - %s');
        $this->assertFalse($languages->exists('notexists'), 'exists("notexists") - %s');
        $this->assertTrue($languages->exists('de'), 'exists("de") - %s');
        $this->assertTrue($languages->exists('DE'), 'exists("DE") - %s');
    }

    function testSetDefaultLangId() {
        $languages = new NOCC_Languages('./lang');
        
        $this->assertFalse(@$languages->setDefaultLangId(), 'setDefaultLangId() - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertFalse($languages->setDefaultLangId(array('bug')), 'setDefaultLangId(array("bug")) - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertFalse($languages->setDefaultLangId(''), 'setDefaultLangId("") - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertFalse($languages->setDefaultLangId('notexists'), 'setDefaultLangId("notexists") - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertFalse($languages->setDefaultLangId('../../../../../../../etc/passwd%00'), 'setDefaultLangId("passwd") - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertFalse($languages->setDefaultLangId('<script>alert(document.cookie)</script>'), 'setDefaultLangId("alert()") - %s');
        $this->assertEqual('en', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertTrue($languages->setDefaultLangId('se'), 'setDefaultLangId("se") - %s');
        $this->assertEqual('se', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
        $this->assertTrue($languages->setDefaultLangId('DE'), 'setDefaultLangId("DE") - %s');
        $this->assertEqual('de', $languages->getDefaultLangId(), 'getDefaultLangId() - %s');
    }

    function testSetSelectedLangId() {
        $languages = new NOCC_Languages('./lang');
        
        $this->assertFalse(@$languages->setSelectedLangId(), 'setSelectedLangId() - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertFalse($languages->setSelectedLangId(array('bug')), 'setSelectedLangId(array("bug")) - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertFalse($languages->setSelectedLangId(''), 'setSelectedLangId("") - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertFalse($languages->setSelectedLangId('../../../../../../../etc/passwd%00'), 'setSelectedLangId("passwd") - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertFalse($languages->setSelectedLangId('<script>alert(document.cookie)</script>'), 'setSelectedLangId("alert()") - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertFalse($languages->setSelectedLangId('notexists'), 'setSelectedLangId("notexists") - %s');
        $this->assertEqual('en', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertTrue($languages->setSelectedLangId('se'), 'setSelectedLangId("se") - %s');
        $this->assertEqual('se', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
        $this->assertTrue($languages->setSelectedLangId('DE'), 'setSelectedLangId("DE") - %s');
        $this->assertEqual('de', $languages->getSelectedLangId(), 'getSelectedLangId() - %s');
    }

    function testParseAcceptLanguageHeader() {
        $this->assertEqual(0, count(@NOCC_Languages::parseAcceptLanguageHeader()), 'parseHttpAcceptLanguage() - %s');
        $this->assertEqual(0, count(NOCC_Languages::parseAcceptLanguageHeader(array('bug'))), 'parseHttpAcceptLanguage(array("bug")) - %s');
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