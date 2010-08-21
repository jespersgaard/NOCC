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
     * Test case for getCcSelf().
     */
    public function testGetCcSelf() {
        $this->assertFalse($this->userPrefs1->getCcSelf());
    }

    /**
     * Test case for setCcSelf().
     */
    public function testSetCcSelf() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getCcSelf(), 'default');
        $userPrefs->setCcSelf(true);
        $this->assertTrue($userPrefs->getCcSelf(), 'true');
        $userPrefs->setCcSelf(false);
        $this->assertFalse($userPrefs->getCcSelf(), 'false');
        $userPrefs->setCcSelf(1);
        $this->assertTrue($userPrefs->getCcSelf(), '1');
        $userPrefs->setCcSelf(0);
        $this->assertFalse($userPrefs->getCcSelf(), '0');
        $userPrefs->setCcSelf('on');
        $this->assertTrue($userPrefs->getCcSelf(), 'on');
        $userPrefs->setCcSelf('off');
        $this->assertFalse($userPrefs->getCcSelf(), 'off');
        $userPrefs->setCcSelf('1');
        $this->assertTrue($userPrefs->getCcSelf(), '"1"');
        $userPrefs->setCcSelf('0');
        $this->assertFalse($userPrefs->getCcSelf(), '"0"');
        $userPrefs->setCcSelf('<invalid>');
        $this->assertFalse($userPrefs->getCcSelf(), '<invalid>');
        $userPrefs->setCcSelf(null);
        $this->assertFalse($userPrefs->getCcSelf(), 'NULL');
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
     * Test case for getOutlookQuoting().
     */
    public function testGetOutlookQuoting() {
        $this->assertFalse($this->userPrefs1->getOutlookQuoting());
    }

    /**
     * Test case for setOutlookQuoting().
     */
    public function testSetOutlookQuoting() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getOutlookQuoting(), 'default');
        $userPrefs->setOutlookQuoting(true);
        $this->assertTrue($userPrefs->getOutlookQuoting(), 'true');
        $userPrefs->setOutlookQuoting(false);
        $this->assertFalse($userPrefs->getOutlookQuoting(), 'false');
        $userPrefs->setOutlookQuoting(1);
        $this->assertTrue($userPrefs->getOutlookQuoting(), '1');
        $userPrefs->setOutlookQuoting(0);
        $this->assertFalse($userPrefs->getOutlookQuoting(), '0');
        $userPrefs->setOutlookQuoting('on');
        $this->assertTrue($userPrefs->getOutlookQuoting(), 'on');
        $userPrefs->setOutlookQuoting('off');
        $this->assertFalse($userPrefs->getOutlookQuoting(), 'off');
        $userPrefs->setOutlookQuoting('1');
        $this->assertTrue($userPrefs->getOutlookQuoting(), '"1"');
        $userPrefs->setOutlookQuoting('0');
        $this->assertFalse($userPrefs->getOutlookQuoting(), '"0"');
        $userPrefs->setOutlookQuoting('<invalid>');
        $this->assertFalse($userPrefs->getOutlookQuoting(), '<invalid>');
        $userPrefs->setOutlookQuoting(null);
        $this->assertFalse($userPrefs->getOutlookQuoting(), 'NULL');
    }

    /**
     * Test case for getColoredQuotes().
     */
    public function testGetColoredQuotes() {
        $this->assertTrue($this->userPrefs1->getColoredQuotes());
    }

    /**
     * Test case for setColoredQuotes().
     */
    public function testSetColoredQuotes() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertTrue($userPrefs->getColoredQuotes(), 'default');
        $userPrefs->setColoredQuotes(false);
        $this->assertFalse($userPrefs->getColoredQuotes(), 'false');
        $userPrefs->setColoredQuotes(true);
        $this->assertTrue($userPrefs->getColoredQuotes(), 'true');
        $userPrefs->setColoredQuotes(0);
        $this->assertFalse($userPrefs->getColoredQuotes(), '0');
        $userPrefs->setColoredQuotes(1);
        $this->assertTrue($userPrefs->getColoredQuotes(), '1');
        $userPrefs->setColoredQuotes('off');
        $this->assertFalse($userPrefs->getColoredQuotes(), 'off');
        $userPrefs->setColoredQuotes('on');
        $this->assertTrue($userPrefs->getColoredQuotes(), 'on');
        $userPrefs->setColoredQuotes('0');
        $this->assertFalse($userPrefs->getColoredQuotes(), '"0"');
        $userPrefs->setColoredQuotes('1');
        $this->assertTrue($userPrefs->getColoredQuotes(), '"1"');
        $userPrefs->setColoredQuotes('<invalid>');
        $this->assertTrue($userPrefs->getColoredQuotes(), '<invalid>');
        $userPrefs->setColoredQuotes(null);
        $this->assertTrue($userPrefs->getColoredQuotes(), 'NULL');
    }

    /**
     * Test case for getDisplayStructuredText().
     */
    public function testGetDisplayStructuredText() {
        $this->assertFalse($this->userPrefs1->getDisplayStructuredText());
    }

    /**
     * Test case for setDisplayStructuredText().
     */
    public function testSetDisplayStructuredText() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getDisplayStructuredText(), 'default');
        $userPrefs->setDisplayStructuredText(true);
        $this->assertTrue($userPrefs->getDisplayStructuredText(), 'true');
        $userPrefs->setDisplayStructuredText(false);
        $this->assertFalse($userPrefs->getDisplayStructuredText(), 'false');
        $userPrefs->setDisplayStructuredText(1);
        $this->assertTrue($userPrefs->getDisplayStructuredText(), '1');
        $userPrefs->setDisplayStructuredText(0);
        $this->assertFalse($userPrefs->getDisplayStructuredText(), '0');
        $userPrefs->setDisplayStructuredText('on');
        $this->assertTrue($userPrefs->getDisplayStructuredText(), 'on');
        $userPrefs->setDisplayStructuredText('off');
        $this->assertFalse($userPrefs->getDisplayStructuredText(), 'off');
        $userPrefs->setDisplayStructuredText('1');
        $this->assertTrue($userPrefs->getDisplayStructuredText(), '"1"');
        $userPrefs->setDisplayStructuredText('0');
        $this->assertFalse($userPrefs->getDisplayStructuredText(), '"0"');
        $userPrefs->setDisplayStructuredText('<invalid>');
        $this->assertFalse($userPrefs->getDisplayStructuredText(), '<invalid>');
        $userPrefs->setDisplayStructuredText(null);
        $this->assertFalse($userPrefs->getDisplayStructuredText(), 'NULL');
    }

    /**
     * Test case for getSendHtmlMail().
     */
    public function testGetSendHtmlMail() {
        $this->assertFalse($this->userPrefs1->getSendHtmlMail());
    }

    /**
     * Test case for setSendHtmlMail().
     */
    public function testSetSendHtmlMail() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getSendHtmlMail(), 'default');
        $userPrefs->setSendHtmlMail(true);
        $this->assertTrue($userPrefs->getSendHtmlMail(), 'true');
        $userPrefs->setSendHtmlMail(false);
        $this->assertFalse($userPrefs->getSendHtmlMail(), 'false');
        $userPrefs->setSendHtmlMail(1);
        $this->assertTrue($userPrefs->getSendHtmlMail(), '1');
        $userPrefs->setSendHtmlMail(0);
        $this->assertFalse($userPrefs->getSendHtmlMail(), '0');
        $userPrefs->setSendHtmlMail('on');
        $this->assertTrue($userPrefs->getSendHtmlMail(), 'on');
        $userPrefs->setSendHtmlMail('off');
        $this->assertFalse($userPrefs->getSendHtmlMail(), 'off');
        $userPrefs->setSendHtmlMail('1');
        $this->assertTrue($userPrefs->getSendHtmlMail(), '"1"');
        $userPrefs->setSendHtmlMail('0');
        $this->assertFalse($userPrefs->getSendHtmlMail(), '"0"');
        $userPrefs->setSendHtmlMail('<invalid>');
        $this->assertFalse($userPrefs->getSendHtmlMail(), '<invalid>');
        $userPrefs->setSendHtmlMail(null);
        $this->assertFalse($userPrefs->getSendHtmlMail(), 'NULL');
    }

    /**
     * Test case for getUseSentFolder().
     */
    public function testGetUseSentFolder() {
        $this->assertFalse($this->userPrefs1->getUseSentFolder());
    }

    /**
     * Test case for setUseSentFolder().
     */
    public function testSetUseSentFolder() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getUseSentFolder(), 'default');
        $userPrefs->setUseSentFolder(true);
        $this->assertTrue($userPrefs->getUseSentFolder(), 'true');
        $userPrefs->setUseSentFolder(false);
        $this->assertFalse($userPrefs->getUseSentFolder(), 'false');
        $userPrefs->setUseSentFolder(1);
        $this->assertTrue($userPrefs->getUseSentFolder(), '1');
        $userPrefs->setUseSentFolder(0);
        $this->assertFalse($userPrefs->getUseSentFolder(), '0');
        $userPrefs->setUseSentFolder('on');
        $this->assertTrue($userPrefs->getUseSentFolder(), 'on');
        $userPrefs->setUseSentFolder('off');
        $this->assertFalse($userPrefs->getUseSentFolder(), 'off');
        $userPrefs->setUseSentFolder('1');
        $this->assertTrue($userPrefs->getUseSentFolder(), '"1"');
        $userPrefs->setUseSentFolder('0');
        $this->assertFalse($userPrefs->getUseSentFolder(), '"0"');
        $userPrefs->setUseSentFolder('<invalid>');
        $this->assertFalse($userPrefs->getUseSentFolder(), '<invalid>');
        $userPrefs->setUseSentFolder(null);
        $this->assertFalse($userPrefs->getUseSentFolder(), 'NULL');
    }

    /**
     * Test case for getUseTrashFolder().
     */
    public function testGetUseTrashFolder() {
        $this->assertFalse($this->userPrefs1->getUseTrashFolder());
    }

    /**
     * Test case for setUseTrashFolder().
     */
    public function testSetUseTrashFolder() {
        $userPrefs = new NOCCUserPrefs('');

        $this->assertFalse($userPrefs->getUseTrashFolder(), 'default');
        $userPrefs->setUseTrashFolder(true);
        $this->assertTrue($userPrefs->getUseTrashFolder(), 'true');
        $userPrefs->setUseTrashFolder(false);
        $this->assertFalse($userPrefs->getUseTrashFolder(), 'false');
        $userPrefs->setUseTrashFolder(1);
        $this->assertTrue($userPrefs->getUseTrashFolder(), '1');
        $userPrefs->setUseTrashFolder(0);
        $this->assertFalse($userPrefs->getUseTrashFolder(), '0');
        $userPrefs->setUseTrashFolder('on');
        $this->assertTrue($userPrefs->getUseTrashFolder(), 'on');
        $userPrefs->setUseTrashFolder('off');
        $this->assertFalse($userPrefs->getUseTrashFolder(), 'off');
        $userPrefs->setUseTrashFolder('1');
        $this->assertTrue($userPrefs->getUseTrashFolder(), '"1"');
        $userPrefs->setUseTrashFolder('0');
        $this->assertFalse($userPrefs->getUseTrashFolder(), '"0"');
        $userPrefs->setUseTrashFolder('<invalid>');
        $this->assertFalse($userPrefs->getUseTrashFolder(), '<invalid>');
        $userPrefs->setUseTrashFolder(null);
        $this->assertFalse($userPrefs->getUseTrashFolder(), 'NULL');
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
        $this->assertTrue($userPrefs1->getCcSelf(), 'getCcSelf()');
        $this->assertTrue($userPrefs1->getHideAddresses(), 'getHideAddresses()');
        $this->assertTrue($userPrefs1->getOutlookQuoting(), 'getOutlookQuoting()');
        $this->assertTrue($userPrefs1->getColoredQuotes(), 'getColoredQuotes()');
        $this->assertTrue($userPrefs1->getDisplayStructuredText(), 'getDisplayStructuredText()');
        $this->assertTrue($userPrefs1->seperate_msg_win, 'seperate_msg_win');
        $this->assertEquals('', $userPrefs1->reply_leadin, 'reply_leadin');
        $this->assertEquals('This is a signature...', $userPrefs1->signature, 'signature');
        $this->assertTrue($userPrefs1->sig_sep, 'sig_sep');
        $this->assertTrue($userPrefs1->getSendHtmlMail(), 'getSendHtmlMail()');
        $this->assertTrue($userPrefs1->graphical_smilies, 'graphical_smilies');
        $this->assertTrue($userPrefs1->getUseSentFolder(), 'getUseSentFolder()');
        $this->assertEquals('Sent', $userPrefs1->sent_folder_name, 'sent_folder_name');
        $this->assertTrue($userPrefs1->getUseTrashFolder(), 'getUseTrashFolder()');
        $this->assertEquals('Trash', $userPrefs1->trash_folder_name, 'trash_folder_name');
        $this->assertEquals('de', $userPrefs1->lang, 'lang');
        $this->assertEquals('newlook', $userPrefs1->theme, 'theme');
        $this->assertEquals(0, $userPrefs1->dirty_flag, 'dirty_flag');

        $userPrefs2 = NOCCUserPrefs::readFromFile($defaultUserPrefs, './prefs/test2.pref', $ev);

        $this->assertEquals('Name Full', $userPrefs2->full_name, 'full_name');
        $this->assertEquals('bar@foo.org', $userPrefs2->email_address, 'email_address');
        $this->assertEquals(15, $userPrefs2->msg_per_page, 'msg_per_page');
        $this->assertFalse($userPrefs2->getCcSelf(), 'getCcSelf()');
        $this->assertFalse($userPrefs2->getHideAddresses(), 'getHideAddresses()');
        $this->assertFalse($userPrefs2->getOutlookQuoting(), 'getOutlookQuoting()');
        $this->assertFalse($userPrefs2->getColoredQuotes(), 'getColoredQuotes()');
        $this->assertFalse($userPrefs2->getDisplayStructuredText(), 'getDisplayStructuredText()');
        $this->assertFalse($userPrefs2->seperate_msg_win, 'seperate_msg_win');
        $this->assertEquals('', $userPrefs2->reply_leadin, 'reply_leadin');
        $this->assertEquals('', $userPrefs2->signature, 'signature');
        $this->assertFalse($userPrefs2->sig_sep, 'sig_sep');
        $this->assertFalse($userPrefs2->getSendHtmlMail(), 'getSendHtmlMail()');
        $this->assertFalse($userPrefs2->graphical_smilies, 'graphical_smilies');
        $this->assertFalse($userPrefs2->getUseSentFolder(), 'getUseSentFolder()');
        $this->assertEquals('', $userPrefs2->sent_folder_name, 'sent_folder_name');
        $this->assertFalse($userPrefs2->getUseTrashFolder(), 'getUseTrashFolder()');
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
