@extends('admin.master')
@section('title','Tạo Giao Diện')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12 text-right"><a href="{{route('admin.giaodien.index')}}"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <form action="{{ route('admin.giaodien.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <h3 class="text-center mt-3 text-muted">TẠO GIAO DIỆN</h3>
                    <div class="form-group {{$errors->has('name')?'has-error' : '' }}">
                        <label for="name"><i class="fas fa-mouse"></i> Tên</label>
                        <input type="text"  class="form-control" name="name" >
                        <span class="help-block">{{$errors->first('Pc')}}</span>
                    </div>
                   
                     <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="content" rows="5" class="form-control ckeditor"
                                  placeholder="Nội dung"></textarea>
                        <span class="help-block">{{ $errors->first('content') }}</span>
                    </div>
                    <button type="submit" class="btn btn-success">Tạo Giao Diện</button>
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