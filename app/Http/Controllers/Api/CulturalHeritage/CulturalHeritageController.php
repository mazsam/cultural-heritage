<?php

namespace App\Http\Controllers\Api\CulturalHeritage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Building;

use Illuminate\Support\Facades\URL;

class CulturalHeritageController extends Controller
{
    function getAllHeritage(Request $request)
    {
        $category = $request->input('category');
        $search = $request->input('search');
        $search = '%' . $search . '%';

        $district = Building::where('name', 'like', $search)->with(['category', 'district', 'images', 'videos'])->get();

        if ($category) {
            $category = strlen($category) > 1 ? explode(",", $category) : [$category];
            $district = Building::where('name', 'like', $search)->whereIn('category_id', $category)->with(['category', 'district', 'images'])->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $district ?: []
        ], 200);
    }

    function getHeritageId(Request $request, $id)
    {
        // dd("HERE", $id);
        $district = Building::where(['id' => $id])->with(['category', 'district', 'images', 'videos'])->first();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $district ?: []
        ], 200);
    }

    public function inputData(Request $request)
    {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        $building = new Building();

        $file = $request->file('file');
        // dd($file);
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
        // Proses Upload File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $nama_file);

        $building->image = URL::to('/') . "/" . $destinationPath . "/" . $nama_file;

        $building->name = $request->input('name');
        $building->address = $request->input('address');
        $building->year = $request->input('year');
        $building->lat = $request->input('lat');
        $building->lng = $request->input('lng');
        $building->category_id = $request->input('category')  ? $request->input('category')  : 1;
        $building->district_id = $request->input('district') ? $request->input('district') : 1;

        $building->save();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $building,
        ], 200);
    }
}
