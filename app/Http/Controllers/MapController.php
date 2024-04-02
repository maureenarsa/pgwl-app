<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() //indexnya sebagai nama function index
    {
        $data = [  //dollar ciri khas variabel bahasa php
            "title" => "Peta Explore Cagar Alam Kalimantan",
        ];
        return view('index', $data); //untuk mengambil values dari index.blade.php
    }
    public function table()
    {
        $data = [
            "title" => "Table",
        ];
        return view('table', $data); //untuk memanggil view table
    }
    public function info()
    {
        $data = [
            "title" => "Info",
        ];
        return view('info', $data); //untuk memanggil view info
    }
}
