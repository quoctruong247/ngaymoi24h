@extends('default.layouts.master')
@section('title',$post[0]->Title)
@section('seo')
    <meta property="og:title" content="{{$post[0]->Title}}">
    <meta property="og:type" content="article">
    <meta property="og:image:alt" content="{{$post[0]->Title}}">
    <meta property="og:description" content="{{$post[0]->Description}}">
    <meta property="og:url" content="{{asset($post[0]->Slug)}}.html">
    <meta property="og:site_name" content="{{$post[0]->Title}}">
    <meta property="og:image" content="{{$post[0]->Image}}">
    <meta property="og:image:secure_url" content="{{$post[0]->Image}}">
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="284" />
    <meta property="og:image:height" content="202"/>
    <link rel="canonical" href="{{route('trang-chu')}}/{{$post[0]->Slug}}.html">
@endsection
@section('content')
<div class="container">
	<div class="row mt-1">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{route('trang-chu')}}"><i class="fas fa-home"></i> Trang chủ</a></li>
			    <li class="breadcrumb-item"><a href="{{route('trang-chu')}}/tin-tuc/{{$post[0]->categories->slug}}.html">{{$post[0]->categories->name}}</a></li>
			    <li class="breadcrumb-item active" aria-current="page">{{$post[0]->Title}}</li>
			  </ol>
			</nav>
			<!-- end breadcrum -->

			<!-- nội dung bài viết -->
			<h1 class="post_title">{{$post[0]->Title}}</h1>
            <h6 class="mt-3 mb-3"><b>{{$post[0]->users->name}}</b> | <span>{{$post[0]->created_at}}</span></h6>
            <b><?=$post[0]['Description']?> </b>   
			<?=$post[0]['Content']?>	
           
            <!--tin tức liên quan -->
            <?php 
            	use App\Http\Controllers\HomeController;
            	$categories_more = HomeController::getCategory($post[0]->categories->id);
               
             ?>
            @if(count($categories_more)>0)
            
        	<div class="row mt-4">
        	    <p class="col-md-12 col-sm-12 col-12 pl-1 style_line_tinlienquan title_tintuclienquan">BÀI VIẾT CÙNG CHỦ ĐỀ
        	    </p>
        	</div>

        	<div class="row mt-1" style="background: #d4dadd;">
               @foreach ($categories_more as $key) 
               <div class="col-md-6 col-sm-6 col-12 title_thongtinbaiviet">
            		<a href="{{route('trang-chu')}}/{{$key->Slug}}.html">
            		    <div class="row">
                            <div class="col-md-4 col-sm-4 col-4 mt-1"><img src="{{$key->Image}}" alt="" width="100%"></div>
            		        <div class="col-md-8 col-sm-8 col-8 mt-1 text-left pl-3 title_thongtintieude">
            		            {{$key->Title}}
            		        </div>
            		    </div>
            		</a>
            	</div>
                @endforeach        
        	</div>

            <!-- @endif -->
            <!--end tin tức liên quan-->

        <!-- kết thúc nội dung bài viết -->
		</div><!-- col-md-9 -->
		<div class="col-md-3">
			@include('default.layouts.right')
		</div><!-- col-md-3 -->
	</div>
</div>

@endsection<!-- end section pc -->