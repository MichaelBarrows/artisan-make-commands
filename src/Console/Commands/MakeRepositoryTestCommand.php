<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeRepositoryTestCommand extends GeneratorCommand
{
    protected $name = 'make:repository-test';
    protected $description = 'Create a new repository test class';
    protected $type = 'Test';

    protected function getStub()
    {
        return __DIR__.'/../../stubs/repository-test.stub';
    }

    protected function rootNamespace()
    {
        return 'Tests';
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return base_path('tests').str_replace('\\', '/', $name).'.php';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Unit\Repositories";
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $replace = [];

        $model = Str::of($this->argument('name'))
            ->before('Repository')
            ->after('/')
            ->value();
        $repository = "{$model}Repository";
        $replace['{{ model }}'] = $model;
        $replace['{{ repository }}'] = $repository;

        return str_replace(
            array_keys($replace),
            array_values($replace),
            $stub
        );
    }
}
