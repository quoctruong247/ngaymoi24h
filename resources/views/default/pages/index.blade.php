@extends('default.layouts.master')
@section('title','Trang tin tức ngày mới 24h')
@section('seo')
	<meta property="og:title" content="Ngày mới 24h">
    <meta property="og:type" content="article">
    <meta property="og:description" content="trang tin nhanh, tin nóng, tin hot, người Việt xem nhiều nhất, tin doanh nghiệp">
    <meta property="og:url" content="{{asset('public/default/images/pc/logo.jpg')}}">
    <meta property="og:site_name" content="Ngày mới 24h">
    <meta property="og:image" content="{{asset('public/default/images/pc/logo.jpg')}}">
    <meta property="og:image:secure_url" content="{{asset('public/default/images/pc/logo.jpg')}}">
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="284" />
    <meta property="og:image:height" content="202"/>
    <link rel="canonical" href="{{route('trang-chu')}}">
@endsection
<!-- -------------phần pc------------------------>
@section('content')

<!-- tin mới -->
<div class="container mt-2">
	<!-- banner top -->
	<div class="row">
		<div class="col-12 d-lg-none d-md-block d-xs-block d-sm-block d-block mb-2"><img src="{{asset($advertisements[2]->image)}}" alt="" class="rounded shadow p-1 mt-2 w-100"></div>
	</div>
	<!-- kết thúc banner top -->
	<div class="row">
		<div class="col-md-4">
			<h6 class="line_cate">TIN MỚI CẬP NHẬT</h6>

			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<div class="carousel-item active">
			    	<a href="{{$posts[0]->Slug}}.html">
				      	<img src="<?=$posts[0]['Image']?>" class="d-block w-100" alt="...">
				      	<p class="mt-2 common-title"><b><?=$posts[0]['Title']?></b></p>
						<p>{!! \Illuminate\Support\Str::words($posts[0]['Description'], 31,'....')  !!}</p>
					</a>
			    </div>
			  	@for($i=1;$i<6;$i++)
			    <div class="carousel-item">
			    	<a href="{{route('trang-chu')}}/{{$posts[$i]->Slug}}.html">
				      	<img src="<?=$posts[$i]['Image']?>" class="d-block w-100" alt="...">
				      	<p class="mt-2 common-title"><b><?=$posts[$i]['Title']?></b></p>
						<p>{!! \Illuminate\Support\Str::words($posts[$i]['Description'], 31,'....')  !!}</p>
					</a>
			    </div>
			    @endfor
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>	

		</div><!-- kết thúc cột 1 -->
		<div class="col-md-4">	
			<div class="container">
				@for($i=7;$i<12;$i++)
				<div class="row rowItem">
					<div class="col-md-5 col-5 pt-1 pb-1">
						<a href="{{route('trang-chu')}}">
						<img src="<?=$posts[$i]['Image']?>" alt="" class="rounded w-100">
						</a>
					</div>
					<div class="col-md-7 col-7">
						<p class="common-title">
							<a href="{{$posts[$i]->Slug}}.html">
							{!! \Illuminate\Support\Str::words($posts[$i]->Title, 10,'....')  !!}</a>
						</p>
						
					</div>
				</div>
				@endfor
			</div>
		</div><!-- kết thúc cột 2 -->
		<div class="col-md-4">
			<div id="video">
  				<iframe width="100%" height="200" src="//www.youtube.com/embed/{{$videos[0]->link}}?autoplay=1&mute=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>

			</div>
			<style>
				.carousel-indicators{
					bottom: -42px!important;
				}
				.carousel-indicators li{
					width: 10px!important;
					height: 5px!important;
					background-color: #00BCD4!important;
				}
			</style>
			<div class="video">	
	  			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				<div class="carousel-inner">
					@php 
						$i=0;
					@endphp
					
		  			<div class="carousel-item active">
						<div class="row">
							@forelse($videos as $video)
							<div class="col-md-4 col-4 ">
								<div class="videoItem" data-id="{{$video->link}}" style="cursor: pointer;">
								<img src="{{$video->image}}" class="d-block w-100" >
								</div>
							</div>
							@empty
								Chưa có dữ liệu
							@endforelse
						</div>
				    </div>
				 
	  			</div>
		  		<!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				 <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				 </a> -->
	  		</div> 
				  
			</div>
		</div><!-- kết thúc cột 3 -->
	</div>
</div>  
<!-- kết thúc tin mới -->

<!-- banner quảng cáo -->
<div class="container mt-4 mb-2">
	<div class="row">
		<div class="col-md-6">
			<a href="{{asset($advertisements[1]->link)}}"><img src="{{asset($advertisements[1]->image)}}" class="d-block w-100 rounded shadow-sm p-1 mt-2" alt="..."></a>
		</div>
		<div class="col-md-6">
			<a href="{{asset($advertisements[1]->link)}}"><img src="{{asset($advertisements[0]->image)}}" class="d-block w-100 rounded shadow-sm p-1 mt-2" alt="..." ></a>
		</div>
	</div>
</div>
<!-- kết thúc banner quảng cáo -->

<!-- danh mục tin tức -->
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php $j=0; ?>
			@foreach($categories as $cate)
			<!-- tiêu đề -->
				<h6 class="line_cate mt-2">{{$cate->name}}</h6>
					<div class="row">
					<?php $i=0; $j++;?>
					@foreach($posts as $post)	

						@if($cate->id==$post->categories_id)
							<?php $i++; ?>
							@if($i==1)

							<div class="col-md-6">
								<a href="<?=$post['Slug']?>.html">
									<img src="<?=$post['Image']?>" alt="" width="100%">
									<h5 class="mt-2"><?=$post['Title']?></h5>
									<p>{!! \Illuminate\Support\Str::words($post['Description'], 31,'....')  !!}</p>
								</a>
							</div>
							<div class="col-md-6">
							@elseif($i<6)
							
								<div class="container">
									<div class="row rowItem">
										<div class="col-md-5 col-5 pt-1 pb-1">
											<a href="{{$post->Slug}}.html">
											<img src="{{$post->Image}}" alt="" class="rounded w-100">
											</a>
										</div>
										<div class="col-md-7 col-7">
											<a href="{{$post->Slug}}.html">
											<p>{!! \Illuminate\Support\Str::words($post->Title, 8,'..')  !!}</p>
											</a>
										</div>
									</div>
								</div>
							@endif
								
						@endif

					@endforeach
						</div>
					</div>
					<a href="{{asset($advertisements[$j]->link)}}"><img src="{{$advertisements[$j]->image}}" alt="" class="w-100"></a>
				
			@endforeach
		</div> <!-- end col-md-8 -->

		<!-- phần bên phải -->
		<div class="col-md-4 ">@include('default.layouts.right')</div> 
		<!-- kết thúc phần bên phải -->
	</div>
</div>

<!-- kết thúc danh mục tin tức -->
@endsection
