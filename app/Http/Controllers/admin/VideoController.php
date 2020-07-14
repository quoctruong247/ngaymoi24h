<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index(){

    	$videos=Video::get();

    	return view('admin.video.list',compact('videos'));
    }

    public function create(){

        return view('admin.video.create');

    }

    public function store(Request $request){

        $valid = Validator::make($request->all(), [
            'name'        => 'required',
            'link'   	=> 'required',
            'image'      => 'required',
        ],[
            'name.required' 	=> 'Vui lòng nhập tên',
            'image.required'     => 'Vui lòng chọn hình',
            'link.required' 	=> 'Vui lòng nhập liên kết',
            
        ]);
        
        if ($valid->fails()) {

            return redirect()->back()->withErrors($valid)->withInput();

        } else {
            $video=Video::create([
                'name'      =>$request->name,
                'link'      =>$request->link,
                'users_id'  =>Auth::user()->id,
                'image'     =>$request->image,
            ]);

            return redirect()->route('admin.video.index')->with('message', "Thêm video ".$video->name. " thành công");
        }
    }

    public function show($id){

        $video = Video::find($id);
        
        if ($video !== null) {
            return view('admin.video.show', compact('video'));
        }

        return redirect()->route('admin.video.list')->with('error', 'Không tìm thấy video này');
    }

    public function update(Request $request, $id){
        
        $valid = Validator::make($request->all(), [
            'name'    => 'required|unique:videos,name,'.$id,
            'link'=> 'required',
            'image'=> 'required',
        ],[
            //Required
            'name.required' => 'Vui lòng nhập tên',
            'link.required'  =>'Vui lòng nhập liên kết',
            'image.required'  =>'Vui lòng chọn hình',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $video = video::find($id);
            $video->name = $request->name;
            $video->link = $request->link;
            $video->image=$request->image;
            $video->users_id=Auth::user()->id;
            $video->updated_at=now();
            $video->save();

            return redirect()->route('admin.video.index')->with('message', "Cập nhật video ".$video->name." thành công");
        }
    }

    public function delete($id){
        $video = video::find($id);
        $video->delete();

        return redirect()->route('admin.video.index')->with('message', "Xóa video ".$video->name." thành công");
    }

    public function updateActive($id){
        $video=video::find($id);
        if($video->On_Off==1){
                $video->On_Off=0;
            $video->save();

            return redirect()->route('admin.video.index')->with('message',"video ".$video->name." được Tắt");
        }else{
            $video->On_Off=1;
            $video->save();

            return redirect()->route('admin.video.index')->with('message',"video ".$video->name." được Mở");
        }
    }
    
}
