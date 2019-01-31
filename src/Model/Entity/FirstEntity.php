<?php

namespace Model\Entity;

abstract class FirstEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    final public function templateMethod(){
        $this->getId();
        $this->getName();
    }

    protected function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    protected function getName(): string
    {
        return $this->name;
    }
}