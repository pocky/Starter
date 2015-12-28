<?php

namespace Black\Core\Domain\Website\ValueObject;

final class Author
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

    public function isEqualTo(Author $author) : bool
    {
        return $this->getValue() === $author->getValue();
    }
}
