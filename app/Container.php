<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if(!$this->has($id)){
            throw new NotFoundException('Class "'.$id.'" has no binding');
        }
    }

    public function has(string $id): bool
    {
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }
}
