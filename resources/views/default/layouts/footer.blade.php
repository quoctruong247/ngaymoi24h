<div class="container-fluid mt-3" style="background-color: #438ee9;">

   <div class="container">
   	<div class="row pt-4">
   		<div class="col-md-4 text-center"><img src="{{asset('public/default/images/pc/bottom_logo.png')}}" alt=""></div>
         @foreach($giaodiens as $giaodien)
   		<div class="col-md-4" style="color: white;font-size: 14px;"><?=$giaodien->content?></div>
   		@endforeach
   	</div>
   </div>
    
</div>
<!--end footer pc-->
