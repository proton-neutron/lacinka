<?php

namespace Michaskruzelka\Lacinka\Renderers;

/**
 * Class Factory
 * @package Michaskruzelka\Lacinka\Renderers
 */
class Factory
{
    /**
     * @param string $className
     * @return RendererInterface
     * @throws \Exception
     */
    public static function getInstance($className)
    {
        if ( ! class_exists($fullClassName = __NAMESPACE__ . '\\' .  $className)) {
            throw new \Exception("The renderer does not exist: {$className}");
        }
        $instance = new $fullClassName();
        if ( ! $instance instanceof RendererInterface) {
            throw new \Exception("Unsupported renderer: {$className}");
        }
        return $instance;
    }
}