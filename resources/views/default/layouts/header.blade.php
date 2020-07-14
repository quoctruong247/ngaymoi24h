<div class='thetop'></div><!-- scroll top -->
<!-- phần hiện thị top pc -->
<div class="container d-lg-block d-md-none d-xs-none d-sm-none d-none">
	<div class="row top">
		<div class="col-md-3 text-center">
			<a href="{{route('trang-chu')}}">
			<img src="{{asset('public/default/images/pc/top_logo.png')}}" alt="Ngày mới 24h">
			</a>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-7 d-lg-block d-md-none d-xs-none d-sm-none d-none"><a href="{{asset($advertisements[2]->link)}}"><img src="{{asset($advertisements[2]->image)}}" alt="" width="100%" class="rounded shadow-sm p-1 mt-2"></a></div>
	</div>
</div>
<!-- kết thúc phần hiện thị top trên PC -->
<!-- phần hiện thị menu trên pc -->
<style>
  .bg-light {
    background-color: #438ee9!important;
    color: white;
   
  }
  .nav-link {
    display: block;
    padding: .5rem 1rem;
    color: white!important;
    padding-left: 10px!important;
    height: 35px;

  }
  .nav-link:hover a{
    background-color: black;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top d-lg-block d-md-none d-xs-none d-sm-none d-none">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{route('trang-chu')}}"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
        @foreach($categories as $cate)
        <a class="nav-item nav-link" href="{{route('trang-chu')}}/tin-tuc/{{$cate->slug}}.html">{{$cate->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
</nav>
<!-- kết thúc phần hiện thị menu trên pc -->

<!-- phần hiện thị menu trên mobile -->
<div class="container d-lg-none d-md-block d-xs-block d-sm-block d-block" style="margin-bottom: 94px;">
	<div id="navbar_mb" class="fixed-top">
	    <div class="container-fluid" id="body_contain" style="padding-left: 0px;padding-right: 0px;">
			<div class="mp-pusher " id="mp-pusher">
		        <nav id="mp-menu" class="mp-menu mp-cover">
		          <div class="mp-level" data-level="1">
		            <div id="tieude_level" class="icon icon-world">NGÀY MỚI 24H VN
		              <a href="#" class="close"><i class="fas fa-times"></i></a>
		            </div>
		            <ul>
		              <li> <a class="icon icon-diamond" href="{{route('trang-chu')}}"><i class="fas fa-home"></i> Trang chủ</a> </li>
		              @foreach($categories as $cate)
		              	<li> <a class="icon" href="{{route('trang-chu')}}/tin-tuc/{{$cate->slug}}.html"><i class="fas fa-angle-right"></i> {{$cate->name}}</a> </li>
		              @endforeach
		            </ul>
		          </div>
		        </nav>
				<!-- phần top trong mobile -->
		        <div class="scroller" style="border-bottom: 1px solid #f7f7f7;">
		          <div class="scroller-inner" id="bg_header_mb">
		            <div class="header bg-white"> 
		              <div class="container-fluid">
		                <div class="row">
		                  <div class="col-2 col-sm-2 col-xs-2 mt-2"> 
		                  	<a href="{{route('trang-chu')}}" id="trigger" class="menu-trigger"> 
		                  	<img alt="Ngày mới 24h VN" id="img_header_left" src="{{asset('public/default/images/mb/header_danhmuc_moi.png')}}" width="100%"/> 
			                </a> 
			              </div>
		                
		                  <div class="col-8 col-sm-8 col-xs-8 mt-2 mb-3 text-center">
		                    <a href="{{route('trang-chu')}}"> <img id="img_logo" alt="Ngày mới 24h VN" src="{{asset('public/default/images/mb/top_logo.png')}}" width="90%" /> </a> 
		                  </div>
		                  <div class="col-2 col-sm-2 col-xs-2 mt-2 pl-0 pr-2 text-right"> <a href="tel:0923409779"> <img id="img_header_right" alt="Ngày mới 24h VN" src="{{asset('public/default/images/mb/phone.png')}}" width="70%" /> </a> </div>
		                </div>
		             
		              </div>
		            </div>
		          </div>
		        </div>
				<!-- kết thúc phần top trong mobile -->
		    </div>
	   </div>
	</div>
</div>

