@extends('admin.layout')

@section('title', 'Delete cloth')
@section('active1', 'active')
@section('content-name', 'Xóa quần áo')
@section('content')
    <p>Bạn có muốn xóa quần áo {{ $cloth->cloth_name }}?</p>
    <form method="post" action="{{ route('admin.cloth.destroy', $cloth->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('admin.cloth.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection