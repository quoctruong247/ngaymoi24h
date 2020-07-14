<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Customer;
use App\Slider;
use App\Video;
use App\Advertisement;
use App\Advertisement1;
use App\Giaodien;
use DOMDocument;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $advertisements=Advertisement::where('on_off','1')->orderBy('categories_id','asc')->get();
        //footer
        $giaodiens=Giaodien::orderBy('created_at','desc')->get();
        //menu
        $categories=Category::orderBy('location','asc')->get();
        //banner bên phải
        $ad_rights=Advertisement1::where('on_off','1')->orderBy('created_at','desc')->get();


        view()->share(['advertisements'=>$advertisements,'categories'=>$categories,'giaodiens'=>$giaodiens,'ad_rights'=>$ad_rights]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    // hiện thị trang chủ
    public function index()
    {
        $videos=Video::where('on_off','1')->orderBy('created_at','desc')->get();

        $posts=Post::where('On_Off','1')->orderBy('updated_at','desc')->get();
 
        return view('default.pages.index',compact('posts','videos'));
    }

    // hiện thị bài viết
    public function viewPost($slug)
    {   
        $post = Post::where([
            ['Slug','=',substr($slug,0,strlen($slug)-5)],
            ['On_Off','=','1'],
            ])->get();
       
        if (count($post) > 0) {
            return view('default.pages.baiviet', compact('post'));
        }
        else{
            return redirect()->route('trang-chu');
        }
        
    }

    // hiện thị bài viết
    public function viewPostAdmin($slug)
    {
        
        $post = Post::where([
            ['slug','=',$slug],
            ])->get();
       
        if (count($post) > 0) {
            return view('default.home.baiviet', compact('post'));
        }
        else
        {
            return redirect()->route('trang-chu');
        }
        
    }
     // truy vấn danh mục
    public static function getCategory($idCate)
    {
        return  Post::where([
            ['categories_id','=',$idCate],
            ['On_Off','=',1],
        ])->orderBy('updated_at','desc')->paginate(6);
    }
   
    // // hiện thị danh mục
    public function viewCategory($slug)
    {
        $cate=Category::where('slug',substr($slug,0,strlen($slug)-5))->get();

        $cate_posts= Post::where([
            ['categories_id',$cate[0]->id],
            ['On_Off',1],
        ])->orderBy('created_at','desc')->paginate(20);

        return view('default.pages.danhmuc', compact('cate_posts','cate'));
    }
    
    public function video($id){
        $video=Video::find($id);
        return response()->json(['video'=>$video,'result'=>'thành công']);
    }

    public function createXML(){
        $posts=Post::where('On_Off','1')->get();
        $xmldoc = new DOMDocument(); 
        $xmldoc->formatOutput = true;   
        $root = $xmldoc->createElement("urlset");
        $xmldoc->appendChild( $root );

        $sitemap = $xmldoc->createElement( "url" );
              $loc = $xmldoc->createElement("loc");
              $loc->appendChild(
                   $xmldoc->createTextNode('https://ngaymoi24h.vn/')
              );
              $sitemap->appendChild($loc);
              //lastmod
              $lastmod = $xmldoc->createElement("lastmod");
              $lastmod->appendChild(
                   $xmldoc->createTextNode(Carbon::now())
              );
              $sitemap->appendChild($lastmod);
              //lastmod
              $priority = $xmldoc->createElement("priority");
              $priority->appendChild(
                   $xmldoc->createTextNode('1.00')
              );
              $sitemap->appendChild($priority);

            $root->appendChild($sitemap);
        foreach ($posts as $key => $value) {
            $sitemap = $xmldoc->createElement( "url" );
              $loc = $xmldoc->createElement("loc");
              $loc->appendChild(
                   $xmldoc->createTextNode('https://ngaymoi24h.vn/'.$value->Slug.'.html')
              );
              $sitemap->appendChild($loc);
              //lastmod
              $lastmod = $xmldoc->createElement("lastmod");
              $lastmod->appendChild(
                   $xmldoc->createTextNode($value->updated_at)
              );
              $sitemap->appendChild($lastmod);
              //lastmod
              $priority = $xmldoc->createElement("priority");
              $priority->appendChild(
                   $xmldoc->createTextNode('0.80')
              );
              $sitemap->appendChild($priority);

            $root->appendChild($sitemap);
        }
         
        $xmldoc->save("sitemap.xml");
        return 'Bạn đã tạo thành công sitemap';
    }

}