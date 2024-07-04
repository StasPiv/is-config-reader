<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\CamelCaseSplitter;

interface CamelCaseSplitterInterface
{
    /**
     * @return array<int, string>
     */
    public function getKeyChainByCamelCasedKey(string $camelCasedKey): array;
}