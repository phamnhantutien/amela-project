@extends('admin.layout')

@section('title', 'Cloth List')
@section('content-name', 'Danh sách quần áo')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </p>
        @endif
    </div>
    <div class="d-flex">
        <form class="navbar-form navbar-left" action="{{ route('admin.cloth.search') }}">
            @csrf
            <div class="d-flex">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="keyword"
                        @if(isset($keyword))
                            value="{{$keyword}}"
                        @endif
                    >
                </div>
                <button type="submit" class="btn btn-primary mb-3 ml-1">Tìm kiếm</button>
            </div>
        </form>
        <div class="d-flex ml-auto">
            <a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#brandModal">
                Lọc
            </a>
            <a href="{{ route('admin.cloth.create') }}" class="btn btn-success mb-3 ml-1">
                Thêm mới
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tên quần áo</th>
                    <th>Giá thành</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clothes as $key => $cloth)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $cloth->cloth_name }}</td>
                        <td>{{ $cloth->price }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.cloth.show', $cloth->id) }}" class="btn-sm btn-info mr-1">Xem</a>
                            <a href="{{ route('admin.cloth.edit', $cloth->id) }}" class="btn-sm btn-secondary mr-1">Sửa</a>
                            <a href="{{ route('admin.cloth.delete', $cloth->id) }}" class="btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $clothes->links() }}
            </ul>
        </div>
        <div class="modal fade" id="brandModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <form action="{{ route('admin.cloth.filterByBrand') }}" method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!--Lọc theo khóa học -->
                            <div class="select-by-program">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label border-right">Lọc quần áo theo hãng:</label>
                                    <div class="col-sm-7">
                                        <select class="custom-select w-100" name="brand_id">
                                            <option value="" hidden disabled selected>Chọn hãng</option>
                                            @foreach($brands as $brand)
                                                @if(isset($brandFilter))
                                                    @if($brand->id == $brandFilter->id)
                                                        <option value="{{$brand->id}}"
                                                                selected>{{ $brand->name }}</option>
                                                    @else
                                                        <option value="{{$brand->id}}">{{ $brand->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$brand->id}}">{{ $brand->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                            <!--End-->

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection