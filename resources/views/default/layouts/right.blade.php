<div class="content_right sticky-top rounded shadow-sm">
	
	<div class="uudaiTitle">DOANH NGHIỆP QUẢNG CÁO</div>
	<!-- tin sale -->
    @foreach($ad_rights as $advertisement)
	       <a href="{{$advertisement->link}}"><img src="{{asset($advertisement->image)}}" alt="" width="100%" class="mb-2"></a>
    @endforeach        
	<!-- kết thúc tin sale -->
	<!-- chăm sóc khách hàng -->
	<div class="chamsockhachhang mt-1">ĐƠN VỊ CHỦ QUẢN</div>
    	<div class="row mt-3">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3 text-right">
                        <img src="{{asset('public/default/images/pc/r_3.png')}}" width="80%">
                    </div>
                    <div class="col-md-8 col-sm-8 col-8">
                        <h6 id="noidung_tren">Liên hệ tư vấn</h6>
                        <div id="noidung_duoi">0913.797.099</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12 mt-3">
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-3 col-3 text-right">
                        <img src="{{asset('public/default/images/pc/r_2.png')}}" width="80%">
                    </div>
                    <div class="col-md-8 col-sm-8 col-8">
                        <h6 id="noidung_tren">Thời gian làm việc</h6>
                        <div id="noidung_duoi">8:00AM - 18:00 PM</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12">
                <div class="row mt-2">
                    <div class="col-md-3 col-sm-3 col-3 text-right">
                        <img src="{{asset('public/default/images/pc/r_1.png')}}" width="80%">
                    </div>
                    <div class="col-md-8 col-sm-8 col-8 mt-2">
                        <h6><a href="#" target="_blank" rel="nofollow">Xem bản đồ</a></h6>
                    </div>
                </div>
            </div>
        </div>
	<!-- kết thúc chăm sóc khách hàng -->
</div>

  