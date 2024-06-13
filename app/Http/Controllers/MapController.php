<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() //indexnya sebagai nama function index
    {
        $data = [  //dollar ciri khas variabel bahasa php
            "title" => "Sea Turtle | Global Environmental Conservation",
        ];

        //Check if user is logged in
        if (auth()->check()) {
            return view('index', $data);
        } else{
            return view('index-public', $data);
        }
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
    public function beranda()
    {
        $data = [
            "title" => "Beranda",
        ];
        return view('beranda', $data);
    }
}
