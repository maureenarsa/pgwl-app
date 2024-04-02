<?php

namespace App\Http\Controllers;

use App\Models\Polylines;
use Illuminate\Http\Request;

class PolylineController extends Controller
{
    public function __construct(){
        $this->polyline = new Polylines();
    }


    public function index()
    {
        $polylines = $this->polyline->polylines();  //untuk memanggil dari tabel point yang ditampilkan di function index seluruhnya

        foreach ($polylines as $p) {
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
    public function store(Request $request)
    {
         //validate Request
         $request->validate([
            "name" => "required",
            "geom" => "required"
        ],
        [
            "name.required" => "Name is required",
            "geom.required" => "Geometry is required"
        ]
    );

        $data = [
            "name" => $request->name,
            "description" => $request->description,
            "geom" => $request->geom
        ];

        //create polyline - ! berfungsi untuk mengembalikan sebagai error jika this->polyline->create gagal
        if (!$this->polyline->create($data)) {
            return redirect()->back()->with("error", "Failed to create polyline");
        };

        //redirect to map
        return redirect()->back()->with("success", "polyline created successfully");
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
