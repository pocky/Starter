<?php

namespace Black\Core\Domain\Website\ValueObject;

final class Author
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

    public function isEqualTo(Author $author)
    {
        return $this->getValue() === $author->getValue();
    }
}
