<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Models\Polygons;
use App\Models\Polylines;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->points = new Points();
        $this->polygons = new Polylines();
        $this->polylines = new Polygons();
    }

    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "total_points" => $this->points->count(),
            "total_polylines" => $this->polylines->count(),
            "total_polygons" => $this->polygons->count(),
        ];

        return view('dashboard', $data);
    }
}
