<?php

declare(strict_types = 1);

namespace Framework\Command;

interface CommandInterface
{
    /**
     * @param array $params
     *
     * @return array
     */
    public function execute(array $params): array;
}