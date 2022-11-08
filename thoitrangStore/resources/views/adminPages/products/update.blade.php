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
                    <form class="form-horizontal form-material" action="{{route('admin.productsize.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Tên sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="tensanpham" />
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Ảnh sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="file" class="form-control p-0 border-0" name="anhsanpham" accept="image/png, image/jpeg" multiple />
                            </div>
                        </div>
                        <div class="form-group mb-4 col-sm-6" style="float: left">
                            <label class="col-md-12 p-0"><b>Mã code sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="macodesanpham" />
                            </div>
                        </div>
                        <div class="form-group mb-4 col-sm-6" style="float: left">
                            <label class="col-md-12 p-0"><b>Giá sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="giasanpham"> </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Màu sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idmau" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>chọn màu sản phẩm</option>
                                    @foreach($productColor as $value)
                                        <option value="{{$value->id}}">{{$value->tenmau}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Kích thước sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idsize" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>chọn kích thước</option>
                                    @foreach($productSize as $value)
                                        <option value="{{$value->id}}">{{$value->tensize}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Loại sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idloaisanpham" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option>chọn loại sản phẩm</option>
                                    @foreach($productType as $value)
                                        <option value="{{$value->id}}">{{$value->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Trạng thái</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection