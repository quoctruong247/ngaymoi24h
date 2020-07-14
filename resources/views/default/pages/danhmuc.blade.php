@extends('default.layouts.master')
@section('title',$cate_posts[0]->categories->name)
@section('seo')
   <meta property="og:title" content="{{$cate_posts[0]->categories->name}}">
    <meta property="og:type" content="article">
    <meta property="og:description" content="{{$cate_posts[0]->categories->name}}">
    <meta property="og:site_name" content="{{$cate_posts[0]->categories->name}}">
    <link rel="canonical" href="{{route('trang-chu')}}/tin-tuc/{{$cate_posts[0]->categories->slug}}.html">
@endsection

@section('content')
<div class="container">
	<div class="row mt-1">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{route('trang-chu')}}"><i class="fas fa-home"></i> Trang chủ</a></li>
			    <li class="breadcrumb-item">{{$cate_posts[0]->categories->name}}</li>
			  </ol>
			</nav><!-- end breadcrum -->
        <!-- bài viết theo chuyên mục -->
        @foreach($cate_posts as $post)
        <div class="row mb-3">
            <div class="col-md-4 col-4">
               <img src="{{$post->Image}}" alt="" width="100%" class="rounded"> 
            </div>
            <div class="col-md-8 col-8 ">
               <h6>{{$post->Title}}</h6>
               <div class="text-muted text-justify d-lg-block d-sm-none d-xs-none d-none">
                <?=$post['Description']?></div>
               <a href="{{route('trang-chu')}}/{{$post->Slug}}.html">
               <span class="btn btn-primary btn-sm">xem tiếp <i class="far fa-arrow-alt-circle-right"></i></span></a>
            </div>
        </div>
        @endforeach
        
        <!-- kết thúc bài viết theo chuyên mục -->
    	</div><!-- col-md-9 -->
      <div class="clear"></div>
      <div class="col-md-3">
        @include('default.layouts.right')
      </div><!-- col-md-3 -->
    	
	</div><!-- end row chính -->
</div><!-- end container chính -->
<!-- end pc -->
@endsection

