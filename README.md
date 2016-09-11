# Belarusian "Lacinka" Converter

The tool provides you with API that enables you to convert from Belarusian Latin script to Belarusian Cyrillic script and backward.

## Basic usage

### Composer
```
composer install
```

### PHP
```
use Michaskruzelka\Lacinka\Converter;

$converter = new Converter();
```

Conversion to Belarusian Traditional Latin alphabet:

```
$text = "
    Лацінка — іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы, нязвыклае, больш еўрапейскае
    — яна злучае нас з блізкімі нам народамі Цэнтральнай і Ўсходняй Еўропы: палякамі, чэхамі, харватамі,
    якім лацінка адкрывае беларускую мову як мову блізкую і зразумелую. Можа і камусь з беларусаў
    яе існаванне можа дадаць цікавасці да беларускай мовы?
";

$convertedText = $converter->convert($text);
```

To Belarusian Academic (Geographic) Latin alphabet:

```
$text = "
    Лацінка — іміджавая рэч, яна стварае зусім іншае ўражанне ад мовы, нязвыклае, больш еўрапейскае
    — яна злучае нас з блізкімі нам народамі Цэнтральнай і Ўсходняй Еўропы: палякамі, чэхамі, харватамі,
    якім лацінка адкрывае беларускую мову як мову блізкую і зразумелую. Можа і камусь з беларусаў
    яе існаванне можа дадаць цікавасці да беларускай мовы?
";

$convertedText = $converter->setVersion('geographic')->convert($text);
```

To Belarusian Cyrillic alphabet:

```
$text = "
    Łacinka — imidžavaja reč, jana stvaraje zusim inšaje ŭražannie ad movy, niazvykłaje, bolš jeŭrapiejskaje
    — jana złučaje nas z blizkimi nam narodami Centralnaj i Ŭschodniaj Jeŭropy: palakami, čechami, charvatami,
    jakim łacinka adkryvaje biełaruskuju movu jak movu blizkuju i zrazumiełuju. Moža i kamuś z biełarusaŭ
    jaje isnavannie moža dadać cikavasci da biełaruskaj movy?
";

$convertedText = $converter->directToCyrillic()->convert($text);
```

## Advanced questions
> The conversion rules are not comprehensive. How can I improve them?

You don't have to modify anything in business logic. Instead, all rules are stored in the /config/rules.xml file
where you can add, remove or modify any rule. Your rule should be structured as follows:

```
<rule name="[rule_name]">
   <sort>[number]</sort>
   <renderer>
       <name>[Some implementation of RendererInterface]</name>
       <search>[Search Pattern, can include <back> or <forth> inheriting nodes]</search>
       <replace>[Replacement, can include <back> or <forth> inheriting nodes]</replace>
   </renderer>
   <directions>
       <back>[true|false]</back>
       <forth>[true|false]</forth>
   </directions>
   <versions>
       <[version]>[true|false]</[version]>
       ...
   </versions>
   <orthographies>
       <[orthography]>[true|false]</[orthography]>
       ...
   </orthographies>
   <pairs>
       <pair>
           <cyrillic>[letter|word|etc]</cyrillic>
           <latin>[letter|word|etc]</latin>
           <versions>...</versions>
           <orthographies>...</orthographies>
           <directions>...</directions>
       </pair>
       ...
   </pairs>
</rule>
```
Moreover, you can apply your own rules in any xml file:
```
$converter = new Converter(false)->initRules([path_to_the_xml_file]);
```

> Is it possible to add another version of Belarusian Latin script (for instance, Archaic)?

Yes. Every version of the alphabet must be specified in /config/settings.php file.
```
...
'versions' => [
    'traditional',
    'geographic',
    '[your_version]'
],
...
```
```
$converter->setVersion([your_version]);
```

> How to extend functionality of the converter?

You can add new renderers. They must implement 'Michaskruzelka\Lacinka\Renderers\RendererInterface'.

## Links
- [Belarusian Latin Alphabet (Wikipedia)](https://en.wikipedia.org/wiki/Belarusian_Latin_alphabet)
- [ГІСТОРЫЯ МОВЫ Беларуская лацінка (Мова Нанова)](http://www.movananova.by/zaniatki/gistoryya-movy-belaruskaya-lacinka.html)
- [Лацінка вяртаецца (Наша Ніва)](http://nn.by/?c=ar&i=32647)
- [Як правільна пісаць беларускай лацінкай? (Наша Ніва)](http://nn.by/?c=ar&i=147849)
