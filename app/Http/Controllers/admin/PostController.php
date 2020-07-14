<?php

namespace App\Http\Controllers\admin;

use App\Attachment;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
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

        // $posts_update=Post::get();
        
        // foreach ($posts_update as $key) {
        // $str=$key->Image;
        // $key->Slug=Str::slug($key->Title);
        // $key->users_id=2;
        // $key->On_Off=1;
        // $key->Image='https://ngaymoi24h.vn/upload/images/post/'.$str;
        // $key->save();
        // //dd($posts_update);
        // }
        // dd($posts_update);
        $cates = Category::where('on_off',1)->get();
        $users = User::where('active',1)->get();
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.post.search', compact('posts','cates','users'));
    }

    public function search(Request $request){
    if ($request->ajax()) {
        $output = '';
        $posts = Post::where('Title', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(50); 
        if ($posts) {
            foreach ($posts as $key => $post) {
            $output 
            .="<tr>
                    <td>$post->id</td>
                    <td>$post->Title</td>
                    <td><strong class='text-muted'>".$post->categories->name."</strong></td>
                    
                    ";
                    if (!empty($post->Image) && public_path($post->Image)){
                    $output.="<td width='100'><img src='$post->Image' class='img-responsive img-thumbnail' width='100%''>
                    </td>";
                    }else{
                    $output.="<td width='100'><img src='../public/admin/images/pc/no-image.jpg' class='img-responsive img-thumbnail' width='100%''>
                    </td>";
                    }
            $output.="<td>".$post->users->name."</td>
            <td>$post->created_at</td>
            <td>$post->updated_at</td>";
            $output.="<td><a href='activePost/$post->id'>";
            
            if($post->On_Off==1) {
                $output.="<img src='../public/admin/images/pc/icon_on.png' alt='on'>";
            }
            else{
                $output.="<img src='../public/admin/images/pc/icon_off.png' alt='off'>";
            }
            $output.="</a></td><td>";

            $output.="<a href='/$post->Slug.html' class='btn btn-success' target='_blank'> <i class='fab fa-edge'></i></a>
            <a href='post/$post->id' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
            // chặn user biên tập xóa xóa bài viết
            if (Auth::user()->levels_id!=5) {
            $output.="<a href='admin/post/$post->id' class='btn btn-danger' onclick='event.preventDefault();window.confirm('Bạn đã chắc chắn xóa chưa?') ?document.getElementById('post-delete-$post->id').submit() :0;'><i class='far fa-trash-alt'></i></a>
                <form action='admin/post/delete/$post->id' method='post' id='post-delete-$post->id'>";
            }//kết thúc chặn user biên tập xóa
            $output.="<input type='hidden' name='_token' value='YI2VYABEI57UpAyuZFTKnwlzQT6YD31APaUTFyv3'>
                ";
            $output.="<input type='hidden' name='_method' value='delete'>";
            $output.="</form>
            <form action='#' method='post' id='post-featured-$post->id'> <input type='hidden' name='_token' value='YI2VYABEI57UpAyuZFTKnwlzQT6YD31APaUTFyv3'> <input type='hidden' name='_method' value='patch'></form>";
            $output.="</td></tr>";
            }//end for
            
            return Response($output);
        } //if post
      }//if request->ajax
    }

    public function create()
    {
        $data['categories'] = Category::orderBy('id', 'asc')->get();
        return view('admin.post.create', $data);
    }

    public function store(Request $request)
    {
        $valid = Validator::make(
        $request->all(), 
        [
        'Title'         => 'required|unique:posts,Title',
        'Description'   => 'required',
        'Keyword'       => 'required',
        'Content'       => 'required',
        'categories_id' => 'required|exists:categories,id',
        //'users_id'      => 'required|exists:posts,users_id',
        'Image'         => 'required',
        // 'RelatedPost'   => 'required|numeric|exists:posts,id',
            
        ],
        [
//            Required
            'Title.required'        => 'Vui lòng nhập tiêu đề bài viết',
            'Title.unique'          =>'Bài viết này bị trùng',
            'Description.required'  => 'Vui lòng nhập đoạn trích',
            'Keyword.required'      =>'Vui lòng nhập từ khóa',
            'Content.required'      => 'Vui lòng nhập Nội dung',
            'categories_id.required'=> 'Vui lòng nhập Category ID',
            'categories_id.exists'  => 'Không tồn tại ID Category này',
            
            'Image.required'    => 'Vui lòng chọn hình',
            // 'RelatedPost.required' =>'Vui lòng nhập Id bài liên quan',
            // 'RelatedPost.exists'   => 'Bài liên quan không tồn tại vui lòng xem lại',
            // 'RelatedPost.numeric'   =>'Id Bài liên quan phải là số',
        ]
    );
        
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $post=Post::create([
                'Title' =>$request->input('Title'),
                'Slug'  =>Str::slug($request->input('Title')),
                'Description' =>$request->input('Description'),
                'Content' =>$request->input('Content'),
                'Image' =>$request->input('Image'),
                'On_Off' =>'0',
                'categories_id' =>$request->input('categories_id'),
                'users_id' =>Auth::user()->id,
                'View' =>'0',
            ]);
            return redirect()->route('admin.post.index')->with('message', "Thêm bài viết ".$post->Title." thành công");
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        $categories =Category::orderBy('name', 'asc')->get();
        if ($post !== null) {
            return view('admin.post.show', compact('post','categories'));
        }
        return redirect()->route('admin.post.index')->with('error', 'Không tìm thấy bài viết này này');
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'Title'         => 'required',
            'Description'   => 'required',
            'Content'       => 'required',
            'categories_id' => 'required|exists:categories,id',
            'Slug'          => 'required|unique:posts,Slug,' . $id,      
        ],[
            //Required
            'Title.required'        => 'Vui lòng nhập tiêu đề bài viết',
            'Title.unique'          =>'Bài viết này bị trùng',
            'Description.required'  => 'Vui lòng nhập đoạn trích',
            'Content.required'      => 'Vui lòng nhập Nội dung',
            'categories_id.required' => 'Vui lòng nhập Category ID',
            'categories_id.exists'  => 'Không tồn tại ID Category này',
            'Image.required'        => 'Vui lòng chọn hình',
            
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $post = Post::find($id);
            $post->Title = $request->input('Title');
            $post->Slug = $request->input('Slug');
            $post->Description = $request->input('Description');
            $post->Content = $request->input('Content');
            $post->Image = $request->input('Image');
            $post->categories_id = $request->input('categories_id');
            $post->users_id =Auth::user()->id;
            $post->updated_at=now();

            $post->save();
            return redirect()->route('admin.post.show',$id)->with('message', "Cập nhật bài viết ".$post->id." thành công");
        }
    }

    public function delete($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect()->route('admin.post.index')->with('message', "Xóa bài viết ".$post->Title." thành công");
    }

    public function updateActive($id){
        $post=Post::find($id);
        if($post->On_Off==1){
                $post->On_Off=0;
            $post->save();
            return redirect()->route('admin.post.index')->with('message',"Bài ".$post->id." được Tắt");
        }else{
            $post->On_Off=1;
            $post->save();
            return redirect()->route('admin.post.index')->with('message',"Bài ".$post->id." được Mở");
        }
    }

}
