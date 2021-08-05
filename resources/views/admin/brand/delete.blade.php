@extends('admin.layout')

@section('title', 'Delete brand')
@section('active2', 'active')
@section('content-name', 'Xóa hãng')
@section('content')
    <p>Bạn có muốn xóa hãng {{ $brand->name }}?</p>
    <form method="post" action="{{ route('admin.brand.destroy', $brand->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('admin.brand.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection