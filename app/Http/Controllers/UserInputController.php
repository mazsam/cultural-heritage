<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Building;
use App\Category;
use App\District;
use Illuminate\Support\Facades\URL;

class UserInputController extends Controller
{
    public function index()
    {
        $buildings =  Building::with('category', 'district')->get();

        return view('index', ['buildings' => $buildings]);
    }

    public function add()
    {
        $category = Category::get();
        $district = District::get();
        return view('add', ['category' => $category, 'district' => $district]);
    }

    public function store(Request $request)
    {
        $building = new Building();

        $file = $request->file('file');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
        // Proses Upload File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$nama_file);

        $building->image = URL::to('/')."/".$destinationPath."/".$nama_file;

        $building->name = $request->nama;
        $building->address = $request->address;
        $building->year = $request->year;
        $building->lat = $request->lat;
        $building->lng = $request->lng;
        $building->category_id = $request->category  ? $request->category : 1;
        $building->district_id = $request->district ? $request->district : 1;

        $building->save();

        return redirect('/user-input');
    }


    public function del($id)
    {
        Building::where(['id' => $id])->delete();
        return redirect('/user-input');
    }

    public function edit($id)
    {
        $category = Category::get();
        $district = District::get();
        $building = Building::where(['id' => $id])->first();
        return view('edit', ['building' => $building, 'category' => $category, 'district' => $district]);
    }

    public function update(Request $request)
    {
        $building = Building::where(['id' => $request->id])->first();

        $building->name = $request->nama;
        $building->address = $request->address;
        $building->year = $request->year;
        $building->lat = $request->lat;
        $building->lng = $request->lng;
        $building->category_id = $request->category  ? $request->category : 1;
        $building->district_id = $request->district ? $request->district : 1;

        $building->save();

        return redirect('/user-input');
    }
}
