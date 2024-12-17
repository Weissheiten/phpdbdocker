<?php

namespace Htlw3r\Dockerwebdemo\Model\Entity;

class User
{
    public function __construct(protected int $ID, protected string $name){}

    public function getID(): int
    {
        return $this->ID;
    }

    public function getName(): string
    {
        return $this->name;
    }
}