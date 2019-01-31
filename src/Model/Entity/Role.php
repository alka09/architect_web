<?php

declare(strict_types = 1);

namespace Model\Entity;

class Role extends FirstEntity
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    /**
     * @param int $id
     * @param string $title
     * @param string $type
     */
    public function __construct(int $id, string $title, string $type)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
