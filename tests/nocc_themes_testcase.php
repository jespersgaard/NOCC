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
        
        $this->assertEqual(0, $themes->count(), 'count() - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
    }

    function test2() {
        $themes = new NOCC_Themes('./themes', 'test1');
        
        $this->assertEqual(2, $themes->count(), 'count() - %s');
        $this->assertEqual('test1', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertEqual('test1', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
    }

    function test3() {
        $themes = new NOCC_Themes('./themes/', 'TEST1');
        
        $this->assertEqual(2, $themes->count(), 'count() - %s');
        $this->assertEqual('test1', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertEqual('test1', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
    }

    function test4() {
        $themes = new NOCC_Themes(array('bug'));
        
        $this->assertEqual(0, $themes->count(), 'count() - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
    }

    function test5() {
        $themes = new NOCC_Themes('./themes/', array('bug'));

        $this->assertEqual(2, $themes->count(), 'count() - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
    }

    function testExists() {
        $themes = new NOCC_Themes('./themes');
        
        $this->assertFalse(@$themes->exists(), 'exists() - %s');
        $this->assertFalse($themes->exists(array('bug')), 'exists(array("bug")) - %s');
        $this->assertFalse($themes->exists(''), 'exists("") - %s');
        $this->assertFalse($themes->exists('notexists'), 'exists("notexists") - %s');
        $this->assertTrue($themes->exists('test1'), 'exists("test1") - %s');
        $this->assertTrue($themes->exists('TEST1'), 'exists("TEST1") - %s');
    }

    function testSetDefaultThemeName() {
        $themes = new NOCC_Themes('./themes');

        $this->assertFalse(@$themes->setDefaultThemeName(), 'setDefaultThemeName() - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertFalse($themes->setDefaultThemeName(array('bug')), 'setDefaultThemeName(array("bug")) - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertFalse($themes->setDefaultThemeName(''), 'setDefaultThemeName("") - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertFalse($themes->setDefaultThemeName('notexists'), 'setDefaultThemeName("notexists") - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertFalse($themes->setDefaultThemeName('../../../../../../../etc/passwd%00'), 'setDefaultThemeName("passwd") - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertFalse($themes->setDefaultThemeName('<script>alert(document.cookie)</script>'), 'setDefaultThemeName("alert()") - %s');
        $this->assertEqual('standard', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertTrue($themes->setDefaultThemeName('test1'), 'setDefaultThemeName("test1") - %s');
        $this->assertEqual('test1', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
        $this->assertTrue($themes->setDefaultThemeName('TEST2'), 'setDefaultThemeName("TEST2") - %s');
        $this->assertEqual('test2', $themes->getDefaultThemeName(), 'getDefaultThemeName() - %s');
    }

    function testSetSelectedThemeName() {
        $themes = new NOCC_Themes('./themes');

        $this->assertFalse(@$themes->setSelectedThemeName(), 'setSelectedThemeName() - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertFalse($themes->setSelectedThemeName(array('bug')), 'setSelectedThemeName(array("bug")) - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertFalse($themes->setSelectedThemeName(''), 'setSelectedThemeName("") - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertFalse($themes->setSelectedThemeName('../../../../../../../etc/passwd%00'), 'setSelectedThemeName("passwd") - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertFalse($themes->setSelectedThemeName('<script>alert(document.cookie)</script>'), 'setSelectedThemeName("alert()") - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertFalse($themes->setSelectedThemeName('notexists'), 'setSelectedThemeName("notexists") - %s');
        $this->assertEqual('standard', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertTrue($themes->setSelectedThemeName('test1'), 'setSelectedThemeName("test1") - %s');
        $this->assertEqual('test1', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
        $this->assertTrue($themes->setSelectedThemeName('TEST2'), 'setSelectedThemeName("TEST2") - %s');
        $this->assertEqual('test2', $themes->getSelectedThemeName(), 'getSelectedThemeName() - %s');
    }
}

$test = &new NOCC_Themes_TestCase();
$test->run(new HtmlReporter());
?>