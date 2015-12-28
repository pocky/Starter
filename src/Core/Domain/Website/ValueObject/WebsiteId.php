<?php

namespace Black\Core\Domain\Website\ValueObject;

final class WebsiteId
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isEqualTo(WebsiteId $id)
    {
        return $this->getValue() === $id->getValue();
    }
}
