@extends('homePages.index')
@section('title', 'Tài khoản')
@section('content')
    <div class="container">
        <div class="row margin-bottom-40">
            <x-sliderbar-account />

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <h1>Tài khoản</h1>
                <div class="content-page">
                    <form action="{{route('home.account.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">Họ và tên<span class="require">*</span></label>
                            <input
                                type="text"
                                value="{{$userCurrent->hovaten}}"
                                name="hovaten"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Email<span class="require">*</span></label>
                            <input
                                type="email"
                                name="email"
                                disabled
                                value="{{$userCurrent->email}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Số điện thoại<span class="require">*</span></label>
                            <input
                                type="text"
                                name="sodienthoai"
                                value="{{$userCurrent->sodienthoai}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Địa chỉ<span class="require">*</span></label>
                            <input
                                type="text"
                                name="diachi"
                                value="{{$userCurrent->diachi}}"
                                class="form-control">
                        </div>
                        @if($errors->any())
                            <span class="msg__error__cart">{{$errors->first()}}</span>
                        @endif
                        @if (Session::has('msg-success'))
                            <span class="msg__success__cart">{{Session::get('msg-success')}}</span>
                        @endif
                        <button class="btn btn-primary" type="submit" id="button-confirm">Cập nhật</button>
                    </form>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
@endsection
