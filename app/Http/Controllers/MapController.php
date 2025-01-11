<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MapController extends Controller
{
    public function index()
    {
        return view('map');
    }

    public function tugashandson1()
    {
        return view('tugashandson1');
    }

    public function tugashandson234()
    {
        $markers = DB::table('markers')->get();
        $polygons = DB::table('polygons')->get();
        return view('tugashandson234', [
            'markers' => $markers,
            'polygons' => $polygons
        ]);

    }


}