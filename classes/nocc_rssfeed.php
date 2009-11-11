<?php
/**
 * Class for wrapping the RSS feed
 *
 * Copyright 2009 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

/**
 * Wrapping the RSS feed
 *
 * @package    NOCC
 */
class NOCC_RssFeed {
    /**
     * Title
     * @var string
     * @access private
     */
    var $_title;

    /**
     * Description
     * @var string
     * @access private
     */
    var $_description;

    /**
     * Link
     * @var string
     * @access private
     */
    var $_link;

    /**
     * Items
     * @var array
     * @access private 
     */
    var $_items;

    /**
     * Initialize the RSS feed wrapper
     */
    function NOCC_RssFeed() {
        $this->_title = '';
        $this->_description = '';
        $this->_link = '';
        $this->_items = array();
    }

    /**
     * ...
     * @return string Title
     */
    function getTitle() {
        return $this->_title;
    }

    /**
     * ...
     * @param string $title Title
     */
    function setTitle($title) {
        $this->_title = $title;
    }

    /**
     * ...
     * @return string Description
     */
    function getDescription() {
        return $this->_description;
    }

    /**
     * ...
     * @param string $description Description
     */
    function setDescription($description) {
        $this->_description = $description;
    }

    /**
     * ...
     * @return string Link
     */
    function getLink() {
        return $this->_link;
    }

    /**
     * ...
     * @param string $link Link
     */
    function setLink($link) {
        $this->_link = $link;
    }

    /**
     * ...
     * @param NOCC_RssFeed_Item $item Item
     */
    function addItem($item) {
        $this->_items[] = $item;
    }

    /**
     * ...
     */
    function sendToBrowser() {
        header('Content-Type: application/rss+xml; charset=UTF-8');
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
        echo "<rdf:RDF\n";
        echo "  xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"\n";
        echo "  xmlns:dc=\"http://purl.org/dc/elements/1.1/\"\n";
        echo "  xmlns:sy=\"http://purl.org/rss/1.0/modules/syndication/\"\n";
        echo "  xmlns:admin=\"http://webns.net/mvcb/\"\n";
        echo "  xmlns:content=\"http://purl.org/rss/1.0/modules/content/\"\n";
        echo "  xmlns=\"http://purl.org/rss/1.0/\">\n";
        echo "  <channel rdf:about=\"" . $this->_link . "\">\n";
        echo "    <title>" . $this->_title . "</title>\n";
        echo "    <description>" . $this->_description . "</description>\n";
        echo "    <link>" . $this->_link . "</link>\n";
        echo "    <dc:language>TODO</dc:language>\n";
        echo "    <dc:creator></dc:creator>\n";
        echo "    <dc:rights></dc:rights>\n";
        echo "    <dc:date>TODO</dc:date>\n";
        echo "    <admin:generatorAgent rdf:resource=\"http://nocc.sourceforge.net/\" />\n";
        echo "    <sy:updatePeriod>hourly</sy:updatePeriod>\n";
        echo "    <sy:updateFrequency>1</sy:updateFrequency>\n";
        echo "    <sy:updateBase>TODO</sy:updateBase>\n";
        echo "    <items>\n";
        echo "      <rdf:Seq>\n";
        foreach ($this->_items as $item) { //for all items...
            echo "        <rdf:li rdf:resource=\"" . $item->getLink() . "\" />\n";
        }
        echo "      </rdf:Seq>\n";
        echo "    </items>\n";
        echo "  </channel>\n";
        foreach ($this->_items as $item) { //for all items...
            echo "  <item rdf:about=\"" . $item->getLink() . "\">\n";
            echo "    <title>" . $item->getTitle() . "</title>\n";
            echo "    <link>" . $item->getLink() . "</link>\n";
            echo "    <!--dc:date></dc:date-->\n";
            echo "    <dc:language>TODO</dc:language>\n";
            echo "    <dc:creator>" . $item->getCreator() . "</dc:creator>\n";
            echo "    <dc:subject>Email</dc:subject>\n";
            echo "    <description>\n";
            echo "      <![CDATA[\n";
            echo $item->getDescription() . "\n";
            echo "      ]]>\n";
            echo "    </description>\n";
            echo "    <content:encoded>\n";
            echo "      <![CDATA[\n";
            echo $item->getContent() . "\n";
            echo "      ]]>\n";
            echo "    </content:encoded>\n";
            echo "  </item>\n";
        }
        echo "</rdf:RDF>\n";
    }
}

/**
 * Wrapping a RSS feed item
 *
 * @package    NOCC
 */
class NOCC_RssFeed_Item {
    /**
     * Title
     * @var string
     * @access private
     */
    var $_title;

    /**
     * Description
     * @var string
     * @access private
     */
    var $_description;

    /**
     * Content
     * @var string
     * @access private
     */
    var $_content;

    /**
     * Link
     * @var string
     * @access private
     */
    var $_link;

    /**
     * Creator
     * @var string
     * @access private
     */
    var $_creator;

    /**
     * Initialize the RSS feed item wrapper
     */
    function NOCC_RssFeed_Item() {
        $this->_title = '';
        $this->_description = '';
        $this->_content = '';
        $this->_link = '';
        $this->_creator = '';
    }

    /**
     * ...
     * @return string Title
     */
    function getTitle() {
        return $this->_title;
    }

    /**
     * ...
     * @param string $title Title
     */
    function setTitle($title) {
        $this->_title = $title;
    }

    /**
     * ...
     * @return string Description
     */
    function getDescription() {
        return $this->_description;
    }

    /**
     * ...
     * @param string $description Description
     */
    function setDescription($description) {
        $this->_description = $description;
    }

    /**
     * ...
     * @return string Content
     */
    function getContent() {
        return $this->_content;
    }

    /**
     * ...
     * @param string $content Content
     */
    function setContent($content) {
        $this->_content = $content;
    }

    /**
     * ...
     * @return string Link
     */
    function getLink() {
        return $this->_link;
    }

    /**
     * ...
     * @param string $link Link
     */
    function setLink($link) {
        $this->_link = $link;
    }

    /**
     * ...
     * @return string Creator
     */
    function getCreator() {
        return $this->_creator;
    }

    /**
     * ...
     * @param string $creator Creator
     */
    function setCreator($creator) {
        $this->_creator = $creator;
    }
}
?>