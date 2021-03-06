@extends('admin.layout')

@section('title', 'Cloth Information')
@section('active1', 'active')
@section('content-name', 'Thông tin quần áo')
@section('content')
    <h3>{{ $cloth->cloth_name }}</h3>
    <p>Giá: {{ $cloth->price }}</p>
    <p>Hãng: {{ $cloth->brand->name }}</p>
    <p>{{ $cloth->description }}</p>
    @if($cloth->image_url)
        <img src="{{ asset('storage/'.$cloth->image_url) }}" alt="" style="max-height: 200px">
    @else
        {{'Chưa có ảnh'}}
    @endif
@endsection