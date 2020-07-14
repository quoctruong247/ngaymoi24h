@extends('admin.master')
@section('title','Danh sách Banner')
@section('content')

@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a href="{{ route('admin.advertisement.create') }}" class="btn btn-primary">Tạo Banner</a>
            </div>
            <br>
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif @if (session('error'))
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
                                    <th>Hình</th>
                                    <th>Link</th>
                                    <th>User</th>
                                    <th>Chuyên mục</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th width="150">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($advertisements as $advertisement)
                                <tr>
                                    <td>{{ $advertisement->id }}</td>
                                    <td>{{ $advertisement->name }}</td>
                                    <td><img src="{{ $advertisement->image }}" alt="hình" width="100%">
                                    </td>
                                    <td>{{ $advertisement->link }}</td>
                                    <td>{{ $advertisement->users->name }}</td>
                                    <td>
                                    @if($advertisement->categories_id==0) Banner Top
                                    @elseif($advertisement->categories_id==-1) Banner Trái
                                    @elseif($advertisement->categories_id==-2) Banner Phải
                                    @else {{ $advertisement->categories->name }} 
                                    @endif
                                    </td>
                                    <td>
                                        @if($advertisement->on_off==1)
                                        <a href="{{route('admin.advertisement.active',['id'=>$advertisement->id])}}"><img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on">
                                        </a>
                                        @else
                                        <a href="{{route('admin.advertisement.active',['id'=>$advertisement->id])}}"><img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="off">
                                        </a>
                                        @endif
                                    </td>

                                    <td>{{ $advertisement->created_at}}</td>
                                    <td>{{ $advertisement->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.advertisement.show', ['id' => $advertisement->id]) }}" class="btn btn-primary">Sửa</a>
                                        <a href="{{ route('admin.advertisement.delete', ['id' => $advertisement->id]) }}" class="btn btn-danger" onclick="event.preventDefault();
                   window.confirm('Bạn đã chắc chắn xóa Id={{ $advertisement->id }} chưa?') ?
                   document.getElementById('advertisement-delete-{{ $advertisement->id }}').submit():
                   0;">Xóa</a>
                                        <form action="{{ route('admin.advertisement.delete', ['id' => $advertisement->id]) }}" method="post" id="advertisement-delete-{{ $advertisement->id }}">
                                            {{ csrf_field() }} {{ method_field('delete') }}
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
                        {{ $advertisements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
@endsection