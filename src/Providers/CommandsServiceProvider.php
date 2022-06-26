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
            Commands\MakeServiceCommand::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
