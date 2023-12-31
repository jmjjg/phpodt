<?php

namespace PhpOdt;

use PhpOdt\Exceptions\StyleException;

class RubyStyle extends ContentAutoStyle
{
    private $rubyProperties;

    public function __construct($name = '')
    {
        if (empty($name)) {
            $name = 'rubystyle' . rand(100, 9999999);
        }
        parent::__construct($name);
        $this->styleElement->setAttribute('style:family', 'ruby');
        $this->rubyProperties = $this->contentDocument->createElement('style:ruby-properties');
        $this->styleElement->appendChild($this->rubyProperties);
    }

    public function setRubyPosition($position)
    {
        switch ($position) {
            case StyleConstants::RUBY_ABOVE:
                $position = 'above';
                break;
            case StyleConstants::RUBY_BELOW:
                $position = 'below';
                break;
            default:
                throw new StyleException('Invalid ruby position value');
        }
        $this->rubyProperties->setAttribute('style:ruby-position', $position);
    }

    public function setRubyAlign($align)
    {
        switch ($align) {
            case StyleConstants::LEFT:
                $align = 'left';
                break;
            case StyleConstants::RIGHT:
                $align = 'right';
                break;
            case StyleConstants::CENTER:
                $align = 'center';
                break;
            case StyleConstants::DISTRIBUTE_LETTER:
                $align = 'distribute-letter';
                break;
            case StyleConstants::DISTRIBUTE_SPACE:
                $align = 'distribute-space';
                break;
            default:
                throw new StyleException('Invalid ruby alignment value');
        }
        $this->rubyProperties->setAttribute('style:ruby-align', $align);
    }
}
