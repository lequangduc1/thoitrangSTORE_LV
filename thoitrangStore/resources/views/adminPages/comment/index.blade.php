@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Quản lí đánh giá</h4>
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
                                <th class="border-top-0"><b>Người đánh giá</b></th>
                                <th class="border-top-0"><b>Sản phẩm</b></th>
                                <th class="border-top-0"><b>Nội dung đánh giá</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0"><b>Ngày đánh giá</b></th>
                                <th class="border-top-0"><b>Thao tác</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key => $value)
                                <tr>
                                    <td><b>{{$key+1}}</b></td>
                                    <td>{{$value->khachhang[0]->hovaten}}</td>
                                    <td>{{$value->chitietsanpham->sanphams->ten_sp}}</td>
                                    <td>{{$value->noidung}}</td>
                                    <td>
                                        <div class="btn {{$value->trangthai == 1 ? 'btn-success' : 'btn-danger'}}"
                                             style="
                                                    color: #000;
                                                    border-radius: 5px;
                                                    width: 100px"

                                        >
                                            {{$value->trangthai == 1 ? 'Hiện' : 'Ẩn'}}
                                        </div>
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        @if($value->trangthai)
                                            <a href="{{route('admin.comment.update_status', $value->id)}}">
                                                <span class="icon-action">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        @else
                                            <a href="{{route('admin.comment.update_status', $value->id)}}">
                                            <span class="icon-action">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </span>
                                            </a>
                                        @endif
                                        <a href="{{route('admin.comment.delete', $value->id)}}">
                                            <span class="icon-action">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
