@extends('homePages.index')
@section('title', 'Cập nhật mật khẩu')
@section('content')
<div class="container">
    <div class="row margin-bottom-40">
        <x-sliderbar-account />
        <div class="col-md-9 col-sm-7">
            <h1>Cập nhật mật khẩu</h1>
            <div class="content-page">
                <form action="{{route('home.account.handle_change_password')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Mật khẩu cũ<span class="require">*</span></label>
                        <input
                            type="password"
                            name="oldPassword"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Mật khẩu mới<span class="require">*</span></label>
                        <input
                            type="password"
                            name="password"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Xác nhận mật khẩu<span class="require">*</span></label>
                        <input
                            type="password"
                            name="repassword"
                            class="form-control">
                    </div>
                    @if($errors->any())
                        <span class="msg__error__cart">{{$errors->first()}}</span>
                    @endif
                    @if (Session::has('success'))
                        <span class="msg__success__cart">{{Session::get('msg-success')}}</span>
                    @endif
                    <button class="btn btn-primary" type="submit" id="button-confirm">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
