<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeInterfaceCommand extends GeneratorCommand
{
    protected $name = 'make:interface';
    protected $description = 'Create a new interface';
    protected $type = 'Interface';

    protected function getStub()
    {
        return $this->resolveStubPath(__DIR__.'/../../stubs/interface.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Interfaces';
    }
}
