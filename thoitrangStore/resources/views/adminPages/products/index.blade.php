@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Danh sách sản phẩm</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal"></a></li>
                    </ol>
                    <a href="{{route('admin.products.create')}}" class="btn btn-primary  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
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
                                <th class="border-top-0"><b>Giá</b></th>
                                <th class="border-top-0"><b>Số lượng</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0"><b>Ngày tạo</b></th>
                                <th class="border-top-0"><b>Ngày sửa</b></th>
                                <th class="border-top-0"><b>Thao tác</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_array($products))
                                @foreach($products as $key => $value)
                                    <tr>
                                        <td><b>{{$key+1}}</b></td>
                                        <td>{{$value->tensize}}</td>
                                        <td>
                                            <span
                                                @class(['status-hide'=>$value->trangthai==0,'status-show'=>$value->trangthai==1])
                                                style="background-color:{{$value->trangthai == 1 ? 'chartreuse' : 'red'}}; color: #fff ; border-radius: 5px"
                                            >
                                                {{$value->trangthai == 1 ? 'UnLock' : 'Lock'}}
                                            </span>
                                        </td>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->updated_at}}</td>
                                        <td>
                                            <a href="{{route('admin.products.update', $value->id)}}"><span class="icon-action"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
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
