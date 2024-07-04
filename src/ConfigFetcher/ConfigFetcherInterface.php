<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\ConfigFetcher;

interface ConfigFetcherInterface
{
    /**
     * @return array<mixed>
     */
    public function getConfig(): array;
}