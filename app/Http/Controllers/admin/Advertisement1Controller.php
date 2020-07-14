<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Advertisement1;
use App\Category;
use Illuminate\Support\Facades\Auth;
class Advertisement1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$advertisement1s=Advertisement1::orderBy('id','desc')->paginate(10);

    	return view('admin.advertisement1.list',compact('advertisement1s'));
    }

    public function create() {

        $categories = Category::where('on_off','1')->get();
        return view('admin.advertisement1.create', compact('categories'));
    }

    public function store(Request $request) {

        $valid = Validator::make($request->all(), [
            'image' => 'required',
            'link' => 'required',
        ], [
            'image.required' => 'Vui lòng chọn hình',
            'link.required' => 'Vui lòng chọn liên kết',
        ]);

       
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            
            $advertisement1 = Advertisement1::create([
                'image'      => $request->image,
                'link'   => $request->link,
                'users_id'  => Auth::user()->id,
            ]);
            return redirect()->route('admin.advertisement1.index')->with('message', "Thêm ". $advertisement1->name." thành công");
        }
    }

    public function show($id){
        
        $advertisement1 = Advertisement1::find($id);
        $categories = Category::where('on_off','1')->get();
        if ($advertisement1 !== null) {
            return view('admin.advertisement1.show', compact('advertisement1','categories'));
        }

        return redirect()->route('admin.advertisement1.list')->with('error', 'Không tìm thấy quảng cáo này');
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all(), [
            'image'    => 'required',
            'link'  =>'required',

        ],[
            //Required
            'image.required' => 'Vui lòng nhập hình',
            'link.required' =>'Vui lòng nhập liên kết',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $advertisement1 = Advertisement1::find($id);
            $advertisement1->image = $request->image;
            $advertisement1->link = $request->link;
            $advertisement1->users_id=Auth::user()->id;
            $advertisement1->save();

        return redirect()->route('admin.advertisement1.index')->with('message', "Cập nhật ".$advertisement1->name." thành công");
        }
    }

    public function delete($id){

        $advertisement1 = Advertisement1::find($id);
        $advertisement1->delete();

        return redirect()->route('admin.advertisement1.index')->with('message', "Xóa  ".$advertisement1->name." thành công");
    }

     public function updateActive($id){

        $advertisement1=Advertisement1::find($id);

        if($advertisement1->on_off==1){
                $advertisement1->on_off=0;
            $advertisement1->save();
            return redirect()->route('admin.advertisement1.index')->with('message',"Nội dung ".$advertisement1->name." được Tắt");
        }else{
            $advertisement1->on_off=1;
            $advertisement1->save();
            return redirect()->route('admin.advertisement1.index')->with('message',"Nội dung ".$advertisement1->name." được Mở");
        }
    }
}
