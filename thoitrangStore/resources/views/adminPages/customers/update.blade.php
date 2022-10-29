@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Nhập thông khuyến mãi</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @if(!empty($khachhang))
                        <form class="form-horizontal form-material" action="{{route('admin.customers.store')}}" method="POST">
                            @csrf
                            <input type="text" class="form-control p-0 border-0" value="{{$khachhang->id}}" name="id" hidden>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"><b>Tên Khách hàng</b><span style="color: red"> *</span></label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" class="form-control p-0 border-0" value="{{$khachhang->hovaten}}" name="hovaten" required disabled></div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0"><b>Email Khách hàng</b><span style="color: red"> *</span></label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" class="form-control p-0 border-0" value="{{$khachhang->email}}"  name="email" required disabled>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0"><b>Địa chỉ</b><span style="color: red"> *</span></label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" class="form-control p-0 border-0" value="{{$khachhang->diachi}}"  name="diachi">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"><b>Số điện thoại</b><span style="color: red"> *</span></label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="sodienthoai" value="{{$khachhang->sodienthoai}}"  class="form-control p-0 border-0">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12"><b>Trạng thái</b><span style="color: red"> *</span></label>
                                <div class="col-sm-12 border-bottom">
                                    <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                                        <option value="1" {{$khachhang->trangthai==1 ? 'selected' : ''}}>UnLock</option>
                                        <option value="0" {{$khachhang->trangthai==0 ? 'selected' : ''}}>Lock</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        </form>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
