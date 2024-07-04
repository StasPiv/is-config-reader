<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\CamelCaseSplitter;

class CamelCaseSplitter implements CamelCaseSplitterInterface
{
    public function getKeyChainByCamelCasedKey(string $camelCasedKey): array
    {
        preg_match_all('/(?:^|[A-Z])[a-z0-9_]+/', $camelCasedKey,$matches);

        return array_map(fn (string $value) => lcfirst($value), $matches[0]);
    }
}