<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Giaodien;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GiaodienController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $giaodiens=Giaodien::orderBy('id','desc')->paginate(10);

        return view('admin.giaodien.list',compact('giaodiens'));
    }

    public function create() {

        $data['giaodien'] = Giaodien::paginate(10);
        
        return view('admin.giaodien.create', $data);
    }

    public function store(Request $request) {

        $valid = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập Tên',
            'name.unique' => 'Tên đã trùng, vui lòng chọn tên khác',
        ]);

       
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            
            $giaodien = Giaodien::create([
                'name'      => $request->input('name'),
                'content'   => $request->input('content'),
                'on_off'    => '0',
                'users_id'  => Auth::user()->id,
            ]);
            return redirect()->route('admin.giaodien.index')->with('message', "Thêm chuyên mục ".$giaodien->name." thành công");
        }
    }

    public function show($id){
        
        $giaodien = Giaodien::find($id);
        
        if ($giaodien !== null) {
            return view('admin.giaodien.show', compact('giaodien'));
        }

        return redirect()->route('admin.giaodien.list')->with('error', 'Không tìm thấy giao diện này');
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all(), [
            'name'    => 'required',
            'content'   =>'required',
            
        ],[
            //Required
            'name.required' => 'Vui lòng nhập  tên',
            'content.required' => 'Vui lòng nhập nội dung',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $giaodien = Giaodien::find($id);
            $giaodien->name = $request->input('name');
            $giaodien->content = $request->input('content');
            $giaodien->on_off = 1;
            $giaodien->users_id=Auth::user()->id;
            $giaodien->updated_at=now();
            $giaodien->save();

        return redirect()->route('admin.giaodien.index')->with('message', "Cập nhật ".$giaodien->name." thành công");
        }
    }

    public function delete($id){

        $giaodien = Giaodien::find($id);
        $giaodien->delete();

        return redirect()->route('admin.giaodien.index')->with('message', "Xóa giaodien ".$giaodien->id." thành công");
    }

     public function updateActive($id){

        $giaodien=Giaodien::find($id);

        if($giaodien->on_off==1){
                $giaodien->on_off=0;
            $giaodien->save();
            return redirect()->route('admin.giaodien.index')->with('message',"Nội dung ".$giaodien->name." được Tắt");
        }else{
            $giaodien->on_off=1;
            $giaodien->save();
            return redirect()->route('admin.giaodien.index')->with('message',"Nội dung ".$giaodien->name." được Mở");
        }
    }
}
