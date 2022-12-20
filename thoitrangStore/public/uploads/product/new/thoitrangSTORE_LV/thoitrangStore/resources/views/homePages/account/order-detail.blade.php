@extends('homePages.index')
@section('title', 'Tài khoản')
@section('content')
    <div class="container">
        <div class="row margin-bottom-40">
            <x-sliderbar-account/>
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <h1>
                    Chi tiết đơn #{{$order->id}}
                    <span
                        @class(config('constant.order.style_status')[$order->trangthai_dh])
                    >
                        {{ config('constant.order.text_status')[$order->trangthai_dh] }}
                    </span>
                </h1>
                <div class="content-page">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Số lương</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderDetail as $detail)
                            <tr>
                                <th scope="row">#{{$order->id}}</th>
                                <td>
                                    <h3><a href="javascript:;">{{$detail->product->ten_sp}}</a></h3>
                                    <p>
                                        <strong>Thông tin: </strong>
                                        Size: {{$detail->productDetail->sizes->tensize}}
                                    </p>
                                </td>
                                <td>{{$detail->soluong_sp}}</td>
                                <td>{{number_format($detail->dongia)}}VNĐ</td>
                                <td>{{number_format($detail->soluong_sp * $detail->dongia)}}VNĐ</td>
                                <td>{{number_format($detail->soluong_sp * $detail->dongia)}}VNĐ</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button @class(['btn btn-success'=>$order->trangthai_tt == 1,
                                   'btn btn-danger' => $order->trangthai_tt == 0
                                   ])
                    >
                        {{$order->trangthai_tt == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}
                    </button>
                    @if($order->trangthai_dh == 0)
                        <a
                            href="{{route('home.account.order-destroy', $order->id)}}"
                            style="color: white"
                            class="btn btn-warning">Hủy</a>
                    @endif
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
@endsection
