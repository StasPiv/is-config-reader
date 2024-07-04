<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\ConfigFetcher;

use InvalidArgumentException;

class ConfigFetcherFactory
{
    public function createConfigFetcher(string $configPath): ConfigFetcherInterface
    {
        $type = pathinfo($configPath, PATHINFO_EXTENSION);

        return match ($type) {
            'json' => new JsonConfigFetcher($configPath),
            default => throw new InvalidArgumentException('Unknown config fetcher type ' . $type),
        };
    }
}