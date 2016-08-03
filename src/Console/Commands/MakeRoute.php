<?php

namespace Waterloocode\Router\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
// use Illuminate\Support\Composer;

class MakeRoute extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:route {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Create a new route class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Routes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->fire();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/router.stub';
    }

     /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        // echo config("router.namespace.route")."\n";
        // echo $rootNamespace.'\Http\Routes'."\n";
        // dd("over");
        return $rootNamespace.'\Http\Routes';
    }
}
