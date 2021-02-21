<?php

namespace Mbrianp\FuncCollection\DIC;

class DIC
{
    /**
     * @var Service[]
     */
    private array $services;

    private array $instantiatedServices = [];

    /**
     * @param array<int, Service> $services
     */
    public function __construct(array $services = [])
    {
        foreach ($services as $service) {
            $this->addService($service);
        }
    }

    public function addService(Service $service): void
    {
        $this->services[$service->id] = $service;
    }

    public function getService(string $id, bool $fromMemory = true): object
    {
        if (!isset($this->instantiatedServices[$id]) || false == $fromMemory) {
            $service = $this->services[$id];
            $this->instantiatedServices[$id] = $service;

            return $service->newInstance();
        }

        return $this->instantiatedServices[$id]->newInstance();
    }
}