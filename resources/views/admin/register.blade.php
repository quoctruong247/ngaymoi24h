@extends('admin.master')
@section('title','Trang Đăng Ký Người Dùng')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center display-4 text-muted">Bạn đã đăng ký thành công</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="text-center text-muted">Vui lòng liên hệ người quản trị hệ thống để ấn định các chức năng cho mình. <br>Cảm ơn !
</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
