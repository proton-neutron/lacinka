<?php

namespace Michaskruzelka\Lacinka;

use Michaskruzelka\Lacinka\Renderers\Factory;
use Michaskruzelka\Lacinka\Rule;

/**
 * Class Converter
 *
 * This is the only class that should be instantiated by the client.
 * It does the main job: initializes, sorts and applies the rules given from
 * adjustable xml file
 *
 * @package Michaskruzelka\Lacinka
 * @author Proton Neutron
 */
class Converter
{
    const TO_LATIN_DIRECTION = 'forth';
    const TO_CYRILLIC_DIRECTION = 'back';

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $renderers = [];

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $orthography;

    /**
     * Converter constructor.
     * @param bool $init
     */
    public function __construct($init = true)
    {
        $this->initConfig();
        $this->directToLatin();
        $this->setVersion(current($this->config['versions']));
        $this->setOrthography(current($this->config['orthographies']));
        if ($init) {
            $this->initRules($this->getDefaultRulesConfigFile());
        }
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function initRules($fileName)
    {
        $rootNode = simplexml_load_file($fileName, Rule::class);
        $rootNode->checkNodeName('rules');
        $this->rules = $rootNode->asArray();
        $this->sortRules();
        array_walk($this->rules, [$this, 'initRule']);
        return $this;
    }

    /**
     * @param string $text
     * @return string
     */
    public function convert($text)
    {
        foreach ($this->rules as $rule) {
            $this->applyRule($rule, $text);
        }
        return $text;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @return $this
     */
    public function directToLatin()
    {
        return $this->setDirection(self::TO_LATIN_DIRECTION);
    }

    /**
     * @return $this
     */
    public function directToCyrillic()
    {
        return $this->setDirection(self::TO_CYRILLIC_DIRECTION);
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     * @throws \Exception
     */
    public function setVersion($version)
    {
        if ( ! in_array($version, $this->config['versions'])) {
            throw new \Exception("Unsupported version: {$version}");
        }
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrthography()
    {
        return $this->orthography;
    }

    /**
     * @param string $orthography
     * @return $this
     * @throws \Exception
     */
    public function setOrthography($orthography)
    {
        if ( ! in_array($orthography, $this->config['orthographies'])) {
            throw new \Exception("Unsupported orthography: {$orthography}");
        }
        $this->orthography = $orthography;
        return $this;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function initConfig()
    {
        foreach (glob(__DIR__ . "/config/*.php") as $file) {
            $this->config = array_merge($this->config, include $file);
        }
        $versions = $this->config['versions'];
        $orthographies = $this->config['orthographies'];
        if (empty($versions) ||  ! is_array($versions)) {
            throw new \Exception('There are no versions in settings');
        }
        if (empty($orthographies) ||  ! is_array($orthographies)) {
            throw new \Exception('There are no orthographies in settings');
        }
        return $this;
    }

    /**
     * @param Rule $ruleNode
     * @return $this
     * @throws \Exception
     */
    protected function initRule(Rule $ruleNode)
    {
        $ruleNode->validate();
        $rendererName =  (string) $ruleNode->renderer->name;
        $this->addRenderer($rendererName);
        return $this;
    }

    /**
     * @param Rule $rule
     * @param string $text
     * @return $this
     */
    protected function applyRule(Rule $rule, &$text)
    {
        $renderer = $this->renderers[ (string) $rule->renderer->name];
        $rule->apply(
            $renderer,
            $this->getDirection(),
            $this->getVersion(),
            $this->getOrthography(),
            $text
        );
        return $this;
    }

    /**
     * @param string $rendererName
     * @return $this
     * @throws \Exception
     */
    protected function addRenderer($rendererName)
    {
        if ( ! isset($this->renderers[$rendererName])) {
            $this->renderers[$rendererName] = Factory::getInstance($rendererName);
        }
        return $this;
    }

    /**
     * @param string $direction
     * @return $this
     */
    protected function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @return string
     */
    protected function getDefaultRulesConfigFile()
    {
        return __DIR__ . '/config/rules.xml';
    }

    /**
     * @return $this
     */
    protected function sortRules()
    {
        usort($this->rules, function($a, $b) {
            if ( ! isset($b->sort)) {
                return -1;
            }
            if ( ! isset($a->sort)) {
                return 1;
            }
            return $a->sort - $b->sort;
        });
        return $this;
    }
}
