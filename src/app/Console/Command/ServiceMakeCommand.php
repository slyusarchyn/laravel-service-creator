<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

/**
 * Class ServiceMakeCommand
 * @package App\Console\Commands
 * @author  Alexander Slyusarchyn <alex.slyusarchyn@gmail.com>
 */
class ServiceMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : Class (singular) for example UserService} {--p : Create service provider for this service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Service';

    /**
     * @var Filesystem
     */
    private $files;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = ucfirst($this->argument("name"));
        $sp = $this->option('p');

        if (!preg_match("/Service$/", $name)) {
            $name .= "Service";
        }

        try {
            $this->makeService($name);
            $this->makeServiceContract($name);

            if ($sp) {
                $this->makeServiceProvider($name);
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @param $type
     * @return string
     */
    protected function getStub($type)
    {
        return file_get_contents(__DIR__ . "/stubs/{$type}.stub");
    }

    /**
     * @param $name
     */
    protected function makeService($name)
    {
        $serviceTemplate = str_replace(
            ["{{serviceName}}"],
            [$name],
            $this->getStub("service")
        );

        $dirPath = app_path("Services/" . $name);
        if (!$this->files->exists($dirPath)) {
            $this->files->makeDirectory($dirPath, 0755, true);
        }

        $filePath = app_path("Services/{$name}/{$name}.php");
        if ($this->files->exists($filePath)) {
            $this->error("Service already exist!");
        } else {
            $this->files->put($filePath, $serviceTemplate);
            $this->info("Service created successfully.");
        }
    }

    /**
     * @param $name
     */
    protected function makeServiceContract($name)
    {
        $contractTemplate = str_replace(
            ["{{serviceName}}"],
            [$name],
            $this->getStub("service.contract")
        );

        $dirPath = app_path("Services/{$name}/Contracts");
        if (!$this->files->exists($dirPath)) {
            $this->files->makeDirectory($dirPath, 0755, true);
        }

        $filePath = app_path("Services/{$name}/Contracts/{$name}Contract.php");
        if ($this->files->exists($filePath)) {
            $this->error("Service contract already exist!");
        } else {
            $this->files->put($filePath, $contractTemplate);
            $this->info("Service contract created successfully.");
        }
    }

    /**
     * @param $name
     */
    protected function makeServiceProvider($name)
    {
        $contractTemplate = str_replace(
            ["{{serviceName}}"],
            [$name],
            $this->getStub("service.provider")
        );

        $dirPath = app_path("Providers");
        if (!$this->files->exists($dirPath)) {
            $this->files->makeDirectory($dirPath, 0755, true);
        }

        $filePath = app_path("Providers/{$name}ServiceProvider.php");
        if ($this->files->exists($filePath)) {
            $this->error("Service provider already exist!");
        } else {
            $this->files->put($filePath, $contractTemplate);
            $this->info("Service provider created successfully.");
        }
    }
}
