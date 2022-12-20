@extends('adminPages.index')
@section('title','Cập nhật thông tin sản phẩm chủ thể')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Sữa sản phẩm</h4>
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
                        <input type="text" class="form-control p-0 border-0" name="id" value="{{$products->id}}"
                               hidden/>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Tên sản phẩm</b><span
                                    class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" value="{{$products->ten_sp}}"
                                       name="ten_sp"/>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-sm-6" style="float: left">
                            <label class="col-md-12 p-0"><b>Mã code sản phẩm</b><span
                                    class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="macodesanpham"
                                       value="{{$products->macodesanpham}}"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Loại sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idloaisanpham"
                                        class="form-select shadow-none p-0 border-0 form-control-line">
                                    @foreach($productType as $value)
                                        <option
                                            value="{{$value->id}}" {{ (int)$products->idloaisanpham ==  (int)$value->id ? 'selected' : ''}}>{{$value->tenloai}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Trạng thái</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option value="1" {{$products->trangthai==1 ? 'selected' : ''}}>Hiện</option>
                                    <option value="0" {{$products->trangthai==0 ? 'selected' : ''}}>Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Mô tả sản phẩm</b><span
                                    class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="mota"
                                       value="{{$products->mota}}"/>
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
