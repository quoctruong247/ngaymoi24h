<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $cates_update=Category::get();
        // foreach ($cates_update as $key) {
        //     $key->Slug=Str::slug($key->name);
        //     $key->save();
        //     //$key->Title."--->".$key->Slug."<br>";
        // }
        // dd($cates_update);

        $categories = Category::orderBy('location', 'asc')->paginate(20);

        return view('admin.categories.index', compact('categories'));
    }


    public function create() {
        $data['categories'] = Category::paginate(10);
        return view('admin.categories.create', $data);
    }

    public function store(Request $request) {
        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
        ], [
            'name.required' => 'Vui lòng nhập Tên chuyên mục',
            'name.unique' => 'Chuyên mục đã trùng, vui lòng chọn tên khác',
        ]);

       
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            
            $category = Category::create([
                'name'      => $request->input('name'),
                'slug'      => Str::slug($request->input('name')),
                'on_off'    =>'0',
            ]);
            return redirect()->route('admin.category.index')->with('message', "Thêm chuyên mục ".$category->name." thành công");
        }
    }

    public function show($id) {
        $data['category'] = Category::find($id);
        $data['categories'] = Category::get();
        if ($data['category'] !== null) {
            return view('admin.categories.show', $data);
        }
        return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy chuyên mục này');
    }

    public function update(Request $request, $id) {
        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $id,
        ], [
            'name.required' => 'Vui lòng nhập Tên chuyên mục',
            'name.unique' => 'Chuyên mục đã trùng, vui lòng chọn tên khác',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $category = Category::find($id);
            if ($category !== null) {
                $category->name = $request->input('name');
                $category->slug = Str::slug($request->input('name'));
                $category->location=$request->location;
                $category->save();
                return redirect()->route('admin.category.index')->with('message', "Cập nhật chuyên mục ".$category->name." thành công");
            }
            return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy chuyên mục này');
        }
    }

    public function delete($id) {
        $category = Category::find($id);
        if ($category !== null) {
            $category->delete();
            return redirect()->route('admin.category.index')->with('message', "Xóa chuyên mục ".$category->name." thành công");
        }
        return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy chuyên mục này');
    }

    public function updateActive($id){
        $category=Category::find($id);
        if($category->on_off==1){
                $category->on_off=0;
            $category->save();
            return redirect()->route('admin.category.index')->with('message',"Bài ".$category->id." được Tắt");
        }else{
            $category->on_off=1;
            $category->save();
            return redirect()->route('admin.category.index')->with('message',"Bài ".$category->id." được Mở");
        }
    }
}
