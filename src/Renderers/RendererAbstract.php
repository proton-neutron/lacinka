<?php

namespace Michaskruzelka\Lacinka\Renderers;

/**
 * Class RendererAbstract
 * @package Michaskruzelka\Lacinka\Renderers
 * @author Mikhail Marchanka <michaskruzelka@gmail.com>
 */
abstract class RendererAbstract implements RendererInterface
{
    /**
     * @var array
     */
    protected $search;

    /**
     * @var array
     */
    protected $replace;

    /**
     * @param array $search
     * @return $this
     */
    public function setSearch(array $search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @param array $replace
     * @return $this
     */
    public function setReplace(array $replace)
    {
        $this->replace = $replace;
        return $this;
    }
}