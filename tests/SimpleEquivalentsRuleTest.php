<?php

namespace Michaskruzelka\Lacinka\Tests;

use Michaskruzelka\Lacinka\Converter;

class SimpleEquivalentsRuleTest extends DefaultRuleTest
{
//    public function setUp()
//    {
//        $this->converter = (new Converter(false))->initRules(__DIR__ . '/simple_equivalents_rule.xml');
//    }

    protected function getSourceAcademicCyTxt()
    {
        return "ЭэЫыШшЧчЦцФфЎўУуТтСсРрПпОоНнМмЛлКкЙйІіЗзЖжДдГгВвБбАаХх";
    }

    protected function getSourceClassicCyTxt()
    {
        return "ҐґЭэЫыШшЧчЦцФфЎўУуТтСсРрПпОоНнМмЛлКкЙйІіЗзЖжДдГгВвБбАаХх";
    }

    protected function getFromAcademicCyToDefaultLaTxt()
    {
        return "EeYyŠšČčCcFfǓŭUuTtSsRrPpOoNnMmLlKkJjIiZzŽžDdHhVvBbAaChch";
    }

    protected function getFromClassicCyToDefaultLaTxt()
    {
        return "GgEeYyŠšČčCcFfǓŭUuTtSsRrPpOoNnMmLlKkJjIiZzŽžDdHhVvBbAaChch";
    }

    protected function getFromAcademicCyToGeoLaTxt()
    {
        return "EeYyŠšČčCcFfǓŭUuTtSsRrPpOoNnMmLlKkJjIiZzŽžDdHhVvBbAaChch";
    }

    protected function getFromClassicCyToGeoLaTxt()
    {
        return "HhEeYyŠšČčCcFfǓŭUuTtSsRrPpOoNnMmLlKkJjIiZzŽžDdHhVvBbAaChch";
    }

    protected function getSourceDefaultLaTxt()
    {
        return "GgEeYyŠšČčCcFfǓŭUuTtSsRrPpOoNnMmKkJjIiZzŽžDdHhVvBbAaChch";
    }

    protected function getSourceGeoLaTxt()
    {
        return "EeYyŠšČčCcFfǓŭUuTtSsRrPpOoNnMmLlKkJjIiZzŽžDdHhVvBbAaChch";
    }

    protected function getFromDefaultLaToAcademicCyTxt()
    {
        return "ГгЭэЫыШшЧчЦцФфЎўУуТтСсРрПпОоНнМмКкЙйІіЗзЖжДдГгВвБбАаХх";
    }

    protected function getFromGeoLaToAcademicCyTxt()
    {
        return "ЭэЫыШшЧчЦцФфЎўУуТтСсРрПпОоНнМмЛлКкЙйІіЗзЖжДдГгВвБбАаХх";
    }

    protected function getFromDefaultLaToClassicCyTxt()
    {
        return "ҐґЭэЫыШшЧчЦцФфЎўУуТтСсРрПпОоНнМмКкЙйІіЗзЖжДдГгВвБбАаХх";
    }

    protected function getFromGeoLaToClassicCyTxt()
    {
        return "ЭэЫыШшЧчЦцФфЎўУуТтСсРрПпОоНнМмЛлКкЙйІіЗзЖжДдГгВвБбАаХх";
    }
}