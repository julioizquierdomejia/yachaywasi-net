<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RecursiveOptimizationImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimization:images {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Images Optimization by Intervention';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->argument('path');
        return $this->recursiveThroughImages($path);
    }

    function recursiveThroughImages($path)
    {
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];

        foreach (new \DirectoryIterator($path) as $fileInfo) {
            if($fileInfo->isDot()) {
                continue;
            } else {
                $file_path = $fileInfo->getPathName();
                if (is_dir($file_path)) {
                    $this->recursiveThroughImages($file_path);
                } else {
                    if (in_array($fileInfo->getExtension(), $extensions)) {
                        echo 'optimizing file: '.$fileInfo->getFilename() . "\n";
                        $this->intervention_image(dirname($file_path), $fileInfo->getFilename());
                    }
                }
            }
        }
    }

    protected function intervention_image($path, $fileName)
    {
        $response = '';
        $time = time();
        $pathImage = $path.'/'.$fileName;
        if(is_file($pathImage)) {
            $img = \Image::make($pathImage)->orientate();

            $path = dirname($pathImage);
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }

            \File::delete($pathImage);
            $img->save($pathImage, 60);
            $response = $img->filename;
        }
        return $response;
    }
}
