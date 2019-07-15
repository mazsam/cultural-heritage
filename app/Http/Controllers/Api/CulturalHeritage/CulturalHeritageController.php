<?php

namespace App\Http\Controllers\Api\CulturalHeritage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Building;

class CulturalHeritageController extends Controller
{
    function getAllHeritage(Request $request) {
        $category = $request->input('category');
        $search = $request->input('search');
        $search = '%'. $search . '%';

        $district = Building::where('name', 'like', $search)->with(['category', 'district', 'images', 'videos'])->get();

        if ($category) {
            $district = Building::where('name', 'like', $search)->where('category_id', $category)->with(['category', 'district', 'images'])->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $district ?: []
        ], 200);

    }

    function getHeritageId(Request $request, $id) {
        // dd("HERE", $id);
        $district = Building::where(['id' => $id])->with(['category', 'district', 'images', 'videos'])->first();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $district ?: []
        ], 200);

    }
}
