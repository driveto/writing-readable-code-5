<?php

namespace App\Phase4;

class Car
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $mpg;

    public function __construct(
        int $id,
        string $name,
        int $mpg
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->mpg = $mpg;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMpg(): int
    {
        return $this->mpg;
    }
}