@extends('adminPages.index')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Quản lí khách hàng</h4>
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
                                <th class="border-top-0"><b>Họ Tên</b></th>
                                <th class="border-top-0"><b>Email</b></th>
                                <th class="border-top-0"><b>Địa chỉ</b></th>
                                <th class="border-top-0"><b>Sdt</b></th>
                                <th class="border-top-0"><b>Kích hoạt</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0"><b>created_at</b></th>
                                <th class="border-top-0"><b>updated_at</b></th>
                                <th class="border-top-0"><b>Thao tác</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!is_array($khachhang))

                                @foreach($khachhang as $key => $value)
                                    <tr>
                                        <td><b>{{$key+1}}</b></td>
                                        <td>{{$value->hovaten}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->diachi}}</td>
                                        <td>{{$value->sodienthoai}}</td>
                                        <td>
                                            <div class="btn {{$value->email_verify == 1 ? 'btn-success' : 'btn-danger'}}"
                                                 style="
                                                        color: #000;
                                                        border-radius: 5px;
                                                        width: 150px"

                                            >
                                                <b>{{$value->email_verify == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt'}}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn {{$value->trangthai == 1 ? 'btn-success' : 'btn-danger'}}"
                                                 style="
                                                        color: #000;
                                                        border-radius: 5px;
                                                        width: 100px"

                                            >
                                                <b>{{$value->trangthai == 1 ? 'Hiện' : 'Ẩn'}}</b>
                                            </div>
                                        </td>
                                        <td>{{$value->created_at ? date_format($value->created_at,"d/m/Y") : 'null'}}</td>
                                        <td>{{$value->updated_at ? date_format($value->updated_at,"d/m/Y") : ''}}</td>
                                        <td>
{{--                                            <a href="#"><span class="icon-action"><i class="fa fa-edit" aria-hidden="true"></i></span></a>--}}
                                            <a href="{{route('admin.customers.update', $value->id)}}"><span class="icon-action"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
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
