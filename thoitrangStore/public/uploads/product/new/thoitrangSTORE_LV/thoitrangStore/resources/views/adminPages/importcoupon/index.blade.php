@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Danh sách phiếu nhập</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal"></a></li>
                    </ol>
                    <a href="{{route('admin.importcoupon.create')}}"
                       class="btn btn-primary  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                        Nhập hàng
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
                    <div class="col-md-12">
                        <form action="{{route('admin.importcoupon.search')}}" method="POST">
                            @csrf
                            <div class="col-md-2 border-bottom" style="float: left">
                                <label
                                    style="
                                                    background-color:{{$trangthai == 0 ? 'Yellow' :
                                                        ( $trangthai == 1 ? 'red' : 'chartreuse')}};
                                                    color: #000;
                                                    border-radius: 5px"
                                ><b>Trạng thái</b></label>
                                <select name="trangthai" class="form-select shadow-none p-0  ">
                                    <option value="2" {{$trangthai == 2 ? 'selected' : ''}}>Đơn thành công</option>
                                    <option value="1" {{$trangthai == 1 ? 'selected' : ''}}>Đơn bị hủy</option>
                                    <option value="0" {{$trangthai == 0 ? 'selected' : ''}}>Đơn chờ xử lí</option>
                                </select>
                            </div>
                            <div class="col-md-4" style="float: left; margin-left: 10px">
                                <label><b>Tên cửa hàng nhập</b></label>
                                <input name="search" type="text" placeholder="Search..." class="form-control mt-0 ">
                            </div>
                            <div class="col-md-1" style="float: left; margin-left: 10px; margin-top: 30px">
                                <button class="btn btn-info">Tìm kiếm</button>
                            </div>

                        </form>
                    </div>

                    <h3 class="box-title"></h3>

                    <div class="table-responsive col-md-12">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0"><b>Tên cửa hàng nhập</b></th>
                                <th class="border-top-0"><b>Số lượng mẫu</b></th>
                                <th class="border-top-0"><b>Trạng thái</b></th>
                                <th class="border-top-0"><b>Tổng tiền</b></th>
                                <th class="border-top-0"><b>Thao tác</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_array($phieunhap))
                                @foreach($phieunhap as $key => $value)
                                    <tr>
                                        <td><b>{{$key+1}}</b></td>
                                        <td>{{$value->tencuahang}}</td>
                                        <td>{{$value->tencuahang}}</td>
                                        <td>
                                            <button class="btn btn-success"
                                                    style="
                                                    background-color:{{$value->trangthai == 0 ? 'Yellow' :
                                                        ( $value->trangthai == 1 ? 'red' : 'chartreuse')}};
                                                    color: #000;
                                                    border-radius: 5px"
                                            >
                                                {{$value->trangthai == 0 ?'Chờ giao hàng' :
                                                        ( $value->trangthai == 1 ?'Bị Hủy' :'Thành công')}}
                                            </button>
                                        </td>
                                        <td><?php echo number_format($value->tongtien)?> VNĐ</td>
                                        <td>
                                            <a href="{{route('admin.importcoupon.detail', $value->id)}}"><span
                                                    class="icon-action"><i class="fa fa-edit"
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
