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

    // delete marker
    public function deleteMarker($id)
    {
        $marker = Marker::find($id);
        $marker->delete();
        return response()->json($marker);
    }

    // Edit data marker
    public function editMarker(Request $request, $id)
    {
        // Cari marker berdasarkan ID
        $marker = Marker::find($id);
        if (!$marker) {
            return response()->json(['message' => 'Marker not found'], 404);
        }
        // update data marker
        $marker->update($request->all());
        return response()->json([
            'message' => 'Marker updated successfully',
            'marker' => $marker,
        ]);
    }
    // Get marker by id
    public function getMarkerById($id)
    {
        $marker = Marker::find($id);
        if (!$marker) {
            return response()->json(['message' => 'Marker not found'], 404);
        }
        return response()->json($marker, 200);
    }

    // Delete polygon
    public function deletePolygon($id)
    {
        $polygon = Polygon::find($id);
        if ($polygon) {
            $polygon->delete();
            return response()->json(['message' => 'Polygon berhasil dihapus'], 200);
        }
        return response()->json(['message' => 'Polygon tidak ditemukan'], 404);
    }

    // Edit data polygon
    public function editPolygon(Request $request, $id)
    {
        // Cari polygon berdasarkan ID
        $polygon = Polygon::find($id);
        if (!$polygon) {
            return response()->json(['message' => 'Marker not found'], 404);
        }
        // Update data ploygon
        $polygon->update($request->all());
        return response()->json([
            'message' => 'Polygon updated successfully',
            'marker' => $polygon,
        ]);
    }
    // Get polygon by id
    public function getPolygonById($id)
    {
        $polygon = Polygon::find($id);
        if (!$polygon) {
            return response()->json(['message' => 'Polygon not found'], 404);
        }
        return response()->json($polygon, 200);
    }
}