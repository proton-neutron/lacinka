<?php

namespace Michaskruzelka\Lacinka\lib;

trait BetterXML
{
    /**
     * @return \SimpleXMLElement
     */
    public function parentNode()
    {
        $parent = current($this->xpath('parent::*'));
        return $parent;
    }

    /**
     * @param string $name
     * @return $this
     * @throws \Exception
     */
    public function checkNodeName($name)
    {
        if ($name !== $this->getName()) {
            throw new \Exception("Unsupported node name: {$this->getName()}");
        }
        return $this;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        $out = [];
        foreach ($this->children() as $node) {
            $out[] = $node;
        }
        return $out;
    }
}