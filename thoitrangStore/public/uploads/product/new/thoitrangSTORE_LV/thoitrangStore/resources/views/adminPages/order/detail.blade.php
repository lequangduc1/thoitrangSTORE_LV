@extends('adminPages.index')
@section('title','Chi tiết đơn hàng')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Chi tiết đơn #{{$order->id}}</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Thông tin nhận hàng</h4>
                            <ul>
                                <li>Tên khách hàng: {{$order->nguoinhan}}</li>
                                <li>Số điện thoại: {{$order->dienthoainhanhang}}</li>
                                <li>Email: {{$order->customer->email}}</li>
                                <li>Địa chỉ: {{$order->diachinhanhang}}</li>
                                <li>Thanh toán: {{$order->trangthai_tt == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-8">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0"><b>Mã sản phẩm</b></th>
                                        <th class="border-top-0"><b>Tên sản phẩm</b></th>
                                        <th class="border-top-0"><b>Số lượng</b></th>
                                        <th class="border-top-0"><b>Đơn giá</b></th>
                                        <th class="border-top-0"><b>Thành tiền</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetails as $detail)
                                        <tr>
                                            <td>#{{$detail->id}}</td>
                                            <td>{{$detail->product->ten_sp}}</td>
                                            <td>{{$detail->soluong_sp}}</td>
                                            <td>{{number_format($detail->dongia)}} VNĐ</td>
                                            <td>{{number_format($detail->soluong_sp * $detail->dongia)}} VNĐ</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="shopping-total">
                                <ul>
                                    <li>
                                        <em>Tổng tiền</em>
                                        <strong class="price">
                                            {{number_format($order->tongtien_dh)}} VNĐ
                                        </strong>
                                    </li>
                                    <li>
                                        <em>Tiền ship</em>
                                        <strong class="price">
                                            0 VNĐ
                                        </strong>
                                    </li>
                                    <li>
                                        <em>Giảm</em>
                                        <strong class="price">
                                            - {{number_format($order->tongtien_km)}} VNĐ
                                        </strong>
                                    </li>
                                    <li class="shopping-total-price">
                                        <em>Phải trả</em>
                                        <strong class="price">
                                            {{number_format($order->tongtien_km ? $order->tongtien_dh - $order->tongtien_km : $order->tongtien_dh)}}
                                            VNĐ
                                        </strong>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="order__detail__action">
                            @if($order->trangthai_dh != 4)
                                @if($order->trangthai_dh != 3)
                                    <a
                                        href="{{route('admin.order.update-status',[$order->id, 0])}}"
                                        class="btn btn-info">
                                        @if($order->trangthai_dh == 0)
                                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                                        @endif
                                        Đơn mới
                                    </a>
                                    <a
                                        href="{{route('admin.order.update-status',[$order->id, 1])}}"
                                        class="btn btn-warning">
                                        @if($order->trangthai_dh == 1)
                                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                                        @endif
                                        Đang xử lý
                                    </a>
                                    <a
                                        href="{{route('admin.order.update-status',[$order->id, 2])}}"
                                        class="btn btn-success">
                                        @if($order->trangthai_dh == 2)
                                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                                        @endif
                                        Đã xác nhận
                                    </a>
                                @endif
                                <a
                                    href="{{route('admin.order.update-status',[$order->id, 3])}}"
                                    class="btn btn-primary">
                                    @if($order->trangthai_dh == 3)
                                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    @endif
                                    Hoàn thành
                                </a>
                            @endif
                            @if($order->trangthai_dh != 3)
                                <a
                                    href="{{$order->trangthai_dh == 4 ? 'javascript:void(0)':route('admin.order.update-status',[$order->id, 4])}}"
                                    class="btn btn-danger">
                                    @if($order->trangthai_dh == 4)
                                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    @endif
                                    Hủy
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
