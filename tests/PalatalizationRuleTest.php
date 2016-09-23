<?php

namespace Michaskruzelka\Lacinka\Tests;

class PalatalizationRuleTest extends DefaultRuleTest
{
    protected function getSourceAcademicCyTxt()
    {
        return "ць сь нь зь ль Ць Сь Нь Зь Ль. Лось прыплыў на лодцы, пляская ў ладкі. Працуе руль";
    }

    protected function getSourceClassicCyTxt()
    {
        return "ць сь нь зь ль Ць Сь Нь Зь Ль. Лось прыплыў на лодцы, пляская ў ладкі. Працуе руль";
    }

    protected function getFromAcademicCyToDefaultLaTxt()
    {
        return "ć ś ń ź l Ć Ś Ń Ź L. Łoś prypłyŭ na łodcy, plaskaja ŭ ładki. Pracuje rul";
    }

    protected function getFromClassicCyToDefaultLaTxt()
    {
        return "ć ś ń ź l Ć Ś Ń Ź L. Łoś prypłyŭ na łodcy, plaskaja ŭ ładki. Pracuje rul";
    }

    protected function getFromAcademicCyToGeoLaTxt()
    {
        return "ć ś ń ź ĺ Ć Ś Ń Ź Ĺ. Loś pryplyŭ na lodcy, pliaskaja ŭ ladki. Pracuje ruĺ";
    }

    protected function getFromClassicCyToGeoLaTxt()
    {
        return "ć ś ń ź ĺ Ć Ś Ń Ź Ĺ. Loś pryplyŭ na lodcy, pliaskaja ŭ ladki. Pracuje ruĺ";
    }

    protected function getSourceDefaultLaTxt()
    {
        return "ć ś ń ź l Ć Ś Ń Ź L. Łoś prypłyŭ na łodcy, plaskaja ŭ ładki. Pracuje rul";
    }

    protected function getSourceGeoLaTxt()
    {
        return "ć ś ń ź ĺ Ć Ś Ń Ź Ĺ. Loś pryplyŭ na lodcy, pliaskaja ŭ ladki. Pracuje ruĺ";
    }

    protected function getFromDefaultLaToAcademicCyTxt()
    {
        return "ць сь нь зь ль Ць Сь Нь Зь Ль. Лось прыплыў на лодцы, пляская ў ладкі. Працуе руль";
    }

    protected function getFromGeoLaToAcademicCyTxt()
    {
        return "ць сь нь зь ль Ць Сь Нь Зь Ль. Лось прыплыў на лодцы, пляская ў ладкі. Працуе руль";
    }

    protected function getFromDefaultLaToClassicCyTxt()
    {
        return "ць сь нь зь ль Ць Сь Нь Зь Ль. Лось прыплыў на лодцы, пляская ў ладкі. Працуе руль";
    }

    protected function getFromGeoLaToClassicCyTxt()
    {
        return "ць сь нь зь ль Ць Сь Нь Зь Ль. Лось прыплыў на лодцы, пляская ў ладкі. Працуе руль";
    }
}