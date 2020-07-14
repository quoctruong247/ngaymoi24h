@extends('admin.master')
@section('title','Trang cập nhật Danh Mục')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-weight-bold text-muted text-center">CẬP NHẬT DANH MỤC</div>
                    
                    <div class="panel-body">
                        <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên chuyên mục"
                                       value="{{ $category->name }}">
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                <label for="location">Tên danh mục</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Vị trí"
                                       value="{{ $category->location }}">
                                <span class="help-block">{{ $errors->first('location') }}</span>
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection