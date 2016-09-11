<?php

namespace Michaskruzelka\Lacinka\Renderers;

class ReplaceByPattern extends RendererAbstract
{
    /**
     * @param string $text
     * @return string
     */
    public function render($text)
    {
        return preg_replace($this->search, $this->replace, $text);
    }
}