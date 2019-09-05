<?php
use App\Http\Controllers\FilesController as Files;
use Illuminate\Support\Facades\Date as Date;

if (! function_exists('localasset')) {
    function localasset($filepath) {
        return Files::pathGenerator($filepath);    
    }
}

if (! function_exists('render')) {
    function render($view = null, $data = [], $mergeData = []) {
        if (env('TEMPLATE') != '')
            $view = env('TEMPLATE') . '.' . $view;
        return view($view, $data, $mergeData)->with('date',Date::now());
    }
}

