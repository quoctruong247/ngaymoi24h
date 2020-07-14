@extends('admin.master')
@section('title','Danh sách người dùng')
@section('content')

<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12">
            <div class="pannel pannel-default">
                <div class="pannel-heading">
                    <h3 class="text-center mt-3 text-muted">DANH SÁCH NGƯỜI DÙNG</h3>
                    <a href="{{route('admin.user.create')}}" class="btn btn-primary mb-3">Tạo Người Dùng</a>
                </div>
                @if(session('trangthai'))
                <div class="alert alert-success">
                    {{session('trangthai')}}
                </div>
                @endif @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>

                @endif

                <div class="pannel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">stt</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Địa chỉ E-mail</th>
                                    <th scope="col">Cấp độ dùng</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Ngày cập nhật</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Xem</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($users as $key)
                                <tr>
                                    <td>{{$key->id}}</td>
                                    <td>{{$key->name}}</td>
                                    <td>{{$key->email}}</td>
                                    <td>{{$key->levels->name}}</td>
                                    <td>{{$key->created_at}}</td>
                                    <td>{{$key->updated_at}}</td>
                                    <td>
                                        <a href="{{route('admin.user.active',['id'=>$key->id])}}">
                                            @if($key->active==1)
                                                <img src="{{asset('public/admin/images/pc/icon_on.png')}}" alt="on">
                                            @else
                                                 <img src="{{asset('public/admin/images/pc/icon_off.png')}}" alt="off">
                                            @endif
                                        </a>
                                    </td>
                                    <!-- xem -->
                                    <td><a href="#"><i class="far fa-eye"></i></a>
                                    </td>
                                    <!-- sửa -->
                                    <td><a href="{{route('admin.user.show',['id'=>$key->id])}}" class="btn btn primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <!-- xóa -->
                                    <td>
                                        <a href="{{route('admin.user.delete',['id'=>$key->id])}}" class="btn btn danger" onclick="event.preventDefault();document.getElementById('user-delete-{{$key->id}}').submit();"><i class="far fa-trash-alt"></i></a>
                                        <form action="{{route('admin.user.delete',['id'=>$key->id])}}" method="post" id="user-delete-{{$key->id}}">
                                            {{csrf_field()}} {{method_field('delete')}}
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Không có dữ liệu</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">{{$users->links()}}</div>
    </div>
</div>

@endsection
@section('')
<script type="text/javascript">
    $('.').onclick('submit',function(e){
        e.preventDefault();
        var data=$(this).serialize();
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var mobile = $('.input_phone_comment').val();
        if(mobile !==''){
            if (vnf_regex.test(mobile) == false || mobile.length < 10 || mobile.length >10) 
            {
                alert('Số điện thoại không hợp lệ !');
            }
            else
            {
                var url="{{URL::to('/home/status')}}";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        $('#myModal_dangky_comment').modal('hide'); 
                        content_comment.value='';
                        $('#notify_comment_succces').css('display','block');
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            }
        }
    }); 
</script>
@endsection