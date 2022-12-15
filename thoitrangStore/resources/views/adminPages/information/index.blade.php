@extends('adminPages.index')
@section('title', 'Thông tin wesbite')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Thông tin wesbite</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal form-material"
                          action="{{route('admin.information.store')}}"
                          enctype="multipart/form-data"
                          method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="image-review">
                                    @if(getInformation('logo'))
                                        <img id="image__logo-review" src="{{asset(getInformation('logo'))}}" alt="logo"/>

                                    @else
                                        <img id="image__logo-review" src="{{asset('uploads/logo_default.png')}}" alt="logo"/>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="formFile"
                                           class="form-label">Logo</label>
                                    <input class="form-control"
                                           type="file"
                                           onchange="handleReviewImage(this,'image__logo-review')"
                                           name="logo">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="image-review">
                                    @if(getInformation('favicon'))
                                        <img id="image__favicon-review" src="{{asset(getInformation('favicon'))}}" alt="logo"/>

                                    @else
                                        <img id="image__favicon-review" src="{{asset('uploads/logo_default.png')}}" alt="logo"/>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Favicon</label>
                                    <input class="form-control"
                                           onchange="handleReviewImage(this,'image__favicon-review')"
                                           type="file"
                                           name="favicon">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Tên cửa hàng</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text"
                                       value="  {{getInformation('ten_shop')}}"
                                       class="form-control p-0 border-0"
                                       name="ten_shop"
                                       required> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email"
                                       class="form-control p-0 border-0"
                                       value="{{getInformation('email')}}"
                                       name="email" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Số điện thoại</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="number"
                                       value="{{getInformation('dien_thoai')}}"
                                       class="form-control p-0 border-0"
                                       name="dien_thoai" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Địa chỉ</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" name="dia_chi" required>{{getInformation('dia_chi')}}
                                </textarea>
                            </div>
                        </div>
{{--                        <div class="form-group mb-4">--}}
{{--                            <label class="col-md-12 p-0">Iframe</label>--}}
{{--                            <div class="col-md-12 border-bottom p-0">--}}
{{--                                <textarea rows="5" --}}
{{--                                          class="form-control p-0 border-0" --}}
{{--                                          name="iframe" --}}
{{--                                          required></textarea>--}}
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
