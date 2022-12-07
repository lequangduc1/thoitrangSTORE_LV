@extends('homePages.index')
@section('title', 'Tài khoản')
@section('content')
    <div class="container">
        <div class="row margin-bottom-40">
            <x-sliderbar-account />
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <h1>Danh sách đơn hàng</h1>
                <div class="content-page">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col" class="text-center">Trạng thái</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orderList as $order)
                                <tr>
                                    <th scope="row">#{{$order->id}}</th>
                                    <td>
                                        {{$order->created_at}}
                                    </td>
                                    <td>
                                        {{number_format( $order->tongtien_km ? $order->tongtien_dh-$order->tongtien_km : $order->tongtien_dh )}} VNĐ
                                    </td>
                                    <td class="text-center">
                                        <span
                                            @class(config('constant.order.style_status')[$order->trangthai_dh])
                                        >
                                            {{ config('constant.order.text_status')[$order->trangthai_dh] }}
                                        </span>
                                    </td>
                                    <td>
                                        <a
                                            href="{{route('home.account.order-detail', $order->id)}}"
                                            style="color: white"
                                            class="btn btn-primary"
                                            >Xem chi tiết
                                        </a>
                                        @if($order->trangthai_dh == 0)
                                            <button type="button" class="btn btn-warning">Hủy</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
@endsection
