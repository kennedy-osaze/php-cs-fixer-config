<?php

namespace KennedyOsaze\PhpCsFixerConfig;

use PhpCsFixer\Config as FixerConfig;
use PhpCsFixer\Finder;

class Config extends FixerConfig
{
    public static function create(Finder $finder, bool $riskAllowed = true): self
    {
        return (new static())
            ->setFinder($finder)
            ->setRiskyAllowed($riskAllowed)
            ->setRules(static::getDefaultRules());
    }

    public function mergeRules(array $rules): self
    {
        $this->setRules(array_merge($this->getRules(), $rules));

        return $this;
    }

    public static function getDefaultRules(): array
    {
        return require __DIR__.'/rules.php';
    }
}
