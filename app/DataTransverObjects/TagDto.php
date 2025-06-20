<?php

namespace App\DataTransverObjects;

class TagDto
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
