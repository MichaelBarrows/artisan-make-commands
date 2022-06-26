<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeEnumCommand extends GeneratorCommand
{
    protected $name = 'make:enum';
    protected $description = 'Create a new enum';
    protected $type = 'Enum';

    protected function getStub()
    {
        return __DIR__.'/../../stubs/enum.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Enums';
    }
}
