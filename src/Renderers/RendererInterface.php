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
     * @param string $text
     * @return string
     */
    public function render($text);

    /**
     * Takes a set of search patterns
     * @param array $search
     * @return $this
     */
    public function setSearch(array $search);

    /**
     * Takes a set of replacements
     * @param array $replace
     * @return $this
     */
    public function setReplace(array $replace);
}