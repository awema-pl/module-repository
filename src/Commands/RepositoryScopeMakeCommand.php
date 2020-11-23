<?php

namespace AwemaPL\Repository\Commands;

use AwemaPL\Repository\Services\Replacer;
use Illuminate\Console\GeneratorCommand;

class RepositoryScopeMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository:scope {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Awema.PL repository scope';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Awema.PL platform repository scope';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false) {
            return true;
        }
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $this->type = $this->type . ' ' . $name;

        return (new Replacer(parent::buildClass($name)))
            ->replace($name);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/scope.stub';
    }
}
