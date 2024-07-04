<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\CamelCaseSplitter;

class CamelCaseSplitterDataProvider
{
    public static function getKeyChainByCamelCasedKey(): \Iterator
    {
        yield 'one word' => [
            'word' => 'foo',
            'expectedValues' => ['foo'],
        ];

        yield 'two words' => [
            'word' => 'fooBar',
            'expectedValues' => ['foo', 'bar'],
        ];

        yield 'three words' => [
            'word' => 'fooBarFoo1',
            'expectedValues' => ['foo', 'bar', 'foo1'],
        ];

        yield 'underscored word' => [
            'word' => 'fooBarFoo_bar',
            'expectedValues' => ['foo', 'bar', 'foo_bar'],
        ];
    }

}