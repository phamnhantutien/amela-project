@extends('layout')

@section('title', 'Delete cloth')
@section('content-name', 'Xóa quần áo')
@section('content')
    <p>Bạn có muốn xóa quần áo {{ $cloth->cloth_name }}?</p>
    <form method="post" action="{{ route('cloth.destroy', $cloth->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('cloth.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection