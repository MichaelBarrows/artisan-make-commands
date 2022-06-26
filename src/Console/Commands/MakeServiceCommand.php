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
        $stub = null;
        if ($this->option('contract')) {
            $stub = 'service.contractable.stub';
        }

        return __DIR__.'/../../stubs/' . ($stub ?: 'service.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    protected function getOptions()
    {
        return [
            ['contract', null, InputOption::VALUE_OPTIONAL, 'Specify the contract to bind the service to.'],
        ];
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $replace = [];

        if ($this->option('contract')) {
            $replace['{{ contract }}'] = $this->option('contract');
            $replace['{{ contractImport }}'] = 'App\\Contracts\\' . $this->option('contract');
        }

        return str_replace(
            array_keys($replace),
            array_values($replace),
            $stub
        );
    }
}
