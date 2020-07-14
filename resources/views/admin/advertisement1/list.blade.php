@extends('admin.master')
@section('title','Danh sách Banner Phải')
@section('content')

@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="{{ route('admin.advertisement1.create') }}" class="btn btn-primary">Tạo Banner</a>
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
                                    <th>Hình</th>
                                    <th>Link</th>
                                    <th>User</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th width="150">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($advertisement1s as $advertisement1)
                                    <tr>
                                        <td>{{ $advertisement1->id }}</td>
                                        <td>{{ $advertisement1->name }}</td>
                                        <td><img src="{{ $advertisement1->image }}" alt="hình" width="100%"></td>
                                        <td>{{ $advertisement1->link }}</td>
                                        <td>{{ $advertisement1->users->name }}</td>
                                        
                                        <td>
                                            @if($advertisement1->on_off==1)
                                            <a href="{{route('admin.advertisement1.active',['id'=>$advertisement1->id])}}"><img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on"></a>
                                            @else
                                            <a href="{{route('admin.advertisement1.active',['id'=>$advertisement1->id])}}"><img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="off"></a>
                                            @endif
                                        </td>

                                        <td>{{ $advertisement1->created_at}}</td>
                                        <td>{{ $advertisement1->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.advertisement1.show', ['id' => $advertisement1->id]) }}"
                                               class="btn btn-primary">Sửa</a>
                                            <a href="{{ route('admin.advertisement1.delete', ['id' => $advertisement1->id]) }}"
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                       window.confirm('Bạn đã chắc chắn xóa Id={{ $advertisement1->id }} chưa?') ?
                                                       document.getElementById('advertisement1-delete-{{ $advertisement1->id }}').submit():
                                                       0;">Xóa</a>
                                            <form action="{{ route('admin.advertisement1.delete', ['id' => $advertisement1->id]) }}"
                                                  method="post" id="advertisement1-delete-{{ $advertisement1->id }}">
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
                            {{ $advertisement1s->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection