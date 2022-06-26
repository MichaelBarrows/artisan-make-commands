<?php

namespace MichaelBarrows\ArtisanMakeCommands\Providers;

use Illuminate\Support\ServiceProvider;
use MichaelBarrows\ArtisanMakeCommands\Console\Commands;

class CommandsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            Commands\MakeActionCommand::class,
            Commands\MakeContractCommand::class,
            Commands\MakeEnumCommand::class,
            Commands\MakeInterfaceCommand::class,
            Commands\MakeServiceCommand::class,
            Commands\MakeTraitCommand::class,
        ]);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Console/Commands' => app_path('Console/Commands/vendor/artisan-make-commands'),
        ], 'commands');
        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs/vendor/artisan-make-commands'),
        ], 'stubs');
    }
}
