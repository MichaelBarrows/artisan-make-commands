<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeContractCommand extends GeneratorCommand
{
    protected $name = 'make:contract';
    protected $description = 'Create a new contract interface';
    protected $type = 'Contract';

    protected function getStub()
    {
        return __DIR__.'/../../stubs/interface.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Contracts';
    }
}
