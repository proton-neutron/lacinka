<?php

namespace Michaskruzelka\Lacinka;

use Michaskruzelka\Lacinka\lib\BetterXML;
use Michaskruzelka\Lacinka\Renderers\RendererInterface;

/**
 * Class Rule
 * The rule collects its patterns and replacements, considering the specified
 * version and orthography, and invokes the appropriate renderer.
 * You can implement you own renderer.
 * See Michaskruzelka\Lacinka\Renderers\RendererInterface.
 * It is a \SimpleXMLElement and it must be structured as follows:
 *
 *      <rule name="[rule_name]">
 *          <sort>[number]</sort>
 *          <renderer>
 *              <name>[Some implementation of RendererInterface]</name>
 *              <search>[Search Pattern, can include <back> or <forth> inheriting nodes]</search>
 *              <replace>[Replacement, can include <back> or <forth> inheriting nodes]</replace>
 *          </renderer>
 *          <directions>
 *              <back>[true|false]</back>
 *              <forth>[true|false]</forth>
 *          </directions>
 *          <versions>
 *              <[version]>[true|false]</[version]>
 *              ...
 *          </versions>
 *          <orthographies>
 *              <[orthography]>[true|false]</[orthography]>
 *              ...
 *          </orthographies>
 *          <pairs>
 *              <pair>
 *                  <cyrillic>[letter|word|etc]</cyrillic>
 *                  <latin>[letter|word|etc]</latin>
 *                  <versions>...</versions>
 *                  <orthographies>...</orthographies>
 *                  <directions>...</directions>
 *              </pair>
 *              ...
 *          </pairs>
 *      </rule>
 *
 * @package Michaskruzelka\Lacinka
 * @author Mikhail Marchanka <michaskruzelka@gmail.com>
 */
class Rule extends \SimpleXMLElement
{
    use BetterXML;

    /**
     * @return string
     */
    public function getRuleName()
    {
        return $this['name'];
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function validate()
    {
        $this->checkNodeName('rule');
        if ( ! $renderer = $this->getRenderer()) {
            throw new \Exception("The renderer is not specified");
        }
        if ( ! $renderer->name) {
            throw new \Exception("The renderer name is not specified");
        }
        if ( ! $renderer->search) {
            throw new \Exception("The search is not specified");
        }
        return $this;
    }

    /**
     * @param RendererInterface $renderer
     * @param string $direction
     * @param string $version
     * @param string $orthography
     * @param string $text
     * @return $this
     */
    public function apply(
        RendererInterface $renderer,
        $direction,
        $version,
        $orthography,
        &$text
    ) {
        $search = [];
        $replace = [];
        $this->collectPatterns($search, $replace, $direction, $version, $orthography);
        if ( ! empty($search)) {
            $text = $renderer->render($search, $replace, $text);
        }
        return $this;
    }

    /**
     * @return string|false
     */
    public function getRenderer()
    {
        if (( ! $renderer = $this->renderer) && $this->parentNode()) {
            $renderer = $this->parentNode()->getRenderer();
        }
        return $renderer;
    }

    /**
     * @param bool $direction
     * @return string
     */
    public function getSearch($direction = false)
    {
        if ( ! $direction ||  ! $this->getRenderer()->search->{$direction}) {
            return $this->getRenderer()->search;
        }
        return $this->getRenderer()->search->{$direction};
    }

    /**
     * @param bool $direction
     * @return false|string
     */
    public function getReplace($direction = false)
    {
        if ( ! $direction ||  ! $this->getRenderer()->replace->{$direction}) {
            return $this->getRenderer()->replace;
        }
        return $this->getRenderer()->replace->{$direction};
    }

    /**
     * @param array $search
     * @param array $replace
     * @param string $direction
     * @param string $version
     * @param string $orthography
     * @return $this
     */
    protected function collectPatterns(&$search, &$replace, $direction, $version, $orthography)
    {
        if ( ! $this->checkDirection($direction)
            ||  ! $this->checkVersion($version)
            ||  ! $this->checkOrthography($orthography)
        ) {
            return $this;
        }
        if ($this->pairs) {
            foreach ($this->pairs->children() as $pair) {
                $pair->collectPatterns($search, $replace, $direction, $version, $orthography);
            }
        } else {
            $parser = Parser::getInstance();
            $search[] = ($direction === Converter::TO_LATIN_DIRECTION)
                ? $parser->parsePairTag($this->cyrillic, $this->getSearch($direction))
                : $parser->parsePairTag($this->latin, $this->getSearch($direction))
            ;
            $replace[] = ($direction === Converter::TO_LATIN_DIRECTION)
                ? $parser->parsePairTag($this->latin,  (string) $this->getReplace($direction))
                : $parser->parsePairTag($this->cyrillic,  (string) $this->getReplace($direction))
            ;
        }
        return $this;
    }

    /**
     * @param string $direction
     * @return bool
     */
    protected function checkDirection($direction)
    {
        if ($this->directions && 'true' !=  (string) $this->directions->{$direction}) {
            return false;
        }
        return true;
    }

    /**
     * @param string $version
     * @return bool
     */
    protected function checkVersion($version)
    {
        if ($this->versions && 'true' !=  (string) $this->versions->{$version}) {
            return false;
        }
        return true;
    }

    /**
     * @param string $orthography
     * @return bool
     */
    protected function checkOrthography($orthography)
    {
        if ($this->orthographies && 'true' !=  (string) $this->orthographies->{$orthography}) {
            return false;
        }
        return true;
    }
}