@extends('adminPages.index')
@section('title','Thêm sản phẩm biến thể')
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
                    <form class="form-horizontal form-material" action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-sm-12 mb-6" style="float: left">
                            <label class="col-sm-12">
                                <b>Sản phẩm</b><span class="input__required">*</span> /
                                <a
                                    href="{{route('admin.product_master.create')}}"
                                    style="color: #0a53be"
                                >Thêm sản phẩm <i class="fa fa-plus-circle"></i>
                                </a>
                            </label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idsanpham" class="form-select shadow-none p-0 border-0 form-control-line" required>
                                    @foreach($productMaster as $value)
                                        <option value="{{$value->id}}">{{$value->ten_sp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Ảnh sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12">
                                <input type="file" class="form-control p-0 border-0" name="anhsanpham" accept="image/png, image/jpeg" id="imageCreate" />
                            </div>
                            <div class="col-md-12 d-flex justify-content-center border-bottom p-1 m-1">
                                <img src="" style="max-height: 400px;" id="previewImageCreate" />
                            </div>
                        </div>
                        <div class="form-group mb-4 col-sm-6" style="float: left">
                            <label class="col-md-12 p-0"><b>Giá sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="giasanpham"> </div>
                        </div>
                        <div class="form-group mb-4 col-sm-6" style="float: left">
                            <label class="col-md-12 p-0"><b>Số lượng</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="soluong" required> </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12">
                                <b>Màu sản phẩm</b><span class="input__required">*</span> /
                                <a
                                    href="{{route('admin.productcolor.create')}}"
                                    style="color: #0a53be"
                                >Thêm màu <i class="fa fa-plus-circle"></i>
                                </a>
                            </label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idmau" class="form-select shadow-none p-0 border-0 form-control-line" required>
                                    @foreach($productColor as $value)
                                        <option value="{{$value->id}}">{{$value->tenmau}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 mb-4" style="float: left">
                            <label class="col-sm-12">
                                <b>Kích thước sản phẩm</b><span class="input__required">*</span> /
                                <a
                                    href="{{route('admin.productsize.create')}}"
                                    style="color: #0a53be"
                                > Thêm kích thước <i class="fa fa-plus-circle"></i>
                                </a>
                            </label>
                            <div class="col-sm-12 border-bottom">
                                <select name="idsize" class="form-select shadow-none p-0 border-0 form-control-line" required>
                                    @foreach($productSize as $value)
                                        <option value="{{$value->id}}">{{$value->tensize}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 mb-4" style="float: left">
                            <label class="col-sm-12"><b>Trạng thái</b><span class="input__required">*</span></label>
                            <div class="col-sm-12 border-bottom">
                                <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line" required>
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group mb-4">
                            <label class="col-md-12 p-0"><b>Mô tả sản phẩm</b><span class="input__required">*</span></label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="mota" required/>
                            </div>
                        </div> -->
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success"> Thêm </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            $('#imageCreate').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
            $('#previewImageCreate').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        </script>
    @endpush
@endsection
