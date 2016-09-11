<?php

namespace Michaskruzelka\Lacinka;

/**
 * Class Parser
 * @package Michaskruzelka\Lacinka
 * @author Mikhail Marchanka <michaskruzelka@gmail.com>
 */
class Parser
{
    const L_DELIM = '[[';
    const R_DELIM = ']]';

    const PAIR_TAG = 'pair';

    /**
     * @param string $replace
     * @param string $text
     * @return string
     */
    public static function parsePairTag($replace, $text)
    {
        $search = self::L_DELIM . self::PAIR_TAG . self::R_DELIM;
        return str_replace($search, $replace, $text);
    }
}