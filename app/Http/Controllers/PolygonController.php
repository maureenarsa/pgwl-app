<?php

namespace App\Http\Controllers;

use App\Models\Polygons;
use Illuminate\Http\Request;

class PolygonController extends Controller
{
    public function __construct(){
        $this->polygon = new Polygons();
    }
    public function index()
    {
        $polygons = $this->polygon->polygons();  //untuk memanggil dari tabel point yang ditampilkan di function index seluruhnya

        foreach ($polygons as $p) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'name' => $p->name,
                    'description' => $p->description,
                    'image' => $p->image,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
                ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]);


        //dd($points);

        //return response()->json($points);
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

        //validate request
        $request->validate([
            "name" => "required",
            "geom" => "required",
            "image" => "mimes:jpg,jpeg,png,tif,gif,|max:10000"
        ],
        [
            "name.required" => "Name is required",
            "geom.required" => "Geometry is required",
            "image.mimes" => "Image must be a file of type:jpg,jpeg,png,tif,gif",
            "image.max" => "Image must not exceed 10MB"
        ]);


        //create folder image
        If (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_point.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
        } else {
            $filename = null;
        }

        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'geom' => $request->geom,
            'image' => $filename
        ];


        //create polygon - ! berfungsi untuk mengembalikan sebagai error jika this->polygon->create gagal
        if (!$this->polygon->create($data)) {
            return redirect()->back()->with("error", "Failed to create polygon");
        };

        //redirect to map
        return redirect()->back()->with("success", "polygon created successfully");
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
