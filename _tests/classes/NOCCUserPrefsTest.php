<?php
/**
 * Test cases for NOCCUserPrefs.
 *
 * Copyright 2010 Tim Gerundt <tim@gerundt.de>
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

require_once dirname(__FILE__).'/../../classes/user_prefs.php';

/**
 * Test class for NOCCUserPrefs.
 */
class NOCCUserPrefsTest extends PHPUnit_Framework_TestCase {
    /**
     * @var NOCCUserPrefs
     */
    protected $userPrefs1;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->userPrefs1 = new NOCCUserPrefs('');
    }

    /**
     * Test case for getHideAddresses().
     */
    public function testGetHideAddresses() {
        $this->assertFalse($this->userPrefs1->getHideAddresses());
    }

    /**
     * Test case for setHideAddresses().
     */
    public function testSetHideAddresses() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getHideAddresses(), 'default');
        $userPrefs->setHideAddresses(true);
        $this->assertTrue($userPrefs->getHideAddresses(), 'true');
        $userPrefs->setHideAddresses(false);
        $this->assertFalse($userPrefs->getHideAddresses(), 'false');
        $userPrefs->setHideAddresses(1);
        $this->assertTrue($userPrefs->getHideAddresses(), '1');
        $userPrefs->setHideAddresses(0);
        $this->assertFalse($userPrefs->getHideAddresses(), '0');
        $userPrefs->setHideAddresses('on');
        $this->assertTrue($userPrefs->getHideAddresses(), 'on');
        $userPrefs->setHideAddresses('off');
        $this->assertFalse($userPrefs->getHideAddresses(), 'off');
        $userPrefs->setHideAddresses('1');
        $this->assertTrue($userPrefs->getHideAddresses(), '"1"');
        $userPrefs->setHideAddresses('0');
        $this->assertFalse($userPrefs->getHideAddresses(), '"0"');
        $userPrefs->setHideAddresses('<invalid>');
        $this->assertFalse($userPrefs->getHideAddresses(), '<invalid>');
        $userPrefs->setHideAddresses(null);
        $this->assertFalse($userPrefs->getHideAddresses(), 'NULL');
    }

    /**
     * @todo Implement testRead().
     */
    public function testRead() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * Test case for readFromFile().
     */
    public function testReadFromFile() {
        $defaultUserPrefs = new NOCCUserPrefs('');

        $userPrefs1 = NOCCUserPrefs::readFromFile($defaultUserPrefs, './prefs/test1.pref', $ev);
        
        $this->assertEquals('Full Name', $userPrefs1->full_name, 'full_name');
        $this->assertEquals('foo@bar.org', $userPrefs1->email_address, 'email_address');
        $this->assertEquals(30, $userPrefs1->msg_per_page, 'msg_per_page');
        $this->assertTrue($userPrefs1->cc_self, 'cc_self');
        $this->assertTrue($userPrefs1->getHideAddresses(), 'getHideAddresses()');
        $this->assertTrue($userPrefs1->outlook_quoting, 'outlook_quoting');
        $this->assertTrue($userPrefs1->colored_quotes, 'colored_quotes');
        $this->assertTrue($userPrefs1->display_struct, 'display_struct');
        $this->assertTrue($userPrefs1->seperate_msg_win, 'seperate_msg_win');
        $this->assertEquals('', $userPrefs1->reply_leadin, 'reply_leadin');
        $this->assertEquals('This is a signature...', $userPrefs1->signature, 'signature');
        $this->assertTrue($userPrefs1->sig_sep, 'sig_sep');
        $this->assertTrue($userPrefs1->html_mail_send, 'html_mail_send');
        $this->assertTrue($userPrefs1->graphical_smilies, 'graphical_smilies');
        $this->assertTrue($userPrefs1->sent_folder, 'sent_folder');
        $this->assertEquals('Sent', $userPrefs1->sent_folder_name, 'sent_folder_name');
        $this->assertTrue($userPrefs1->trash_folder, 'trash_folder');
        $this->assertEquals('Trash', $userPrefs1->trash_folder_name, 'trash_folder_name');
        $this->assertEquals('de', $userPrefs1->lang, 'lang');
        $this->assertEquals('newlook', $userPrefs1->theme, 'theme');
        $this->assertEquals(0, $userPrefs1->dirty_flag, 'dirty_flag');

        $userPrefs2 = NOCCUserPrefs::readFromFile($defaultUserPrefs, './prefs/test2.pref', $ev);

        $this->assertEquals('Name Full', $userPrefs2->full_name, 'full_name');
        $this->assertEquals('bar@foo.org', $userPrefs2->email_address, 'email_address');
        $this->assertEquals(15, $userPrefs2->msg_per_page, 'msg_per_page');
        $this->assertFalse($userPrefs2->cc_self, 'cc_self');
        $this->assertFalse($userPrefs2->getHideAddresses(), 'getHideAddresses()');
        $this->assertFalse($userPrefs2->outlook_quoting, 'outlook_quoting');
        $this->assertFalse($userPrefs2->colored_quotes, 'colored_quotes');
        $this->assertFalse($userPrefs2->display_struct, 'display_struct');
        $this->assertFalse($userPrefs2->seperate_msg_win, 'seperate_msg_win');
        $this->assertEquals('', $userPrefs2->reply_leadin, 'reply_leadin');
        $this->assertEquals('', $userPrefs2->signature, 'signature');
        $this->assertFalse($userPrefs2->sig_sep, 'sig_sep');
        $this->assertFalse($userPrefs2->html_mail_send, 'html_mail_send');
        $this->assertFalse($userPrefs2->graphical_smilies, 'graphical_smilies');
        $this->assertFalse($userPrefs2->sent_folder, 'sent_folder');
        $this->assertEquals('', $userPrefs2->sent_folder_name, 'sent_folder_name');
        $this->assertFalse($userPrefs2->trash_folder, 'trash_folder');
        $this->assertEquals('', $userPrefs2->trash_folder_name, 'trash_folder_name');
        $this->assertEquals('en', $userPrefs2->lang, 'lang');
        $this->assertEquals('standard', $userPrefs2->theme, 'theme');
        $this->assertEquals(0, $userPrefs2->dirty_flag, 'dirty_flag');
    }

    /**
     * @todo Implement testCommit().
     */
    public function testCommit() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testValidate().
     */
    public function testValidate() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testParseLeadin().
     */
    public function testParseLeadin() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }
}
?>
