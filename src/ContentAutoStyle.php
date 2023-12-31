<?php

namespace PhpOdt;

/**
 * Base class for paragraph & text styles.
 */
class ContentAutoStyle
{
    /**
     * The DOMDocument representing the styles xml file
     * @access private
     * @var DOMDocument
     */
    protected $contentDocument;

    /**
     * The name of the style
     * @access private
     * @var string
     */
    protected $name;

    /**
     * The DOMElement representing this style
     * @access private
     * @var DOMElement
     */
    protected $styleElement;

    /**
     * The constructor initializes the properties, then creates a <style:style> element , or an other element
     * if $elementNodeName is specified, representing this specific style, and add it to <office:automatic-styles>
     * element
     *
     * @param DOMDocument $contentDoc The content Document returned by the method
     *  {@link Odt.html#initContent initContent()}
     * @param string $name The style name
     */
    public function __construct($name, $elementNodeName = null)
    {
        $this->contentDocument = Odt::getInstance()->getDocumentContent();
        $this->name = $name;
        if ($elementNodeName == null) {
            $this->styleElement = $this->contentDocument->createElement('style:style');
        } else {
            $this->styleElement = $this->contentDocument->createElement($elementNodeName);
        }
        $this->styleElement->setAttribute('style:name', $name);
        $this->contentDocument->getElementsByTagName('office:automatic-styles')->item(0)
            ->appendChild($this->styleElement);
    }

    /**
     * return the name of this style
     * @return string
     */
    public function getStyleName()
    {
        return $this->name;
    }

    public function setStyleName($name)
    {
        $this->name = $name;
    }
}
