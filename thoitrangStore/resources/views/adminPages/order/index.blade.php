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
                    <div class="col-md-12" >
                        <form action="{{route('admin.order.search')}}" method="POST" >
                            @csrf
                            <div class="col-md-2 border-bottom" style="float: left">
                                <label
                                    @class(config('constant.order.style_status')[$trangthai])
                                    style="
                                        color: #000;
                                        border-radius: 5px"
                                >
                                   <b> Trạng thái</b>
                                </label>
                                <select name="trangthai" class="form-select shadow-none p-0  ">
                                    <option value="2" {{$trangthai == 2 ? 'selected' : ''}}>Đơn thành công</option>
                                    <option value="1" {{$trangthai == 1 ? 'selected' : ''}}>Đơn đang xử lí</option>
                                    <option value="0" {{$trangthai == 0 ? 'selected' : ''}}>Đơn mới</option>
                                    <option value="0" {{$trangthai == 3 ? 'selected' : ''}}>Đơn hoàn thành</option>
                                </select>
                            </div>
                            <div class="col-md-1" style="float: left; margin-left: 10px; margin-top: 39px">
                                <button class="btn btn-info" >Tìm kiếm</button>
                            </div>

                        </form>
                    </div>

                    <h3 class="box-title"></h3>
                    <div class="table-responsive col-md-12">
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
