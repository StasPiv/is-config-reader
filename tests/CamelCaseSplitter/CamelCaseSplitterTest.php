<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\CamelCaseSplitter;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\ConfigReader\CamelCaseSplitter\CamelCaseSplitter;

class CamelCaseSplitterTest extends TestCase
{
    /**
     * @param array<string> $expectedValue
     *
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\CamelCaseSplitter\CamelCaseSplitterDataProvider::getKeyChainByCamelCasedKey
     */
    public function testGetKeyChainByCamelCasedKey(string $camelCasedKey, array $expectedValue): void
    {
        // arrange
        $configValueParser = new CamelCaseSplitter();

        // act
        $actualValue = $configValueParser->getKeyChainByCamelCasedKey($camelCasedKey);

        // assert
        self::assertSame($expectedValue, $actualValue);
    }

}