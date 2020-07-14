@extends('admin.master')
@section('title','Danh sách Banner')
@section('content')

@if(Auth::user()->active==1)


<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a href="{{ route('admin.giaodien.create') }}" class="btn btn-primary">Tạo Giao Diện</a>
            </div>
            <br>
            <div class="panel panel-default">
                
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
                                <th>Nội dung</th>
                                <th>User</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th width="150">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>

@forelse($giaodiens as $giaodien)

<tr>
    <td>{{ $giaodien->id }}</td>
    <td>{{ $giaodien->name }}</td>
    <td>{{ $giaodien->content }}</td>
    <td>{{ $giaodien->users->name }}</td>
    <td>
        @if($giaodien->on_off==1)
        <a href="{{route('admin.giaodien.active',['id'=>$giaodien->id])}}"><img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on"></a>
        @else
        <a href="{{route('admin.giaodien.active',['id'=>$giaodien->id])}}"><img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="on"></a>
        @endif
    </td>
    <td>{{ $giaodien->created_at}}</td>
    <td>{{ $giaodien->updated_at }}</td>
    <td>
        <a href="{{ route('admin.giaodien.show', ['id' => $giaodien->id]) }}"
           class="btn btn-primary">Sửa</a>
        <a href="{{ route('admin.giaodien.delete', ['id' => $giaodien->id]) }}"
           class="btn btn-danger"
           onclick="event.preventDefault();
                   window.confirm('Bạn đã chắc chắn xóa Id={{ $giaodien->id }} chưa?') ?
                   document.getElementById('giaodien-delete-{{ $giaodien->id }}').submit():
                   0;">Xóa</a>
        <form action="{{ route('admin.giaodien.delete', ['id' => $giaodien->id]) }}"
              method="post" id="giaodien-delete-{{ $giaodien->id }}">
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
                            {{ $giaodiens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection