@extends('admin.master')
@section('title','Trang danh sách bài viết')
@section('content')
@if(Auth::user()->active==1)

<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">DANH SÁCH BÀI VIẾT</h3>
                <div class="col-md-12 text-right"><a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">Tạo bài viết</a></div>
                
                <div class="panel-body">
                    <label for="search"><i class="fas fa-keyboard text-muted"></i> Tìm kiếm bài viết nhanh</label>
                    <input type="text" class="form-control mb-2" placeholder="Tìm nhanh bài viết ..." name="search" id="search">
                </div>
               
                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {!! session('message') !!}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Người dùng</th>
                        <th>Ngày viết</th>
                        <th>Cập nhật</th>
                        <th>Trạng thái</th>
                       
                        <th style="min-width: 160px;text-align: center;">Chức năng</th>
                    </tr>
                    </thead>

                    <tbody>
                    
@forelse($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->Title }}</td>
        <td>
            <strong class="text-muted">
            @if(isset($post->categories->name))
                {{ $post->categories->name }}
            @endif
            </strong>
        </td>
       
        <td width="100">
            @if (!empty($post->Image) && public_path($post->Image))
            <img src="{{$post->Image}}" alt="Image" class="img-responsive img-thumbnail" width="100%">
            @else
            <img src="{{ asset('public/admin/images/pc/no-image.jpg') }}" alt="No Image" class="img-responsive img-thumbnail" width="100%">
            @endif
            </td>
            <td>
                @if(isset($post->users->name))
                    {{$post->users->name}}
                @endif
            </td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
           

<td>
<a href="{{route('admin.post.active',['id'=>$post->id])}}">
@if($post->On_Off==1) 
    <img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on">
@else
    <img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="off">
@endif
</a>
</td>

<td>
<a href="{{ route('view.post',['slug' => $post->Slug]) }}.html" class="btn btn-success" target="_blank"> <i class="fab fa-edge"></i></a>
<a href="{{route('admin.post.show',['id' => $post->id])}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
@if(Auth::user()->levels_id!=5)
    <a href="{{ route('admin.post.delete', ['id' => $post->id]) }}" class="btn btn-danger" onclick="event.preventDefault();window.confirm('Bạn đã chắc chắn xóa chưa?') ?document.getElementById('post-delete-{{ $post->id }}').submit() :0;"><i class="far fa-trash-alt"></i>
    </a>

    <form action="{{ route('admin.post.delete', ['id' => $post->id]) }}" method="post" id="post-delete-{{ $post->id }}">{{ csrf_field() }}{{ method_field('delete') }}</form>
    <form action="" method="post" id="post-featured-{{ $post->id }}"> {{ csrf_field() }} {{ method_field('patch') }} </form>
@endif
</td>
</tr>
@empty
                    <tbody>
                        <tr>
                            <td colspan="8">Không có dữ liệu nào</td>
                        </tr>
                    </tbody>
                    @endforelse
                    </tbody>

                </div>
                    <!-- kết thúc nội dung bảng -->
                </table>
            </div>
           
           <div class="text-center">
            {{ $posts->links() }}
           </div> 
          
        </div>
    </div>
</div>
   
    @endif <!-- chứng thực user -->
@endsection

@section('bottom_script')
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value = $('#search').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/post/search') }}',
            data: {
                'search': $value
            },
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection