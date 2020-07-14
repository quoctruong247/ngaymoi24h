@extends('admin.master')
@section('title','Tạo người dùng')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12 text-right"><a href="{{route('admin.user.index')}}"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                   <h3 class="text-center mt-3 text-muted">THÊM NGƯỜI DÙNG</h3> 
                    <div class="panel-body">
                        <form action="{{ route('admin.user.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên"
                                       value="{{ old('name') }}">
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Địa chỉ Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Địa chỉ Email"
                                       value="{{ old('email') }}">
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('levels_id') ? 'has-error' : '' }}">
                                <label for="email">Cấp độ sử dụng</label>
                                <select name="levels_id" id="levels_id" class="form-control">
                                    <option value="0">Quản trị toàn hệ thống</option>
                                    <option value="1">Ban Giám Đốc</option>
                                    <option value="2">Cấp trưởng phòng</option>
                                    <option value="3">NV Tư Vấn</option>
                                    <option value="4">NV Biên Tập</option>
                                    <option value="5">NV Thiết Kế</option>
                                    <option value="6" selected>NV Cộng Tác</option>
                                </select>
                                <span class="help-block">{{ $errors->first('level') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Mật khẩu">
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation" placeholder="Xác nhận mật khẩu">
                            </div>
                            <button type="submit" class="btn btn-success">Tạo người dùng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection