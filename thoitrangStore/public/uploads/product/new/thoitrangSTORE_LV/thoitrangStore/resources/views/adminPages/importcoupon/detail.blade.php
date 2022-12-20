@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Chi tiết phiếu nhập</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        @php
                            \Yoeunes\Toastr\Facades\Toastr::error($error);
                        @endphp
                    @endforeach
                @endif
                @if($phieunhap)
                    <div class="card-body" style="border: 1px solid #000; border-radius: 10px">
                        <label class="col-md-12 p-0 text-center"><b>THÔNG TIN PHIẾU NHẬP</b></label>
                        <div class="form-horizontal form-material">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"><b>Tên cửa hàng:</b> {{$phieunhap->tencuahang}}</label>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"><b>Tổng tiền đơn
                                        hàng: </b><?php echo number_format($phieunhap->tongtien)?> VNĐ</label>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12"><label class="col-md-12 p-0"><b>Tình trạng đơn hàng: </b>
                                        <button class="btn btn-success"
                                                style="
                                                    background-color:{{$phieunhap->trangthai == 0 ? 'Yellow' :
                                                        ( $phieunhap->trangthai == 1 ? 'red' : 'chartreuse')}};
                                                    color: #000;
                                                    border-radius: 5px"
                                        >
                                            {{$phieunhap->trangthai == 0 ?'Chờ giao hàng' :
                                                    ( $phieunhap->trangthai == 1 ?'Bị Hủy' :'Thành công')}}
                                        </button>
                                    </label>
                                </div>
                            </div>
                            @if($phieunhap->trangthai == 0)
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Xác nhận đơn nhập hàng: </b></label>
                                    <form class="form-horizontal form-material"
                                          action="{{route('admin.importcoupon.confirm')}}" method="POST">
                                        @csrf
                                        <input name="id" value="{{$phieunhap->id}}" hidden/>
                                        <button class="btn btn-success" value="2" name="trangthai">Xác nhận đơn thành
                                            công
                                        </button>
                                        <button class="btn btn-danger" value="1" name="trangthai">Xác nhận đơn thất
                                            bại
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(!is_array($chitietphieunhap))
                        <div class="card-body" style="border: 1px solid #000; margin-top: 10px; border-radius: 10px">
                            <label class="col-md-12 p-0 text-center"><b>Sản phẩm ({{count($chitietphieunhap)}}
                                    )</b></label>
                            @foreach($chitietphieunhap as $key => $value)
                                <div class="card-body col-md-6"
                                     style="border: 1px solid #000; margin-top: 10px; border-radius: 10px; float: left">
                                    <div class="form-horizontal form-material">
                                        <div class="form-group col-md-12 " style="float: left">
                                            <label class="col-md-12 p-0"><b>STT:</b> {{$key + 1}}</label>
                                        </div>
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Tên sản
                                                    phẩm: </b> {{$value->chitietsanphams->sanphams->ten_sp}}</label>
                                        </div>
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Tên sản
                                                    phẩm: </b> {{$value->chitietsanphams->sizes->tensize}}</label>
                                        </div>
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Tên sản phẩm: </b>
                                                <button class="btn btn-success"
                                                        style="
                                                            background-color: {{$value->chitietsanphams->maus->tenmau}};
                                                            color: #000;
                                                            border-radius: 5px"
                                                >
                                                    Màu sản phẩm
                                                </button>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Số lượng: </b> {{$value->soluongnhap}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Số
                                                    lượng: </b> <?php echo number_format($value->gianhap)?> VNĐ</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
