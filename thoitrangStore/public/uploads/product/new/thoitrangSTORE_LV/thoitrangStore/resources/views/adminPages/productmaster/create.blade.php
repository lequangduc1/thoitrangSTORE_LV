@extends('adminPages.index')
@section('title','Thêm Sản phẩm Chủ Thể')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Thêm Sản phẩm Chủ Thể</h4>
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
                    <form class="form-horizontal form-material" action="{{route('admin.product_master.store')}}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Tên sản phẩm</b><span
                                    class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="ten_sp" required/>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-sm-6" style="float: left">
                            <label class="col-md-12 p-0"><b>Mã code sản phẩm</b><span
                                    class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="macodesanpham" required/>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12">
                                <b>Loại sản phẩm</b><span class="input__required">*</span> /
                                <a
                                    href="{{route('admin.producttype.create')}}"
                                    style="color: #0a53be"
                                > Thêm loại Sản Phẩm <i class="fa fa-plus-circle"></i>
                                </a>
                            </label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idloaisanpham"
                                        class="form-select shadow-none p-0 border-0 form-control-line">
                                    @foreach($productType as $value)
                                        <option value="{{$value->id}}">{{$value->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Trạng thái</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line"
                                        required>
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Mô tả sản phẩm</b><span
                                    class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="mota" required/>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
