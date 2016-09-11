<?php

namespace Michaskruzelka\Lacinka\Renderers;

class SimpleReplace extends RendererAbstract
{
    /**
     * @param string $text
     * @return string
     */
    public function render($text)
    {
        return str_replace($this->search, $this->replace, $text);
    }
}