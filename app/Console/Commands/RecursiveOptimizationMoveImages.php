<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RecursiveOptimizationMoveImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimization:move-images {path} {override}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Images Optimization by Intervention and Move Images to new Path';

    protected $saveOnGCS;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->saveOnGCS = env('SAVE_FILES_ON_GCS');

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
        $override = $this->argument('override');
        $override = $override == 'true' ? true : false;
        return $this->recursiveThroughImages($path, $override);
    }

    function recursiveThroughImages($path, $override)
    {
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'jfif', 'tiff'];

        foreach (new \DirectoryIterator($path) as $fileInfo) {
            if($fileInfo->isDot()) {
                continue;
            } else {
                $file_path = $fileInfo->getPathName();
                if (is_dir($file_path)) {
                    $this->recursiveThroughImages($file_path, $override);
                } else {
                    if (in_array($fileInfo->getExtension(), $extensions)) {
                        $this->intervention_image(dirname($file_path), $fileInfo, $override);
                    }
                }
            }
        }
    }

    protected function intervention_image($path, $file, $override)
    {
        $dirsep = DIRECTORY_SEPARATOR;
        $response = null;
        $time = time();
        $fileName = $file->getFilename();
        $pathImage = $path.'/'.$fileName;
        if(is_file($pathImage)) {
            $extension = strtolower($file->getExtension());
            echo 'optimizing file: '.$fileName . "\n";
            $newpath = str_replace($this->argument('path') .$dirsep, "", $path);
            $img = \Image::make($pathImage)->orientate();

            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }

            if ($override) {
                \File::delete($pathImage);
                $response = $img->save($pathImage, 60);
            } else {
                $image_name = 'img_'.$time.'.'.$extension;
                $fileName = $path.'/'.$image_name;
                $response = $img->save($fileName);
                \File::delete($pathImage);
            }

            //No permite grabar desde comandos hacia google cloud storage
            /*if ($this->saveOnGCS) {
                //Copy files to Google Cloud Storage
                $newpath = str_replace($this->argument('path'), "", $path);
                \Storage::disk('gcs')->put($newpath.'/'.$fileName, (string)$response->encode());
            }*/
        }
        return $response;
    }
}
