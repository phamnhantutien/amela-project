<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClothRequest;
use App\Http\Middleware\CheckLogin;

class ClothController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(CheckLogin::class);
    // }

    public function home()
    {
        $clothes = Cloth::paginate(8);
        $brands = Brand::all();
        return view('admin.home');
    }

    public function index()
    {
        $clothes = Cloth::paginate(5);
        $brands = Brand::all();
        return view('admin.cloth.list', compact('clothes', 'brands'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.cloth.create', compact('brands'));
    }

    public function store(ClothRequest $request)
    {
        $cloth = new Cloth();
        $cloth->cloth_name = $request->input('name');
        $cloth->price = $request->input('price');
        $cloth->brand_id = $request->input('brand_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $cloth->image_url = $path;
        } else{
            $cloth->image_url = "";
        }

        $cloth->description = $request->input('description');
        $cloth->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('admin.cloth.index');
    }

    public function show($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('admin.cloth.show', compact('cloth'));
    }

    public function edit($id)
    {
        $cloth = Cloth::findOrFail($id);
        $brands = Brand::all();
        return view('admin.cloth.edit', compact('cloth', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $cloth = Cloth::findOrFail($id);
        $cloth->cloth_name = $request->input('name');
        $cloth->price = $request->input('price');
        $cloth->brand_id = $request->input('brand_id');

        if ($request->hasFile('image')) {
            $currentImg = $cloth->image_url;
            if($currentImg)
            {
                Storage::delete('/public/'.$currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $cloth->image_url = $path;
        }

        $cloth->description = $request->input('description');
        $cloth->save();

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('admin.cloth.index');
    }

    public function delete($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('admin.cloth.delete', compact('cloth'));
    }

    public function destroy($id)
    {
        $cloth = Cloth::findOrFail($id);
        $image = $cloth->image_url;

        if($image)
        {
            Storage::delete('/public/'.$image);
        }

        $cloth->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('admin.cloth.index');
    }
    
    public function filterByBrand(Request $request){
        $idBrand = $request->input('brand_id');

        $brandFilter = Brand::findOrFail($idBrand);

        $clothes = Cloth::where('brand_id', $brandFilter->id)->paginate(5);
        $totalClothFilter = count($clothes);
        $brands = Brand::all();

        return view('admin.cloth.list', compact('clothes', 'brands', 'totalClothFilter', 'brandFilter'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.cloth.index');
        }
        $clothes = Cloth::where('cloth_name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $brands = Brand::all();
        return view('admin.cloth.list', compact('clothes', 'brands', 'keyword'));
    }
}
