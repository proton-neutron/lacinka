<?php

namespace Michaskruzelka\Lacinka\Tests;

use Michaskruzelka\Lacinka\Converter;

class ApostropheRuleTest extends DefaultRuleTest
{
//    public function setUp()
//    {
//        $this->converter = (new Converter(false))->initRules(__DIR__ . '/apostrophe_rules.xml');
//    }

    protected function getSourceAcademicCyTxt()
    {
        return "З'явіўся лось у лесе ў Мар'інай Горцы. Ці 'зьявіўся'? Не, 'з'явіўся'.";
    }

    protected function getSourceClassicCyTxt()
    {
        return "Зьявіўся лось у лесе ў Мар'інай Горцы. Ці 'з'явіўся'? Не, 'зьявіўся'.";
    }

    protected function getFromAcademicCyToDefaultLaTxt()
    {
        return "Zjaviŭsia łoś u lesie ŭ Marjinaj Horcy. Ci 'źjaviŭsia'? Nie, 'zjaviŭsia'.";
    }

    protected function getFromClassicCyToDefaultLaTxt()
    {
        return "Źjaviŭsia łoś u lesie ŭ Marjinaj Horcy. Ci 'zjaviŭsia'? Nie, 'źjaviŭsia'.";
    }

    protected function getFromAcademicCyToGeoLaTxt()
    {
        return "Z'javiŭsia loś u liesie ŭ Mar'jinaj Horcy. Ci 'źjaviŭsia'? Nie, 'z'javiŭsia'.";
    }

    protected function getFromClassicCyToGeoLaTxt()
    {
        return "Źjaviŭsia loś u liesie ŭ Mar'jinaj Horcy. Ci 'z'javiŭsia'? Nie, 'źjaviŭsia'.";
    }

    protected function getSourceDefaultLaTxt()
    {
        return "Zjaviŭsia łoś u lesie ŭ Marjinaj Horcy. Ci 'źjaviŭsia'? Nie, 'zjaviŭsia'.";
    }

    protected function getSourceGeoLaTxt()
    {
        return "Z'javiŭsia loś u liesie ŭ Mar'jinaj Horcy. Ci 'źjaviŭsia'? Nie, 'zjaviŭsia'.";
    }

    protected function getFromDefaultLaToAcademicCyTxt()
    {
        return "З'явіўся лось у лесе ў Мар'інай Горцы. Ці 'зьявіўся'? Не, 'з'явіўся'.";
    }

    protected function getFromGeoLaToAcademicCyTxt()
    {
        return "З'явіўся лось у лесе ў Мар'інай Горцы. Ці 'зьявіўся'? Не, 'з'явіўся'.";
    }

    protected function getFromDefaultLaToClassicCyTxt()
    {
        return "З'явіўся лось у лесе ў Мар'інай Горцы. Ці 'зьявіўся'? Не, 'з'явіўся'.";
    }

    protected function getFromGeoLaToClassicCyTxt()
    {
        return "З'явіўся лось у лесе ў Мар'інай Горцы. Ці 'зьявіўся'? Не, 'з'явіўся'.";
    }
}