<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function pathGenerator($path)
    {
        $uuid = '';
        if(!auth()->check()) return $path;
        $file = Files::where('path',$path)
                        ->where('userid',auth()->user()->id)
                        ->first();
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        switch($ext) {
            case 'swf' : $mime = 'x-shockwave-flash';break;
            case 'js'  : $mime = 'text/plain';break;
            case 'css' : $mime = 'text/css';break;
            case 'jpg' : $mime = 'image/jpeg';break;
            case 'jpeg': $mime = 'image/jpeg';break;
            case 'png' : $mime = 'image/png';break;
            case 'gif' : $mime = 'image/gif';break;
            case 'bmp' : $mime = 'image/bmp';break;
            case 'pdf' : $mime = 'application/pdf';break;
            otherwise: $mime = 'application/octet-stream';
        }
        if(!$file){
            $uuid = \Str::uuid()->getHex();
            $file = Files::insert([
                'userid' => auth()->user()->id,
                'uuid' => $uuid,
                'path' => $path,
                'mime' => $mime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } else {
            $uuid = $file->uuid;
        }
        return '/file/' . $uuid;
    }

    public function getFile($uuid){
        $uuid = explode('.',$uuid)[0];
        $file = Files::where('uuid','=',$uuid)
                        ->where('userid',auth()->user()->id)
                        ->first();
        if($file){
            $dir = '/';
            $ext = pathinfo($file->path, PATHINFO_EXTENSION);
            switch($file->mime){
                case 'x-shockwave-flash': $dir = '/swf';break;
                case 'image/jpeg': $dir = '/images';break;
                case 'image/gif': $dir = '/images';break;
                case 'image/png': $dir = '/images';break;
                case 'image/bmp': $dir = '/images';break;
                case 'text/plain': 
                    if($ext=='js')$dir = '/js';
                    if($ext=='css')$dir = '/css';
                    break;
            }
            $path = base_path().'/app/Assets/'.$file->path;
            $type = $file->mime;
            $file->delete();
        } else {
            $path = base_path().'/app/Assets/images/default.jpg';
            $type = "image/jpeg";
        }
        header('Content-Type:'.$type);
        header('Content-Length: ' . filesize($path));
        readfile($path);
    }
}
