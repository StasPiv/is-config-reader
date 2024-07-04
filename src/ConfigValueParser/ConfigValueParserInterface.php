<?php

declare(strict_types = 1);

namespace StanislavPivovartsev\InterestingStatistics\ConfigReader\ConfigValueParser;

interface ConfigValueParserInterface
{
    public function getValue(string $dottedKey): mixed;
}