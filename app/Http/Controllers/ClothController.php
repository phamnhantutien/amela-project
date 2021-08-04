<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ClothController extends Controller
{
    public function index()
    {
        $clothes = Cloth::all();
        return view('cloth.list', compact('clothes'));
    }

    public function create()
    {
        return view('cloth.create');
    }

    public function store(Request $request)
    {
        $cloth = new Cloth();
        $cloth->cloth_name = $request->input('name');
        $cloth->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $cloth->image_url = $path;
        }

        $cloth->description = $request->input('description');
        $cloth->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('cloth.index');
    }

    public function show($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('cloth.show', compact('cloth'));
    }

    public function edit($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('cloth.edit', compact('cloth'));
    }

    public function update(Request $request, $id)
    {
        $cloth = Cloth::findOrFail($id);
        $cloth->cloth_name = $request->input('name');
        $cloth->price = $request->input('price');

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
        return redirect()->route('cloth.index');
    }

    public function delete($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('cloth.delete', compact('cloth'));
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
        return redirect()->route('cloth.index');
    }
}
