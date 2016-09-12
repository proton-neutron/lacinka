<?php

namespace Michaskruzelka\Lacinka\Renderers;

class SimpleReplace implements RendererInterface
{
    /**
     * @param array $search
     * @param array $replace
     * @param string $text
     * @return string
     */
    public function render(array $search, array $replace, $text)
    {
        return str_replace($search, $replace, $text);
    }
}