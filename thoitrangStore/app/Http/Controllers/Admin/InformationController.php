<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class InformationController extends Controller
{

    public function index(){
        return view('adminPages.information.index');
    }

    public function store(InformationRequest $request){
        try {
            $information = Information::all()->first();
            $newInformation = Information::find($information->id);

            $data = $request->input();
            if($request->file('logo')){
                $file = $request->file('logo');
                $fileName = time().$file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $data['logo'] = 'uploads/'.$fileName;
            }

            if($request->file('favicon')){
                $file = $request->file('favicon');
                $fileName = time().$file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $data['favicon'] = 'uploads/'.$fileName;
            }
            $newInformation->fill($data);
            $newInformation->save();

            Toastr::success('Lưu thành công!');
            return redirect()->route('admin.information.index');

        }catch (\Exception $exception){
            dd($exception);
            Toastr::error('Lưu thất bại!');
            return redirect()->route('admin.information.index');
        }
    }

}
