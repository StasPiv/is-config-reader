<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\ConfigValueParser;

use StanislavPivovartsev\InterestingStatistics\ConfigReader\CamelCaseSplitter\CamelCaseSplitterInterface;

class ConfigValueParser implements ConfigValueParserInterface
{
    /**
     * @param array<mixed> $config
     */
    public function __construct(
        private readonly array $config,
        private readonly CamelCaseSplitterInterface $camelCaseSplitter,
    ) {
    }

    /**
     * @param array<int, string> $arguments
     */
    public function __call(string $name, array $arguments): mixed
    {
        $camelCasedKey = lcfirst(str_replace('get', '', $name));

        return $this->getValueByCamelCasedKey($camelCasedKey);
    }

    public function getValue(string $dottedKey): mixed
    {
        $keyChain = explode('.', $dottedKey);

        return $this->getValueByKeyChain($keyChain);
    }

    public function getValueByCamelCasedKey(string $camelCasedKey): mixed
    {
        return $this->getValueByKeyChain($this->camelCaseSplitter->getKeyChainByCamelCasedKey($camelCasedKey));
    }

    /**
     * @param array<string> $keyChain
     */
    private function getValueByKeyChain(array $keyChain): mixed
    {
        $returnValue = $this->config;
        $depth = 0;

        do {
            if (!is_array($returnValue)) {
                break;
            }

            $returnValue = $returnValue[$keyChain[$depth++]] ?? '';
        } while ($returnValue !== '' && $depth < count($keyChain));

        return $returnValue;
    }
}