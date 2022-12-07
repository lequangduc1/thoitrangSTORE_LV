<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class CommentController extends Controller
{

    public function index(){
        $params['comments'] = DanhGia::all();
        return view('adminPages.comment.index', $params);
    }

    public function updateStatus($id){
        $comment = DanhGia::find($id);
        $comment->trangthai = $comment->trangthai ? 0 : 1;
        $comment->save();
        Toastr::success('Cập nhật thành công!!');
        return redirect()->back();
    }

    public function deleteComment($id){
        $comment = DanhGia::find($id);
        if(!$comment){
            Toastr::error('Đánh giá không tồn tại!!');
            return redirect()->back();
        }
        $comment->delete();
        Toastr::success('Xóa Thành Công!!');
        return redirect()->back();
    }

}
