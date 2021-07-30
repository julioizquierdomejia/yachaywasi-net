<?php

if (! function_exists('intervention_image')) {
    function intervention_image($path, $fileName, $width, $height, $compress = false, $override = false)
    {
    	$response = '';
    	$time = time();
    	$pathImage = $path.'/'.$fileName;
		if(is_file($pathImage)) {
			if($compress) {
				$img = Image::make($pathImage)->orientate();
			} else {
				$img = Image::make($pathImage)
	    			->orientate()
				    ->fit($width, $height, function ($constraint) {
				        $constraint->upsize();
				    })
    				->resize($width, $height);
			}
			$path = dirname($pathImage);
			if (!file_exists($path)) {
			    mkdir($path, 666, true);
			}

			if ($override) {
				\File::delete($pathImage);
				$img->save($pathImage, 60);
				$image_name = $img->filename;
			} else {
				$extension = strtolower($img->extension);
				$image_name = 'img_'.$time.'.'.$extension;
				$fileName = $path.'/'.$image_name;
				$img->save($fileName);
				\File::delete($pathImage);
			}
			$response = $image_name;
		}
    	return $response;
    }
}

function interventionGCSImage($path, $width, $height)
{
	if ($width && $height) {
		$iImage = \Image::make($path->getPathName())
                    ->orientate()
                    ->resize($width, $height);
	} else {
		$iImage = \Image::make($path->getPathName())
                    ->orientate();
	}
	//\File::delete($path);
    return $iImage;
}

function assetGCS($path)
{
	$saveOnGCS = env('SAVE_FILES_ON_GCS', false);
	try {
		if ($saveOnGCS) {
			return \Storage::disk('gcs')->url($path);
		}
	} catch (Exception $e) {
		var_dump($e);
	}
	return asset($path);
}

function recursiveThroughImages($path)
{
	$extensions = ['jpg', 'jpeg', 'png', 'gif'];

	foreach (new DirectoryIterator($path) as $fileInfo) {
		if($fileInfo->isDot()) {
			continue;
		} else {
			$file_path = $fileInfo->getPathName();
			if (is_dir($file_path)) {
				recursiveThroughImages($file_path);
			} else {
				if (in_array($fileInfo->getExtension(), $extensions)) {
					echo 'optimizing file: '.$fileInfo->getFilename() . "\n";
					intervention_image(dirname($file_path), $fileInfo->getFilename(), null, null, true, true);
				}
			}
		}
	}
}