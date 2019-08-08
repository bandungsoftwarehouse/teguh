<?php
use App\Http\Controllers\FilesController as Files;

if (! function_exists('localasset')) {
    function localasset($filepath) {
        return Files::pathGenerator($filepath);    
    }
}

