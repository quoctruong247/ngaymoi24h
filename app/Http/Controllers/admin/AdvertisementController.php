<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Advertisement;
use App\Category;
use Illuminate\Support\Facades\Auth;
class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$advertisements=Advertisement::orderBy('id','desc')->paginate(10);

    	return view('admin.advertisement.list',compact('advertisements'));
    }

    public function create() {

        $categories = Category::where('on_off','1')->get();
        return view('admin.advertisement.create', compact('categories'));
    }

    public function store(Request $request) {

        $valid = Validator::make($request->all(), [
            'image' => 'required',
            'link' => 'required',
            'categories_id'=>'required',
        ], [
            'image.required' => 'Vui lòng chọn hình',
            'link.required' => 'Vui lòng chọn liên kết',
            'categories_id.required' => 'Vui lòng chọn liên kết',
        ]);

       
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            
            $advertisement = Advertisement::create([
                'image'      => $request->image,
                'link'   => $request->link,
                'categories_id'   => $request->categories_id,
                'users_id'  => Auth::user()->id,
            ]);
            return redirect()->route('admin.advertisement.index')->with('message', "Thêm ". $advertisement->name." thành công");
        }
    }

    public function show($id){
        
        $advertisement = Advertisement::find($id);
        $categories = Category::where('on_off','1')->get();
        if ($advertisement !== null) {
            return view('admin.advertisement.show', compact('advertisement','categories'));
        }

        return redirect()->route('admin.advertisement.list')->with('error', 'Không tìm thấy quảng cáo này');
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all(), [
            'image'    => 'required',
            'link'  =>'required',
            
        ],[
            //Required
            'image.required' => 'Vui lòng nhập hình',
            'link.required' =>'Vui lòng nhập liên kết',
            'categories_id.required' =>'Vui lòng chọn danh mục'
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $advertisement = Advertisement::find($id);
            $advertisement->image = $request->image;
            $advertisement->link = $request->link;
            $advertisement->categories_id = $request->categories_id;
            $advertisement->users_id=Auth::user()->id;
            $advertisement->updated_at=now();
            $advertisement->save();

        return redirect()->route('admin.advertisement.index')->with('message', "Cập nhật ".$advertisement->name." thành công");
        }
    }

    public function delete($id){

        $advertisement = Advertisement::find($id);
        $advertisement->delete();

        return redirect()->route('admin.advertisement.index')->with('message', "Xóa  ".$advertisement->name." thành công");
    }

     public function updateActive($id){

        $advertisement=Advertisement::find($id);

        if($advertisement->on_off==1){
                $advertisement->on_off=0;
            $advertisement->save();
            return redirect()->route('admin.advertisement.index')->with('message',"Nội dung ".$advertisement->name." được Tắt");
        }else{
            $advertisement->on_off=1;
            $advertisement->save();
            return redirect()->route('admin.advertisement.index')->with('message',"Nội dung ".$advertisement->name." được Mở");
        }
    }
}
