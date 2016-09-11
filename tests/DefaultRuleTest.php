<?php

namespace Michaskruzelka\Lacinka\Tests;

use Michaskruzelka\Lacinka\Converter;

class DefaultRuleTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->converter = new Converter();
    }

    public function testFromAcademicToDefault()
    {
        $expected = $this->getFromAcademicCyToDefaultLaTxt();
        $actual = $this->converter
            ->setOrthography('academic')
            ->setVersion('traditional')
            ->convert($this->getSourceAcademicCyTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromClassicToDefault()
    {
        $expected = $this->getFromClassicCyToDefaultLaTxt();
        $actual = $this->converter
            ->setOrthography('classic')
            ->setVersion('traditional')
            ->convert($this->getSourceClassicCyTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromAcademicToGeo()
    {
        $expected = $this->getFromAcademicCyToGeoLaTxt();
        $actual = $this->converter
            ->setOrthography('academic')
            ->setVersion('geographic')
            ->convert($this->getSourceAcademicCyTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromClassicToGeo()
    {
        $expected = $this->getFromClassicCyToGeoLaTxt();
        $actual = $this->converter
            ->setOrthography('classic')
            ->setVersion('geographic')
            ->convert($this->getSourceClassicCyTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromDefaultToAcademic()
    {
        $expected = $this->getFromDefaultLaToAcademicCyTxt();
        $actual = $this->converter
            ->setOrthography('academic')
            ->setVersion('traditional')
            ->directToCyrillic()
            ->convert($this->getSourceDefaultLaTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromGeoToAcademic()
    {
        $expected = $this->getFromGeoLaToAcademicCyTxt();
        $actual = $this->converter
            ->setOrthography('academic')
            ->setVersion('geographic')
            ->directToCyrillic()
            ->convert($this->getSourceGeoLaTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromDefaultToClassic()
    {
        $expected = $this->getFromDefaultLaToClassicCyTxt();
        $actual = $this->converter
            ->setOrthography('classic')
            ->setVersion('traditional')
            ->directToCyrillic()
            ->convert($this->getSourceDefaultLaTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    public function testFromGeoToClassic()
    {
        $expected = $this->getFromGeoLaToAcademicCyTxt();
        $actual = $this->converter
            ->setOrthography('classic')
            ->setVersion('geographic')
            ->directToCyrillic()
            ->convert($this->getSourceGeoLaTxt())
        ;
        $this->assertEquals($expected, $actual);
    }

    protected function getSourceAcademicCyTxt()
    {
        return "Лацінка - іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы.";
    }

    protected function getSourceClassicCyTxt()
    {
        return "Лацінка - іміджавая рэч, яна стварае зусім іншае ўражаньне ад мовы.";
    }

    protected function getFromAcademicCyToDefaultLaTxt()
    {
        return "Łacinka - imidžavaja reč, jana stvaraje zusim inšaje ŭražannie ad movy.";
    }

    protected function getFromClassicCyToDefaultLaTxt()
    {
        return "Łacinka - imidžavaja reč, jana stvaraje zusim inšaje ŭražańnie ad movy.";
    }

    protected function getFromAcademicCyToGeoLaTxt()
    {
        return "Lacinka - imidžavaja reč, jana stvaraje zusim inšaje ŭražannie ad movy.";
    }

    protected function getFromClassicCyToGeoLaTxt()
    {
        return "Lacinka - imidžavaja reč, jana stvaraje zusim inšaje ŭražańnie ad movy.";
    }

    protected function getSourceDefaultLaTxt()
    {
        return "Łacinka - imidžavaja reč, jana stvaraje zusim inšaje ŭražannie ad movy.";
    }

    protected function getSourceGeoLaTxt()
    {
        return "Lacinka - imidžavaja reč, jana stvaraje zusim inšaje ŭražannie ad movy.";
    }

    protected function getFromDefaultLaToAcademicCyTxt()
    {
        return "Лацінка - іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы.";
    }

    protected function getFromGeoLaToAcademicCyTxt()
    {
        return "Лацінка - іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы.";
    }

    protected function getFromDefaultLaToClassicCyTxt()
    {
        return "Лацінка - іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы.";
    }

    protected function getFromGeoLaToClassicCyTxt()
    {
        return "Лацінка - іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы.";
    }
}
