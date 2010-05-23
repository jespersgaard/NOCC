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
