<?php

namespace Michaskruzelka\Lacinka\Renderers;

/**
 * Interface RendererInterface
 * @package Michaskruzelka\Lacinka\Renderers
 * @author Mikhail Marchanka <michaskruzelka@gmail.com>
 */
interface RendererInterface
{
    /**
     * @param array $search
     * @param array $replace
     * @param string $text
     * @return string
     */
    public function render(array $search, array $replace, $text);
}