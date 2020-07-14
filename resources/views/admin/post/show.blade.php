@extends('admin.master')
@section('title','Trang sửa bài viết')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
           
            <div class="col-md-12 text-right"><a href="{{route('admin.post.index')}}"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="error col-12"> 
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
             
            <div class="col-md-12">
                <div class="panel panel-default">
                    <h3 class="text-center mt-3 text-muted">CẬP NHẬT BÀI VIẾT</h3>
                    <div class="panel-body">
                        <form action="{{ route('admin.post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                           
                            <div class="form-group {{ $errors->has('categories_id') ? 'has-error' : '' }}">
                                <label for="categories_id"><i class="fas fa-mouse"></i> Danh mục </label>
                                <select name="categories_id" id="categories_id" class="form-control">
                                    
                                @forelse($categories as $cate)
                                    @if($cate->id==$post->categories_id)
                                    <option value="{{$cate->id}}" selected>{{$cate->name}}</option>
                                    @else
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endif
                                @empty
                                <tr>
                                    <td colspan="8">Không có dữ liệu nào</td>
                                </tr>
                                @endforelse
                                </select>
                                <span class="help-block">{{$errors->first('categories_id')}}</span>
                            </div>
                            <div class="form-group {{ $errors->has('Title') ? 'has-error' : '' }}">
                                <label for="Title">Tiêu đề bài viết</label>
                                <input type="text" class="form-control" id="Title" name="Title" placeholder="Tiêu đề bài viết"
                                       value="{{ $post->Title }}">
                                <span class="help-block">{{ $errors->first('Title') }}</span>
                            </div>
                    <div class="form-group {{ $errors->has('Slug') ? 'has-error' : '' }}">
                        <label for="Slug">Link SEO</label>
                        <input type="text" class="form-control" id="Slug" name="Slug" placeholder="Tiêu đề SEO"
                               value="{{ $post->Slug }}">
                        <span class="help-block">{{ $errors->first('Slug') }}</span>
                    </div>
                            <div class="form-group {{ $errors->has('Keyword') ? 'has-error' : '' }}">
                                <label for="Keyword">Từ khóa SEO</label>
                                <input type="text" class="form-control" id="Keyword" name="Keyword" placeholder="Từ khóa"
                                       value="{{ $post->Keyword }}">
                                <span class="help-block">{{ $errors->first('Keyword') }}</span>
                            </div>
                            
                            <div class="form-group {{ $errors->has('Description') ? 'has-error' : '' }}">
                                <label for="Description">Đoạn trích</label>
                                <textarea name="Description" id="Description" rows="5" class="form-control"
                                          placeholder="Đoạn trích">{{ $post->Description }}</textarea>
                                <span class="help-block">{{ $errors->first('Description') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('Content') ? 'has-error' : '' }}">
                                <label for="Content">Nội dung</label>
                                <textarea name="Content" id="Content" rows="5" class="form-control ckeditor"
                                          placeholder="Nội dung">{{ $post->Content }}</textarea>
                                <span class="help-block">{{ $errors->first('Content') }}</span>
                            </div>

                            <div class="form-group" id="qh-app">
                                <qh-attributes></qh-attributes>
                            </div>
                            <div class="form-group {{ $errors->has('Image') ? 'has-error' : '' }}">
                                <label for="Image">Hình bài viết</label>
                                <input type="text"  class="form-control text-right" id="input" name="Image" placeholder="| Browser" value="{{ old('Image')??$post->Image }}" readonly >
                                <span class="help-block">{{ $errors->first('Image') }}</span>
                                
                                <div>
                                    @if (!empty($post->Image)&& file_exists($post->Image))
                                        <img src="{{ $post->Image }}" alt="Image" class="img-responsive img-thumbnail">
                                    @else
                                        <img src="{{$post->Image}}" alt="phú khang" class="img-responsive img-thumbnail w-20">
                                    @endif
                                </div>
                            </div>

                            
                            <button type="submit" class="btn btn-success">Cập nhật bài viết</button>
                        </form>
                    </div>
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