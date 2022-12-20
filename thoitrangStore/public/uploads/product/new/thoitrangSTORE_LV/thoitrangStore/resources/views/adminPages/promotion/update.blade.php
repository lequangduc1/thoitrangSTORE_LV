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
                    @if(!empty($promotion))
                        <form class="form-horizontal form-material" action="{{route('admin.promotion.store')}}"
                              method="POST">
                            @csrf
                            <input type="text" class="form-control p-0 border-0" value="{{$promotion->id}}" name="id"
                                   hidden></div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Tên khuyến mãi<span style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control p-0 border-0" value="{{$promotion->ten_km}}"
                               name="ten_km" required></div>
                </div>

                <div class="form-group mb-4">
                    <label for="example-email" class="col-md-12 p-0">Mã khuyến mãi<span
                            style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control p-0 border-0" value="{{$promotion->ma_km}}" name="ma_km"
                               required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Phần trăm giảm<span style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="phantramgiam" value="{{$promotion->phantramgiam}}"
                               class="form-control p-0 border-0" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Số lượng<span style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="soluong" value="{{$promotion->soluong}}"
                               class="form-control p-0 border-0" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Còn lại<span style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="conlai" value="{{$promotion->conlai}}"
                               class="form-control p-0 border-0" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Ngày bắt đầu<span style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="date" name="ngaybatdau_km" value="{{$promotion->ngaybatdau_km}}"
                               class="form-control p-0 border-0" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Ngày kết thúc<span style="color: red"> *</span></label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="date" name="ngayketthuc_km" value="{{$promotion->ngayketthuc_km}}"
                               class="form-control p-0 border-0" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-sm-12">Trạng thái<span style="color: red"> *</span></label>
                    <div class="col-sm-12 border-bottom">
                        <select name="trangthai" class="form-select shadow-none p-0 border-0 form-control-line">
                            <option value="1" {{$promotion->trangthai==1 ? 'selected' : ''}}>Hiện</option>
                            <option value="0" {{$promotion->trangthai==0 ? 'selected' : ''}}>Ẩn</option>
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
