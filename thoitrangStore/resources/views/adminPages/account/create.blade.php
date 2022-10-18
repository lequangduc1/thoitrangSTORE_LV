@extends('adminPages.index')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Nhập thông tin tài khoản</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="{{route('admin.account.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Họ và tên</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="ten" required> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" class="form-control p-0 border-0" name="email" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" name="password" class="form-control p-0 border-0" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Số điện thoại</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="phone" class="form-control p-0 border-0" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Địa chỉ</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" name="diachi" required></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Trạng thái</label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
{{--                        <div class="form-group mb-4">--}}
{{--                            <label class="col-sm-12">Trạng thái</label>--}}
{{--                            <div class="col-sm-12 border-bottom">--}}
{{--                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">--}}
{{--                                    <option value="1">Hiện</option>--}}
{{--                                    <option value="0">Ẩn</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
