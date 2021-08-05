@extends('admin.layout')

@section('title', 'Brand List')
@section('active2', 'active')
@section('content-name', 'Danh sách hãng')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <a href="{{ route('admin.brand.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Thêm mới</a>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tên hãng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $key => $brand)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $brand->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.brand.show', $brand->id) }}" class="btn-sm btn-info mr-1">Xem</a>
                            <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn-sm btn-secondary mr-1">Sửa</a>
                            {{-- <a href="{{ route('admin.brand.delete', $brand->id) }}" class="btn-sm btn-danger">Xóa</a> --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
@endsection