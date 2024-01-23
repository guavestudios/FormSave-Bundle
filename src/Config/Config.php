<?php

namespace Guave\FormSaveBundle\Config;

class Config
{
    private string $quote = '"';
    private string $separator = ',';

    public function __construct(array $config)
    {
        if (isset($config['quote'])) {
            $this->setQuote($config['quote']);
        }
        if (isset($config['separator'])) {
            $this->setSeparator($config['separator']);
        }
    }

    public function getQuote(): string
    {
        return $this->quote;
    }

    private function setQuote(string $quote): void
    {
        $this->quote = $quote;
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }

    private function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }
}
