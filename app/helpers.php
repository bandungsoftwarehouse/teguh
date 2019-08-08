<?php
use App\Http\Controllers\FilesController as Files;

if (! function_exists('localasset')) {
    function localasset($filepath) {
        return Files::pathGenerator($filepath);    
    }
}

if (! function_exists('render')) {
    function render($view = null, $data = [], $mergeData = []) {
        $view = env('TEMPLATE') . '.' . $view;
        return view($view, $data, $mergeData);
    }
}

