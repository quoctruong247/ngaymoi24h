<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Level;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$data['users']=User::orderBy('id','desc')->paginate(10);
    	return view('admin.user.list',$data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function update(Request $resquest, $id)
    {

        $valid=Validator::make(
            $resquest->all(),
            [
                'name'      => 'required',
                'email'     => 'required|email|unique:users,email,' . $id,
                'password'  => 'required',
                'levels_id'		=>'required',
            ],
            [
                'name.required'=>'Vui lòng nhập Tên',
                'email.required'=>'Vui lòng nhập Email',
                'email.email'=>'Vui lòng nhập đúng định dạng',
                'email.unique'=>'Email này đã tồn tại, vui lòng chọn Email khác',
                'levels_id.required'=>'Vui lòng chọn cấp độ sử dụng'

            ]);
        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $user=User::find($id);
            if ($user!==null){
                $user->name=$resquest->input('name');
                $user->email=$resquest->input('email');
                $user->levels_id=$resquest->input('levels_id');
                if ($resquest->input('password')){
                    $user->password=bcrypt($resquest->input('password'));
                }
                $user->save();
                return redirect()->route('admin.user.index')->with('trangthai',"Cập nhật ".$user->name." thành công");
            }
            return redirect()->route('admin.user.index')->with('error','Không tìm thấy người dùng này');
        }
    }

    public function delete($id)
    {
        $user=User::find($id);
        if ($user!==null){
            $user->delete();
            return redirect()->route('admin.user.index')->with('trangthai',"Xóa ".$user->name." thành công");
        }
        return redirect()->route('admin.user.index')->with('error','Không tìm thấy người dùng này');
    }

    public function store(Request $resquest)
    {
        $valid=Validator::make(
            $resquest->all(),
            [
                'name'      => 'required',
                'email'     => 'required|email|unique:users,email',
                'password'  => 'required|confirmed',
                'levels_id'		=>	'required',
            ],
            [
                'name.required'=>'Vui lòng nhập Tên',
                'email.required'=>'Vui lòng nhập Email',
                'email.email'=>'Vui lòng nhập đúng định dạng',
                'email.unique'=>'Email này đã tồn tại, vui lòng chọn Email khác',
                'password.required'=>'Vui lòng nhập Password',
                'levels_id.required'=>'Vui lòng chọn cấp độ sử dụng',
            ]);
        if ($valid->fails()){
        	
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
        	echo $resquest->input('level');
            $user=User::create([
                'name'		=>$resquest->input('name'),
                'email'		=>$resquest->input('email'),
                'password'	=>bcrypt($resquest->input('password')),
                'levels_id'		=>$resquest->input('level'),
                'active'	=>'0',
                
            ]);
            return redirect()->route('admin.user.index')->with('trangthai',"Thêm ".$user->name." thành công");
            //return view('admin.user.index');
        }

    }

    public function updateActive($id){

        $user=User::find($id);
        if($user->active==1){
                $user->active=0;
            $user->save();
            return redirect()->route('admin.user.index')->with('trangthai',$user->name. "được Tắt");
        }else{
            $user->active=1;
            $user->save();
            return redirect()->route('admin.user.index')->with('trangthai',$user->name. "được Mở");
        }
    }

    public function show($id)
    {
        $levels=Level::get();
        $users=User::find($id);
        if ($users!==null){
            return view('admin.user.show',compact('levels','users'));
        }
        return redirect()->route('admin.user.index')->with('error','Không tìm thấy người dùng này');
    }

}
