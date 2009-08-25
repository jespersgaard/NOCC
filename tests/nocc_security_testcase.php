<?php
/**
 * Testcase for NOCC_Security
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
require_once('../classes/nocc_security.php');

class NOCC_Security_TestCase extends UnitTestCase {

    function NOCC_Security_TestCase() {
        $this->UnitTestCase('NOCC_Security');
    }

    function testDisableHtmlImages() {
        $html = 
'<dl>
  <dt>normal image with double quote<dt>
  <dd><img src="http://nocc.sourceforge.net/engine/images/logo.png" /></dd>
  <dt>normal image with single quote<dt>
  <dd><img src=\'http://nocc.sourceforge.net/engine/images/logo.png\' /></dd>
  <dt>normal image without quote<dt>
  <dd><img Src=http://nocc.sourceforge.net/engine/images/logo.png /></dd>
  <dt>normal image with whitespace and double quote<dt>
  <dd><img src = "http://nocc.sourceforge.net/engine/images/logo.png " /></dd>
  <dt>normal image with whitespace and single quote<dt>
  <dd><img src = \'http://nocc.sourceforge.net/engine/images/logo.png \' /></dd>
  <dt>normal image with whitespace and without quote<dt>
  <dd><img srC = http://nocc.sourceforge.net/engine/images/logo.png /></dd>
</dl>

<table>
  <tr>
    <td background="http://nocc.sourceforge.net/engine/images/logo.png">background with double quote</td>
  </tr>
  <tr>
    <td background=\'http://nocc.sourceforge.net/engine/images/logo.png\'>background with single quote</td>
  </tr>
  <tr>
    <td BackGround=http://nocc.sourceforge.net/engine/images/logo.png>background without quote</td>
  </tr>
  <tr>
    <td background = "http://nocc.sourceforge.net/engine/images/logo.png ">background with whitespace and double quote</td>
  </tr>
  <tr>
    <td background = \'http://nocc.sourceforge.net/engine/images/logo.png \'>background with whitespace and single quote</td>
  </tr>
  <tr>
    <td background = http://nocc.sourceforge.net/engine/images/logo.png >background with whitespace and without quote</td>
  </tr>
</table>

<p style="BackGround:Url(http://nocc.sourceforge.net/engine/images/logo.png)">background-style</p>
<p style="background:url(\'http://nocc.sourceforge.net/engine/images/logo.png\')">background-style with single quote</p>
<p style=" background : url( http://nocc.sourceforge.net/engine/images/logo.png ) ">background-style with whitespace</p>
<p style="background : url( \'http://nocc.sourceforge.net/engine/images/logo.png \')">background-style with whitespace and single quote</p>';

        $expected = 
'<dl>
  <dt>normal image with double quote<dt>
  <dd><img src="none" /></dd>
  <dt>normal image with single quote<dt>
  <dd><img src="none" /></dd>
  <dt>normal image without quote<dt>
  <dd><img src="none"/></dd>
  <dt>normal image with whitespace and double quote<dt>
  <dd><img src="none" /></dd>
  <dt>normal image with whitespace and single quote<dt>
  <dd><img src="none" /></dd>
  <dt>normal image with whitespace and without quote<dt>
  <dd><img src="none"/></dd>
</dl>

<table>
  <tr>
    <td background="none">background with double quote</td>
  </tr>
  <tr>
    <td background="none">background with single quote</td>
  </tr>
  <tr>
    <td background="none">background without quote</td>
  </tr>
  <tr>
    <td background="none">background with whitespace and double quote</td>
  </tr>
  <tr>
    <td background="none">background with whitespace and single quote</td>
  </tr>
  <tr>
    <td background="none">background with whitespace and without quote</td>
  </tr>
</table>

<p style="BackGround:url(none)">background-style</p>
<p style="background:url(none)">background-style with single quote</p>
<p style=" background : url(none) ">background-style with whitespace</p>
<p style="background : url(none)">background-style with whitespace and single quote</p>';
        
        $this->assertEqual($expected, NOCC_Security::disableHtmlImages($html));
    }

    function testHasDisabledHtmlImages() {
        $this->assertFalse(NOCC_Security::hasDisabledHtmlImages(''));
        
        $this->assertTrue(NOCC_Security::hasDisabledHtmlImages('<dd><img src="none"/></dd>'), 'src="none"');
        $this->assertTrue(NOCC_Security::hasDisabledHtmlImages('<td background="none">...</td>'), 'background="none"');
        $this->assertTrue(NOCC_Security::hasDisabledHtmlImages('<p style="background:url(none)">...</p>'), 'background:url(none)');
        $this->assertTrue(NOCC_Security::hasDisabledHtmlImages('<p style="background : url(none)">...</p>'), 'background : url(none)');
    }
}

$test = &new NOCC_Security_TestCase();
$test->run(new HtmlReporter());
?>