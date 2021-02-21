<?php

namespace Mbrianp\FuncCollectiono\DIC;

class Service
{
    public function __construct(
        public string $id,
        public string $class,
        public array $params = [],
    )
    {
    }

    public function newInstance(): object
    {
        return new ($this->class)(...$this->params);
    }
}