@extends('admin.master')
@section('title','Cập nhật Khách hàng')
@section('content')
@if(Auth::user()->active==1)
<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12 text-right"><a href="{{route('admin.customer.index')}}" alt="close"><i class="fas fa-times-circle "></i></a>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">CẬP NHẬT KHÁCH HÀNG</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.customer.update', ['id' => $customer->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">Ghi chú</label>
                            <input type="text" class="form-control"  name="note" placeholder="nội dung cần ghi lại" value="{{ $customer->note }}" required="">
                            <span class="help-block">{{ $errors->first('note') }}</span>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-success">Ghi yêu cầu Khách hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
