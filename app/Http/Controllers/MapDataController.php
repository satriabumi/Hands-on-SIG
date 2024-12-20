<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use App\Models\Polygon;
use Illuminate\Http\Request;

class MapDataController extends Controller
{
    public function getMarkers()
    {
        return response()->json(Marker::all());
    }

    public function getPolygons()
    {
        return response()->json(Polygon::all());
    }

    public function storeMarker(Request $request)
    {
        $marker = Marker::create($request->all());
        return response()->json($marker);
    }

    public function storePolygon(Request $request)
    {
        $polygon = Polygon::create([
            'coordinates' => json_encode($request->coordinates),
        ]);
        return response()->json($polygon);
    }

    public function index()
    {
        return view('interactive');
    }

    public function deleteMarker($id)
    {
        $marker = Marker::find($id);
        $marker->delete();
        return response()->json($marker);
    }

    public function deletePolygon($id)
    {
        $polygon = Polygon::find($id);
        if ($polygon) {
            $polygon->delete();
            return response()->json(['message' => 'Polygon berhasil dihapus'], 200);
        }
        return response()->json(['message' => 'Polygon tidak ditemukan'], 404);
    }
}