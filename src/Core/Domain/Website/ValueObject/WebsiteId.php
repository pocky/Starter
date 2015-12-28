<?php

namespace Black\Core\Domain\Website\ValueObject;

final class WebsiteId
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue() : string
    {
        return (string) $this->value;
    }

    public function isEqualTo(WebsiteId $id) : bool
    {
        return $this->getValue() === $id->getValue();
    }
}
