@extends('adminPages.index')
@section('title','Thêm tài khoản')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Sản phẩm</h4>
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
                <div class="card-body">
                    <form class="form-horizontal form-material" action="{{route('admin.importcoupon.addToCart')}}" method="POST" enctype="multipart/form-data" style="border-bottom: 1px solid #000">
                        @csrf
                        <div class="form-group col-sm-4 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idsanpham" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>--- chọn sản phẩm ---</option>
                                    @foreach($sanphams as $value)
                                        <option value="{{$value->sanphams->id}}">{{$value->sanphams->ten_sp}} <i style="color: {{$value->maus->tenmau}}">a</i></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2 mb-4" style="float: left; margin-left: 10px">
                            <label class="col-md-12 p-0"><b>Số lượng</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="number" class="form-control p-0 border-0" name="soluongnhap" />
                            </div>
                        </div>
                        <div class="form-group col-sm-2 mb-4" style="float: left; margin-left: 10px">
                            <label class="col-md-12 p-0"><b>Giá nhập</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="number" class="form-control p-0 border-0" name="gianhap" />
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12" >
                                <button class="btn btn-success" style="margin-top: 31px; margin-left: 20px">Thêm sản phẩm</button>
                            </div>
                        </div>
                    </form>
                    @if(is_array($allProductInCart))
                        <div class="card-body" style="border: 1px solid #000; margin-top: 10px; border-radius: 10px" >
                            <label class="col-md-12 p-0 text-center"><b>Sản phẩm ({{count($allProductInCart)}})</b></label>
                            @foreach($allProductInCart as $key => $value)
                                <div class="card-body col-md-6" style="border: 1px solid #000; margin-top: 10px; border-radius: 10px; float: left" >
                                    <div class="form-horizontal form-material">
{{--                                        <div class="form-group col-md-12" style="float: left">--}}
{{--                                            <label class="col-md-12 p-0"><b>Tên sản phẩm: </b>  {{$value->ten_sp}}</label>--}}
{{--                                        </div>--}}
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Tên sản phẩm: </b>  {{$value['soluongnhap']}}</label>
                                        </div>
                                        <div class="form-group col-md-12" style="float: left">
                                            <label class="col-md-12 p-0"><b>Tên sản phẩm: </b>  {{$value['gianhp']}}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
