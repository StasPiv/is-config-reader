<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\Tests\ConfigValueParser;

class ConfigValueParserDataProvider
{
    public static function provideDataForGetValue(): \Iterator
    {
        yield 'depth 0' => [
            'config' => [
                'foo' => 'bar'
            ],
            'dottedKey' => 'foo',
            'expectedValue' => 'bar',
        ];

        yield 'depth 1' => [
            'config' => [
                'foo' => [
                    'foo' => 'bar',
                    'foo1' => 'bar1'
                ]
            ],
            'dottedKey' => 'foo.foo1',
            'expectedValue' => 'bar1',
        ];

        yield 'depth 2' => [
            'config' => [
                'foo' => [
                    'foo' => 'bar',
                    'foo1' => [
                        'foo2' => 'bar2',
                    ]
                ]
            ],
            'dottedKey' => 'foo.foo1.foo2',
            'expectedValue' => 'bar2',
        ];

        yield 'return array' => [
            'config' => [
                'foo' => [
                    'foo' => 'bar',
                    'foo1' => [
                        'foo2' => 'bar2',
                    ]
                ]
            ],
            'dottedKey' => 'foo.foo1',
            'expectedValue' => [
                'foo2' => 'bar2',
            ],
        ];
    }

    public static function provideDataForCall(): \Iterator
    {
        yield 'depth 0' => [
            'config' => [
                'foo' => 'bar'
            ],
            'methodName' => 'getFoo',
            'expectedValue' => 'bar',
        ];

        yield 'depth 1' => [
            'config' => [
                'foo' => [
                    'foo' => 'bar',
                    'foo1' => 'bar1'
                ]
            ],
            'methodName' => 'getFooFoo1',
            'expectedValue' => 'bar1',
        ];

        yield 'underscored key' => [
            'config' => [
                'foo_bar' => [
                    'foo' => 'bar',
                    'foo1' => 'bar1'
                ]
            ],
            'methodName' => 'getFoo_barFoo1',
            'expectedValue' => 'bar1',
        ];
    }
}