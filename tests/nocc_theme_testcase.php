<?php
    require_once 'simpletest/unit_tester.php';
    require_once 'simpletest/reporter.php';
    require_once '../classes/nocc_theme.php';

    class NOCC_Theme_TestCase extends UnitTestCase {

        function NOCC_Theme_TestCase() {
            $this->UnitTestCase('NOCC_Theme');
        }

        function test1() {
            $theme = new NOCC_Theme('test1');
            
            $this->assertEqual('test1', $theme->getName(), 'getName() - %s');
            $this->assertEqual('themes/test1', $theme->getPath(), 'getPath() - %s');
            $this->assertNotEqual('', $theme->getRealPath(), 'getRealPath() - %s');
            $this->assertTrue($theme->exists(), 'exists() - %s');
            
            $this->assertEqual('themes/test1/style.css', $theme->getStylesheet(), 'getStylesheet() - %s');
            $this->assertEqual('themes/test1/print.css', $theme->getPrintStylesheet(), 'getPrintStylesheet() - %s');
            $this->assertEqual('favicon.ico', $theme->getFavicon(), 'getFavicon() - %s');
            
            $this->assertNotEqual('', $theme->getCustomHeader(), 'getCustomHeader() - %s');
            $this->assertNotEqual('', $theme->getCustomFooter(), 'getCustomFooter() - %s');
            //replaceTextSmilies
        }

        function test2() {
            $theme = new NOCC_Theme('notexists');
            
            $this->assertEqual('notexists', $theme->getName(), 'getName() - %s');
            $this->assertEqual('', $theme->getPath(), 'getPath() - %s');
            $this->assertEqual('', $theme->getRealPath(), 'getRealPath() - %s');
            $this->assertFalse($theme->exists(), 'exists() - %s');
            
            $this->assertEqual('', $theme->getStylesheet(), 'getStylesheet() - %s');
            $this->assertEqual('', $theme->getPrintStylesheet(), 'getPrintStylesheet() - %s');
            $this->assertEqual('favicon.ico', $theme->getFavicon(), 'getFavicon() - %s');
            
            $this->assertEqual('', $theme->getCustomHeader(), 'getCustomHeader() - %s');
            $this->assertEqual('', $theme->getCustomFooter(), 'getCustomFooter() - %s');
        }

        function test3() {
            $theme = new NOCC_Theme('');
            
            $this->assertEqual('', $theme->getName(), 'getName() - %s');
            $this->assertEqual('', $theme->getPath(), 'getPath() - %s');
            $this->assertEqual('', $theme->getRealPath(), 'getRealPath() - %s');
            $this->assertFalse($theme->exists(), 'exists() - %s');
            
            $this->assertEqual('', $theme->getStylesheet(), 'getStylesheet() - %s');
            $this->assertEqual('', $theme->getPrintStylesheet(), 'getPrintStylesheet() - %s');
            $this->assertEqual('favicon.ico', $theme->getFavicon(), 'getFavicon() - %s');
            
            $this->assertEqual('', $theme->getCustomHeader(), 'getCustomHeader() - %s');
            $this->assertEqual('', $theme->getCustomFooter(), 'getCustomFooter() - %s');
        }

        function test4() {
            $theme = new NOCC_Theme('../../../../../../../etc/passwd%00');
            
            $this->assertEqual('etcpasswd%00', $theme->getName(), 'getName() - %s');
            $this->assertEqual('', $theme->getPath(), 'getPath() - %s');
            $this->assertEqual('', $theme->getRealPath(), 'getRealPath() - %s');
            $this->assertFalse($theme->exists(), 'exists() - %s');
            
            $this->assertEqual('', $theme->getStylesheet(), 'getStylesheet() - %s');
            $this->assertEqual('', $theme->getPrintStylesheet(), 'getPrintStylesheet() - %s');
            $this->assertEqual('favicon.ico', $theme->getFavicon(), 'getFavicon() - %s');
            
            $this->assertEqual('', $theme->getCustomHeader(), 'getCustomHeader() - %s');
            $this->assertEqual('', $theme->getCustomFooter(), 'getCustomFooter() - %s');
        }

        function test5() {
            $theme = new NOCC_Theme('<script>alert(document.cookie)</script>');
            
            $this->assertEqual('alert(document.cookie)', $theme->getName(), 'getName() - %s');
            $this->assertEqual('', $theme->getPath(), 'getPath() - %s');
            $this->assertEqual('', $theme->getRealPath(), 'getRealPath() - %s');
            $this->assertFalse($theme->exists(), 'exists() - %s');
            
            $this->assertEqual('', $theme->getStylesheet(), 'getStylesheet() - %s');
            $this->assertEqual('', $theme->getPrintStylesheet(), 'getPrintStylesheet() - %s');
            $this->assertEqual('favicon.ico', $theme->getFavicon(), 'getFavicon() - %s');
            
            $this->assertEqual('', $theme->getCustomHeader(), 'getCustomHeader() - %s');
            $this->assertEqual('', $theme->getCustomFooter(), 'getCustomFooter() - %s');
        }
    }

    $test = &new NOCC_Theme_TestCase();
    $test->run(new HtmlReporter());
?>