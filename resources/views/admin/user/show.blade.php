@extends('admin.master')
@section('title','Cập nhật người dùng')
@section('content')
@if(Auth::user()->active==1)

    <div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12 text-right"><a href="{{route('admin.user.index')}}"><i class="fas fa-times-circle "></i></a>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">CẬP NHẬT NGƯỜI DÙNG</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.user.update', ['id' => $users->id]) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('put') }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Họ tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên" value="{{ $users->name }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Địa chỉ Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ Email" value="{{ $users->email }}">
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ $users->password }}">
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('levels_id') ? 'has-error' : '' }}">
                            <label for="email">Cấp độ sử dụng</label>
                            <select name="levels_id" id="levels_id" class="form-control">
                                @foreach($levels as $level) @if($users->levels_id==$level->id)
                                <option value="{{$level->id}}" selected>{{$level->name}}</option>
                                @else
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endif @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password">Mật khẩu</label>
    <input type="password" class="form-control" id="password" name="password"
           placeholder="Mật khẩu">
    <span class="help-block">{{ $errors->first('password') }}</span>
</div>
<div class="form-group">
    <label for="password_confirmation">Xác nhận mật khẩu</label>
    <input type="password" class="form-control" id="password_confirmation"
           name="password_confirmation" placeholder="Xác nhận mật khẩu">
</div> -->
                        <button type="submit" class="btn btn-success">Cập nhật người dùng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
@endsection