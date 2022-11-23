@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Danh sách khuyến mãi</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal"></a></li>
                    </ol>
                    <a href="{{route('admin.promotion.create')}}" class="btn btn-primary  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                        Thêm khuyến mãi
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
                                <th class="border-top-0"><b>Tên khuyến mãi</b></th>
                                <th class="border-top-0"><b>Mã khuyến mãi</b></th>
                                <th class="border-top-0"><b>Phần trăm</b></th>
                                <th class="border-top-0"><b>Số Lượng</b></th>
                                <th class="border-top-0"><b>Còn lại</b></th>
                                <th class="border-top-0"><b>Ngày bắt đầu</b></th>
                                <th class="border-top-0"><b>Ngày kết thúc</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0"><b>Thao tác</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_array($allPromotions))
                                @foreach($allPromotions as $key => $value)
                                    <tr>
                                        <td><b>{{$key+1}}</b></td>
                                        <td>{{$value->ten_km}}</td>
                                        <td>{{$value->ma_km}}</td>
                                        <td>{{$value->phantramgiam}}</td>
                                        <td>{{$value->soluong}}</td>
                                        <td>{{$value->conlai}}</td>
                                        <td>{{$value->ngaybatdau_km}}</td>
                                        <td>{{$value->ngayketthuc_km}}</td>
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
                                        <td>
                                            <a href="{{route('admin.promotion.update', $value->id)}}"><span class="icon-action"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
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
