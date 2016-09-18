<?php

namespace Michaskruzelka\Lacinka;

/**
 * Class Parser
 * @package Michaskruzelka\Lacinka
 * @author Mikhail Marchanka <michaskruzelka@gmail.com>
 */
class Parser
{
    /**
     * @var Parser
     */
    protected static $instance;

    protected $l_delim = '[[';
    protected $r_delim = ']]';

    protected $pairTag = 'pair';

    /**
     * @return Parser
     */
    public static function getInstance()
    {
        if ( ! self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param string $replace
     * @param string $text
     * @return string
     */
    public function parsePairTag($replace, $text)
    {
        return $this->replace($this->pairTag, $replace, $text);
    }

    /**
     * @param string $tag
     * @param string $replace
     * @param string $text
     * @return string
     */
    protected function replace($tag, $replace, $text)
    {
        $search = $this->l_delim . $tag . $this->r_delim;
        return str_replace($search, $replace, $text);
    }
}