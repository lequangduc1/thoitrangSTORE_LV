@extends('adminPages.index')
@section('title', 'Cập nhật tài khoản')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cập nhật tài khoản</h4>
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
                    <form class="form-horizontal form-material" action="{{route('admin.account.store')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$account->id}}" name="id"/>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Họ và tên</b> <span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text"
                                       class="form-control p-0 border-0"
                                       name="ten"
                                       value="{{$account->ten}}"
                                       required> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0"><b>Email</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email"
                                       class="form-control p-0 border-0"
                                       value="{{$account->email}}"
                                       name="email" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Số điện thoại</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text"
                                       name="phone"
                                       value="{{$account->phone}}"
                                       class="form-control p-0 border-0"
                                       required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Địa chỉ</b></label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" name="diachi" required>{{$account->diachi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12"><b>Trạng thái</b></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option value="1" {{$account->trangthai==1 ? 'selected' : ''}}>Hiện</option>
                                    <option value="0" {{$account->trangthai==0 ? 'selected' : ''}}>Ẩn</option>
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
