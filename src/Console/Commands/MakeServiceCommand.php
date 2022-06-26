<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeServiceCommand extends GeneratorCommand
{
    protected $name = 'make:service';
    protected $description = 'Create a new service class';
    protected $type = 'Service';

    protected function getStub()
    {
        return __DIR__.'/../../stubs/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    protected function getOptions()
    {
        return [
            ['contract', null, InputOption::VALUE_NONE, 'Specify the contract to bind the service to.'],
        ];
    }

    protected function buildClass($name)
    {
        $replace = [];

        if ($this->option('contract')) {
            $replace['{{ contract }}'] = $this->option->contract;
            $replace['{{ contractImport }}'] = "use \\App\\Contracts\\{$this->option->contract};";
        }

        $replace['{{ service }}'] = $name;

        return $replace;
    }
}
