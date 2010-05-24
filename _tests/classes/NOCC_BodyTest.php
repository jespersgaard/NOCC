<?php
/**
 * Test cases for NOCC_Body.
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

require_once dirname(__FILE__).'/../../classes/nocc_body.php';

/**
 * Test class for NOCC_Body.
 */
class NOCC_BodyTest extends PHPUnit_Framework_TestCase {
    /**
     * Test case for prepareHtmlLinks().
     */
    public function testPrepareHtmlLinks() {
        $actual =
'This is a test mail with URLs:
* <a href="http://nocc.sf.net/">NOCC</a>
* <A HREF="http://nocc.sf.net/?lang=de">NOCC German</A>
* <a href="http://nocc.sourceforge.net/docs/changelog.php">NOCC ChangeLog</a>
* <a href="mailto:nocc-discuss@lists.sourceforge.net">Mailing list</a>
* <A HREF="MAILTO:nocc-discuss@lists.sourceforge.net">Mailing list</A>';

        $expected =
'This is a test mail with URLs:
* <a href="http://nocc.sf.net/" target="_blank">NOCC</a>
* <A href="http://nocc.sf.net/?lang=de" target="_blank">NOCC German</A>
* <a href="http://nocc.sourceforge.net/docs/changelog.php" target="_blank">NOCC ChangeLog</a>
* <a href="http://localhost/nocc/?action=write&amp;mail_to=nocc-discuss@lists.sourceforge.net">Mailing list</a>
* <A href="http://localhost/nocc/?action=write&amp;mail_to=nocc-discuss@lists.sourceforge.net">Mailing list</A>';

        $this->assertEquals($expected, NOCC_Body::prepareHtmlLinks($actual, 'http://localhost/nocc/'));
    }

    /**
     * Test case for prepareTextLinks().
     * @TODO ...
     */
    public function testPrepareTextLinks() {
        $actual =
'This is a test mail with URLs:
* http://nocc.sf.net/
* http://nocc.sf.net/?lang=de
* http://nocc.sourceforge.net/docs/changelog.php
* &lt;http://nocc.sf.net/&gt;
* [http://nocc.sf.net/]
* nocc-discuss@lists.sourceforge.net
* &lt;nocc-discuss@lists.sourceforge.net&gt;';

        $expected =
'This is a test mail with URLs:
* <a href="http://nocc.sf.net/" target="_blank">http://nocc.sf.net/</a>
* <a href="http://nocc.sf.net/?lang=de" target="_blank">http://nocc.sf.net/?lang=de</a>
* <a href="http://nocc.sourceforge.net/docs/changelog.php" target="_blank">http://nocc.sourceforge.net/docs/changelog.php</a>
* &lt;<a href="http://nocc.sf.net/" target="_blank">http://nocc.sf.net/</a>&gt;
* [<a href="http://nocc.sf.net/" target="_blank">http://nocc.sf.net/</a>]
* <a href="http://localhost/nocc/?action=write&amp;mail_to=nocc-discuss@lists.sourceforge.net">nocc-discuss@lists.sourceforge.net</a>
* &lt;<a href="http://localhost/nocc/?action=write&amp;mail_to=nocc-discuss@lists.sourceforge.net">nocc-discuss@lists.sourceforge.net</a>&gt;';

        $this->assertEquals($expected, NOCC_Body::prepareTextLinks($actual, 'http://localhost/nocc/'));
    }

    /**
     * Test case for addColoredQuotes().
     */
    public function testAddColoredQuotes() {
        $actual =
'&gt; &gt; &gt; This is level 3
&gt;&gt;&gt; ...
&gt; &gt; This is level 2
&gt;&gt; ...
&gt; This is level 1
&gt; ...
And this is level 0
...';

        $expected =
'<span class="quoteLevel3">&gt; &gt; &gt; This is level 3</span>
<span class="quoteLevel3">&gt;&gt;&gt; ...</span>
<span class="quoteLevel2">&gt; &gt; This is level 2</span>
<span class="quoteLevel2">&gt;&gt; ...</span>
<span class="quoteLevel1">&gt; This is level 1</span>
<span class="quoteLevel1">&gt; ...</span>
And this is level 0
...';

        $this->assertEquals($expected, NOCC_Body::addColoredQuotes($actual));
    }

    /**
     * Test case for addStructuredText().
     */
    public function testAddStructuredText() {
        $actual = 'This *is* /just/ a _test_ |from| 10^6 and +/-0!';
        $expected = 'This <strong>*is*</strong> <em>/just/</em> a <span style="text-decoration:underline">_test_</span> <code>|from|</code> 10<sup>6</sup> and &plusmn;0!';

        $this->assertEquals($expected, NOCC_Body::addStructuredText($actual));
    }
}
?>
