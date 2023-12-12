<?php

namespace App\Console\Commands;
use Illuminate\Console\GeneratorCommand;
//use Illuminate\Console\Command;

class TraitGenerate extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat perintah generate Trait';

    protected $type="Trait";

    protected function getStub()
    {
        return __DIR__.'/stubs/traits.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Traits';
    }
}
