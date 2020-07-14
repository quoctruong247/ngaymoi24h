@extends('admin.master')
@section('title','Danh sách video')
@section('content')

    <div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a href="{{ route('admin.video.create') }}" class="btn btn-primary">Tạo video</a>
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
                                    <th>Name</th>
                                    <th>Liên kết</th>
                                    <th>Hình</th>
                                    <th>User</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th width="150">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->link }}</td>
                                    <td><img src="{{ $video->image }}" alt="" width="100%">
                                    </td>
                                    <td>{{ $video->users->name}}</td>
                                    <td>
                                        @if($video->on_off==1)
                                        <a href="{{route('admin.video.active',['id'=>$video->id])}}"><img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on">
                                        </a>
                                        @else
                                        <a href="{{route('admin.video.active',['id'=>$video->id])}}"><img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="on">
                                        </a>
                                        @endif
                                    </td>
                                    <td>{{ $video->created_at}}</td>
                                    <td>{{ $video->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.video.show', ['id' => $video->id]) }}" class="btn btn-primary">Sửa</a>
                                        <a href="{{ route('admin.video.delete', ['id' => $video->id]) }}" class="btn btn-danger" onclick="event.preventDefault();
                   window.confirm('Bạn đã chắc chắn xóa Id={{ $video->id }} chưa?') ?
                   document.getElementById('video-delete-{{ $video->id }}').submit():
                   0;">Xóa</a>
                                        <form action="{{ route('admin.video.delete', ['id' => $video->id]) }}" method="post" id="video-delete-{{ $video->id }}">
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
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection