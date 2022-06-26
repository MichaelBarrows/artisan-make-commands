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
            Commands\MakeInterfaceCommand::class,
            Commands\MakeServiceCommand::class,
            Commands\MakeTraitCommand::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
