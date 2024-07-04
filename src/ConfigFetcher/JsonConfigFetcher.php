<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\ConfigFetcher;

use RuntimeException;

class JsonConfigFetcher implements ConfigFetcherInterface
{
    /**
     * @var array<mixed>
     */
    private array $config;

    public function __construct(
        private readonly string $configPath,
    ) {
    }

    /**
     * @return array<mixed>
     */
    public function getConfig(): array
    {
        if (isset($this->config)) {
            return $this->config;
        }

        $pgnFileContent = file_get_contents($this->configPath);

        if (!is_string($pgnFileContent)) {
            throw new RuntimeException('Can not parse config ' . $this->configPath);
        }

        $parsedConfig = json_decode($pgnFileContent, true);

        if (!is_array($parsedConfig)) {
            throw new RuntimeException('Can not parse config ' . $this->configPath);
        }

        return $this->config = $parsedConfig;
    }
}
