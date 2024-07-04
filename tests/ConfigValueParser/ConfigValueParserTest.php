<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\ConfigValueParser;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\ConfigReader\CamelCaseSplitter\CamelCaseSplitter;
use StanislavPivovartsev\InterestingStatistics\ConfigReader\CamelCaseSplitter\CamelCaseSplitterInterface;
use StanislavPivovartsev\InterestingStatistics\ConfigReader\ConfigValueParser\ConfigValueParser;

class ConfigValueParserTest extends TestCase
{
    /**
     * @param array<mixed> $config
     *
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\ConfigValueParser\ConfigValueParserDataProvider::provideDataForGetValue
     */
    public function testGetValue(array $config, string $dottedKey, mixed $expectedValue): void
    {
        // arrange
        $configValueParser = new ConfigValueParser($config, $this->createMock(CamelCaseSplitterInterface::class));

        // act
        $actualValue = $configValueParser->getValue($dottedKey);

        // assert
        self::assertSame($expectedValue, $actualValue);
    }

    /**
     * @param array<mixed> $config
     *
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\ConfigValueParser\ConfigValueParserDataProvider::provideDataForCall
     */
    public function testCall(array $config, string $methodName, mixed $expectedValue): void
    {
        // arrange
        $configValueParser = new ConfigValueParser($config, new CamelCaseSplitter());

        // act
        $actualValue = $configValueParser->{$methodName}();

        // assert
        self::assertSame($expectedValue, $actualValue);
    }
}
