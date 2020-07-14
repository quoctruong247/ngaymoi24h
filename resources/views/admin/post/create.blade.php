@extends('admin.master')
@section('title','Trang tạo bài viết')

@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12 text-right"><a href="{{route('admin.post.index')}}"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <h3 class="text-center mt-3 text-muted">TẠO BÀI VIẾT</h3>
                    <div class="panel-body">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('categories_id') ? 'has-error' : '' }}">
                                <label for="categories_id"><i class="fas fa-mouse"></i> Danh mục </label>
                                <select name="categories_id" id="categories_id" class="form-control">
                                    <option value="" disabled selected>Chọn danh mục cho bài viết</option>
                                    @forelse($categories as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @empty
                                    <tr>
                                        <td colspan="8">Không có dữ liệu nào</td>
                                    </tr>
                                    @endforelse
                                </select>
                                <span class="help-block">{{$errors->first('categories_id')}}</span>
                            </div>

                            <div class="form-group {{ $errors->has('Title') ? 'has-error' : '' }}">
                                <label for="Title"><i class="fas fa-keyboard"></i> Tiêu đề bài viết</label>
                                <input type="text" class="form-control" id="Title" name="Title" placeholder="Tiêu đề bài viết" value="{{ old('Title') }}">
                                <span class="help-block">{{$errors->first('Title')}}</span>
                            </div>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="Keyword"><i class="fas fa-keyboard"></i> Từ khóa SEO</label>
                                <input type="text" class="form-control" id="Keyword" name="Keyword" placeholder="Keyword"
                                       value="{{ old('Keyword') }}">
                                <span class="help-block">{{$errors->first('Keyword')}}</span>
                            </div>
                            <div class="form-group {{ $errors->has('Description') ? 'has-error' : '' }}">
                                <label for="Description"> <i class="fas fa-keyboard"></i> Đoạn trích ngắn</label>
    <textarea class="form-control" id="Description" name="Description" placeholder="Đoạn trích ngắn">{{old('Description')}}</textarea>
                               
                                <span class="help-block">{{$errors->first('Description')}}</span>
                            </div>

                            <div class="form-group {{ $errors->has('Content') ? 'has-error' : '' }}">
                                <label for="Content"><i class="fas fa-keyboard"></i> Nội dung bài viết</label>
                                <textarea class="form-control ckeditor" id="Content" name="Content" placeholder="Nội dung" style="overflow:auto" >{{old('Content')}}</textarea>
                               
                                <span class="help-block">{{$errors->first('Content')}}</span>
                            </div>
                            
                            <div class="form-group {{$errors->has('Image')?'has-error' : '' }}">
                                <label for="Image"><i class="fas fa-mouse"></i> Hình</label>
                                <input type="text"  class="form-control text-right" id="input" name="Image" placeholder="| Browser" value="{{ old('Image') }}" readonly >
                                <span class="help-block">{{$errors->first('Image')}}</span>
                            </div>
                            
                             <button type="submit" class="btn btn-success my-5">Tạo bài viết</button>

                    </form>                           
                </div>
            </div>
        </div>
    </div>
   @endif
@endsection
@section('bottom_script')
<script>
 var button = document.getElementById('input');
 button.onclick = function() {
     selectFileWithCKFinder('input');
};    
function selectFileWithCKFinder( elementId ) {
        CKFinder.popup( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById(elementId );
                    output.value = evt.data.resizedUrl;
                } );
            }
        } );
    }
    
    CKEDITOR.replace('Content',
     {
         filebrowserBrowseUrl: "{{asset('public/admin/ckfinder/ckfinder.html')}}",
         filebrowserImageBrowseUrl: "{{asset('public/admin/ckfinder/ckfinder.html?type=Images')}}",
         filebrowserUploadUrl: "{{asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}",
         filebrowserImageUploadUrl: "{{asset('public/admin/ckfinder/core/coynnector/php/connector.php?command=QuickUpload&type=Images')}}"
     });

    CKEDITOR.replace('Content');
</script>
@endsection