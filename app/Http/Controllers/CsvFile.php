<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvFile extends Controller
{
    public function index()
    {
      return view('csv_file');
    }
}
