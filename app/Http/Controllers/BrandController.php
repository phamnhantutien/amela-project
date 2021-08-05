<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('name');

        $brand->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('admin.brand.index');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('name');

        $brand->save();

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('admin.brand.index');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.delete', compact('brand'));
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('admin.brand.index');
    }
}
