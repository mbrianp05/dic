<?php

namespace Mbrianp\Component\DIC;

interface DependenciesDefinitionInterface
{
    public function __construct(DIC $dependenciesContainer, array $config);

    /**
     * @return Service[]
     */
    public function getServices(): array;
}