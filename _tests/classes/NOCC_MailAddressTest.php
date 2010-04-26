<?php
/**
 * Test cases for NOCC_MailAddress.
 *
 * Copyright 2009-2010 Tim Gerundt <tim@gerundt.de>
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

require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__).'/../../classes/nocc_mailaddress.php';

/**
 * Test class for NOCC_MailAddress.
 */
class NOCC_MailAddressTest extends PHPUnit_Framework_TestCase {
    /**
     * @var NOCC_MailAddress
     */
    protected $mailAddress1;

    /**
     * @var NOCC_MailAddress
     */
    protected $mailAddress2;

    /**
     * @var NOCC_MailAddress
     */
    protected $mailAddress3;

    /**
     * @var NOCC_MailAddress
     */
    protected $mailAddress4;

    /**
     * @var NOCC_MailAddress
     */
    protected $mailAddress5;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->mailAddress1 = new NOCC_MailAddress('');
        $this->mailAddress2 = new NOCC_MailAddress('foo@bar.org');
        $this->mailAddress3 = new NOCC_MailAddress('Foo Bar <foo@bar.org>');
        $this->mailAddress4 = new NOCC_MailAddress('"Foo Bar" <foo@bar.org>');
        $this->mailAddress5 = new NOCC_MailAddress('bug');
    }

    /**
     * Test case for getName().
     */
    public function testGetName() {
        $this->assertEquals('', $this->mailAddress1->getName());
        $this->assertEquals('', $this->mailAddress2->getName(), 'foo@bar.org');
        $this->assertEquals('Foo Bar', $this->mailAddress3->getName(), 'Foo Bar <foo@bar.org>');
        $this->assertEquals('Foo Bar', $this->mailAddress4->getName(), '"Foo Bar" <foo@bar.org>');
        $this->assertEquals('', $this->mailAddress5->getName(), 'bug');
    }

    /**
     * Test case for getAddress().
     */
    public function testGetAddress() {
        $this->assertEquals('', $this->mailAddress1->getAddress());
        $this->assertEquals('foo@bar.org', $this->mailAddress2->getAddress(), 'foo@bar.org');
        $this->assertEquals('foo@bar.org', $this->mailAddress3->getAddress(), 'Foo Bar <foo@bar.org>');
        $this->assertEquals('foo@bar.org', $this->mailAddress4->getAddress(), '"Foo Bar" <foo@bar.org>');
        //$this->assertEquals('', $this->mailAddress5->getAddress(), 'bug');
    }

    /**
     * Test case for isValidAddress().
     */
    public function testIsValidAddress() {
        $this->assertFalse(NOCC_MailAddress::isValidAddress(''));
        $this->assertFalse(NOCC_MailAddress::isValidAddress('bug'), 'bug');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo@bar.org'), 'foo@bar.org');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo.foo@bar.bar.org'), 'foo.foo@bar.bar.org');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo-foo@bar-bar.org'), 'foo-foo@bar-bar.org');
        $this->assertTrue(NOCC_MailAddress::isValidAddress('foo_foo@bar.org'), 'foo_foo@bar.org');
        $this->assertFalse(NOCC_MailAddress::isValidAddress('foo@bar'), 'foo@bar');
        $this->assertFalse(NOCC_MailAddress::isValidAddress('bar.org'), 'bar.org');
        $this->assertFalse(NOCC_MailAddress::isValidAddress('foo @ bar.org'), 'foo @ bar.org');
    }

    /**
     * Test case for chopAddress().
     */
    public function testChopAddress() {
        $this->assertEquals('', NOCC_MailAddress::chopAddress(''));
        $this->assertEquals('bug', NOCC_MailAddress::chopAddress('bug'), 'bug');
        $this->assertEquals('foo@bar.org', NOCC_MailAddress::chopAddress('foo@bar.org'), 'foo@bar.org');
        $this->assertEquals('Foo Bar', NOCC_MailAddress::chopAddress('Foo Bar <foo@bar.org>'), 'Foo Bar <foo@bar.org>');
        $this->assertEquals('"Foo Bar"', NOCC_MailAddress::chopAddress('"Foo Bar" <foo@bar.org>'), '"Foo Bar" <foo@bar.org>');
    }
}
?>
