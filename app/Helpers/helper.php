<?php

function getPathAsset($file){

    $path_to_file = \Statamic\Facades\Asset::all()->map(function ($asset) use ($file) {

        if ($asset->path() === $file) {
            return $asset->url();
        }

    })->filter(function ($value) {

        return !is_null($value);
    })->first();

    return $path_to_file;

}
