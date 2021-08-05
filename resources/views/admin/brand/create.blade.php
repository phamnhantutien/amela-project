@extends('admin.layout')

@section('title', 'Add new brand')
@section('active2', 'active')
@section('content-name', 'Thêm hãng')
@section('content')
    <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên hãng:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên hãng">
        </div>
        <div class="d-flex">
            <input type="submit" class="btn btn-success" value="Thêm mới">
            <a href="{{ route('admin.brand.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>