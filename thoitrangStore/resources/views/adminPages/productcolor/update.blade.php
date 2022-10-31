@extends('adminPages.index')
@section('title','Thêm tài khoản')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Loại sản phẩm</h4>
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
                    <form class="form-horizontal form-material" action="{{route('admin.productcolor.store')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control p-0 border-0" name="id" value="{{$productColor->id}}" hidden>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>tên loại </b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="color" class="form-control p-0 border-0" name="tenmau" value="{{$productColor->tenmau}}">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12"><b>Trạng thái</b></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option value="1" {{$productColor->trangthai==1 ? 'selected' : ''}}>Hiện</option>
                                    <option value="0" {{$productColor->trangthai==0 ? 'selected' : ''}}>Ẩn</option>
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
