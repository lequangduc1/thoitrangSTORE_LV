@extends('adminPages.index')
@section('title','Danh sách đơn hàng')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Danh sách đơn hàng</h4>
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
                                <th class="border-top-0"><b>Mã đơn</b></th>
                                <th class="border-top-0"><b>Tên khách hàng</b></th>
                                <th class="border-top-0"><b>Số điện thoại</b></th>
                                <th class="border-top-0"><b>Địa chỉ</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0 text-center"><b>Thao tác</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allOrder as $item)
                                <tr>
                                    <td>#{{$item->id}}</td>
                                    <td>{{$item->customer->hovaten}}</td>
                                    <td>{{$item->customer->sodienthoai}}</td>
                                    <td>{{$item->customer->diachi}}</td>
                                    <td>
                                        <span
                                            @class(config('constant.order.style_status')[$item->trangthai_dh])
                                        >
                                            {{ config('constant.order.text_status')[$item->trangthai_dh] }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.order.detail', $item->id)}}">
                                            <span class="icon-action">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
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
