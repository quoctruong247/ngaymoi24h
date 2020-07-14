@extends('admin.master')
@section('title','Trang Danh mục')
@section('content')
@if(Auth::user()->active==1)

    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <h3 class="text-center mt-3 text-muted">DANH SÁCH DANH MỤC</h3> 
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Tạo danh mục</a>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Vị trí</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->location }}</td>
                                        <td>
                                            @if($category->on_off==1)
        <a href="{{route('admin.category.active',['id'=>$category->id])}}"><img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on"></a>
        @else
        <a href="{{route('admin.category.active',['id'=>$category->id])}}"><img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="off"></a>
        @endif
                                        </td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.show', ['id' => $category->id]) }}"
                                               class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                        window.confirm('Bạn đã chắc chắn xóa chưa?') ?
                                                       document.getElementById('category-delete-{{ $category->id }}').submit() :
                                                       0;"><i class="far fa-trash-alt"></i></a>
                                            <form action="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                                                  method="post" id="category-delete-{{ $category->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No data</td>
                                    </tr>
                                @endforelse


                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection