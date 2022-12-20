@extends('adminPages.index')
@section('title','Danh sách Sản phẩm Chủ Thể')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Danh mục sản phẩm</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal"></a></li>
                    </ol>
                    <a href="{{route('admin.product_master.create')}}"
                       class="btn btn-primary  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                        Thêm sản phẩm
                    </a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title"></h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0"><b>Mã Code</b></th>
                                <th class="border-top-0"><b>Tên sản phẩm</b></th>
                                <th class="border-top-0"><b>Loại sản phẩm</b></th>
                                <th class="border-top-0"><b>Mô tả</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0"><b>Thao tác</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_array($products))
                                @foreach($products as $key => $value)
                                    <tr>
                                        <td><b>{{$key+1}}</b></td>
                                        <td>{{$value->macodesanpham}}</td>
                                        <td>{{$value->ten_sp}}</td>
                                        <td>{{getNameProductTypeByID($productType,$value->idloaisanpham)}}</td>
                                        <td>{{$value->mota}}</td>
                                        <td>
                                            <button
                                                class="btn {{$value->trangthai == 1 ? 'btn-success' : 'btn-danger'}}"
                                                style="
                                                        color: #000;
                                                        border-radius: 5px;
                                                        width: 100px"

                                            >
                                                {{$value->trangthai == 1 ? 'Hiện' : 'Ẩn'}}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.product_master.update', $value->id)}}"><span
                                                    class="icon-action"><i class="fa fa-edit"
                                                                           aria-hidden="true"></i></span></a>
                                            <a href="{{route('admin.product_master.destroy', $value->id)}}"><span
                                                    class="icon-action"><i class="fa fa-trash"
                                                                           aria-hidden="true"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
