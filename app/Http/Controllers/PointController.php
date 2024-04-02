<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;

class PointController extends Controller
{
    public function __construct()
    {
        $this->point = new Points(); //this point sebagai variabel untuk menampung model points
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = $this->point->points();  //untuk memanggil dari tabel point yang ditampilkan di function index seluruhnya

        foreach ($points as $p) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom), //menerjemahkan string JSON menjadi variabel PHP
                'properties' => [
                    'name' => $p->name,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
            ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]); // untuk mengembalikan json
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //untuk memasukkan data ke dalam database atau untuk menyimpan
    {
        $data = [
            'name' => $request->name,                //menangkap dari inputan name
            'description' => $request->description, //menangkap dari inputan name ke description
            'geom' => $request->geom                //menangkap dari inputan name ke geom
        ];

        // create point
        $this->point->create($data);

        //redirect to map
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
