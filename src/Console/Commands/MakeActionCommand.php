<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeActionCommand extends GeneratorCommand
{
    protected $name = 'make:action';
    protected $description = 'Create a new action class';
    protected $type = 'Action';

    protected function getStub()
    {
        return $this->resolveStubPath(__DIR__.'/../../stubs/action.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Actions';
    }
}
