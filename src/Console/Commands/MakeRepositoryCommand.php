<?php

namespace MichaelBarrows\ArtisanMakeCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MakeRepositoryCommand extends GeneratorCommand
{
    protected $name = 'make:repository';
    protected $description = 'Create a new repository class';
    protected $type = 'Repository';

    protected function getStub()
    {
        return __DIR__.'/../../stubs/repository.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $replace = [];

        $model = Str::before($this->argument('name'), 'Repository');
        $replace['{{ model }}'] = $model;
        $replace['{{ modelImport }}'] = "use App\\Models\\{$model};";

        return str_replace(
            array_keys($replace),
            array_values($replace),
            $stub
        );
    }

    public function handle()
    {
        parent::handle();

        $this->call('make:repository-test', [
            'name' => "{$this->argument('name')}Test",
        ]);
    }
}
