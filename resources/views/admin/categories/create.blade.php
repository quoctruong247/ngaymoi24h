@extends('admin.master')
@section('title','Trang tạo Danh mục')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading font-weight-bold text-muted text-center">THÊM DANH MỤC MỚI</div>
                    <div class="panel-body">
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Tên chuyên mục</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên chuyên mục"
                                       value="{{ old('name') }}">
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                            <button type="submit" class="btn btn-success">Tạo chuyên mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection