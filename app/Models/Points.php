<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Points extends Model
{
    protected $table = 'table_points';

    //kolom mana saja yang boleh diisi, diupdate, dan diedit
    protected $fillable = [
        'name',
        'description',
        'geom',
    ];

    public function points()
    {
        return $this->select(DB::raw('id, name, description, ST_AsGeoJSON(geom) as geom
        , created_at, updated_at'))->get();
    }
}
