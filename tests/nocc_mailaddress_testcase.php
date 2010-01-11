<?php
/**
 * Testcase for NOCC_MailAddress
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
require_once '../classes/nocc_mailaddress.php';

class NOCC_MailAddress_TestCase extends UnitTestCase {

    function NOCC_MailAddress_TestCase() {
        $this->UnitTestCase('NOCC_MailAddress');
    }

    function test1() {
        $mailAddress = new NOCC_MailAddress('');
        
        $this->assertEqual('', $mailAddress->getName(), 'getName() - %s');
        $this->assertEqual('', $mailAddress->getAddress(), 'getAddress() - %s');
    }

    function test2() {
        $mailAddress = new NOCC_MailAddress('foo@bar.org');

        $this->assertEqual('', $mailAddress->getName(), 'getName() - %s');
        $this->assertEqual('foo@bar.org', $mailAddress->getAddress(), 'getAddress() - %s');
    }

    function test3() {
        $mailAddress = new NOCC_MailAddress('Foo Bar <foo@bar.org>');
        
        $this->assertEqual('Foo Bar', $mailAddress->getName(), 'getName() - %s');
        $this->assertEqual('foo@bar.org', $mailAddress->getAddress(), 'getAddress() - %s');
    }

    function test4() {
        $mailAddress = new NOCC_MailAddress('"Foo Bar" <foo@bar.org>');

        $this->assertEqual('Foo Bar', $mailAddress->getName(), 'getName() - %s');
        $this->assertEqual('foo@bar.org', $mailAddress->getAddress(), 'getAddress() - %s');
    }

    function test5() {
        $mailAddress = new NOCC_MailAddress('bug');

        $this->assertEqual('', $mailAddress->getName(), 'getName() - %s');
        $this->assertEqual('', $mailAddress->getAddress(), 'getAddress() - %s');
    }

    function testIsValidAddress() {
        $this->assertFalse(NOCC_MailAddress::isValidAddress(''));
        $this->assertFalse(NOCC_MailAddress::isValidAddress('bug'), 'bug - %s');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo@bar.org'), 'foo@bar.org - %s');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo.foo@bar.bar.org'), 'foo.foo@bar.bar.org - %s');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo-foo@bar-bar.org'), 'foo-foo@bar-bar.org - %s');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo_foo@bar.org'), 'foo_foo@bar.org - %s');
        $this->assertFalse(NOCC_MailAddress::isValidAddress('foo@bar'), 'foo@bar - %s');
        $this->assertFalse(NOCC_MailAddress::isValidAddress('bar.org'), 'bar.org - %s');
        $this->assertFalse(NOCC_MailAddress::isValidAddress('foo @ bar.org'), 'foo @ bar.org - %s');
    }
}

$test = &new NOCC_MailAddress_TestCase();
$test->run(new HtmlReporter());
?>