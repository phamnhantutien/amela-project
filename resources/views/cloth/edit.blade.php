@extends('layout')

@section('title', 'Edit cloth information')
@section('content-name', 'Sửa thông tin quần áo')
@section('content')
    <h3>{{ $cloth->cloth_name }}</h3>
    <form method="post" action="{{ route('cloth.update', $cloth->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên xe:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quần áo" value="{{ $cloth->cloth_name }}">
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá quần áo" value="{{ $cloth->price }}">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Ảnh:</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                    <label class="custom-file-label" for="exampleInputFile">{{ $cloth->image_url }}</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description">{{ $cloth->description }}</textarea>
        </div>
        <div class="d-flex">
            <input type="submit" class="btn btn-success" value="Sửa">
            <a href="{{ route('cloth.index') }}" class="btn btn-default ml-2">Huỷ</a>
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
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>