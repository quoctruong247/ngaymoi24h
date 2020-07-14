@extends('admin.master')
@section('title','Tạo Video')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12 text-right"><a href="{{route('admin.video.index')}}"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <h3 class="text-center mt-3 text-muted">TẠO VIDEO</h3>
                    <div class="form-group {{$errors->has('name')?'has-error' : '' }}">
                        <label for="name"><i class="fas fa-mouse"></i> Tên</label>
                        <input type="text"  class="form-control" name="name">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('link')?'has-error' : '' }}">
                        <label for="link"><i class="fas fa-mouse"></i> Liên kết</label>
                        <input type="text"  class="form-control" name="link">
                        <span class="help-block">{{$errors->first('link')}}</span>
                    </div>
                   <div class="form-group {{$errors->has('image')?'has-error' : '' }}">
                                <label for="image"><i class="fas fa-mouse"></i> Hình</label>
                                <input type="text"  class="form-control text-right" id="input1" name="image" placeholder="| Browser" value="{{ old('image') }}" readonly >
                                <span class="help-block">{{$errors->first('image')}}</span>
                            </div>
                    <button type="submit" class="btn btn-success">Tạo Video</button>
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
 var button1 = document.getElementById('input1');
 button1.onclick = function() {
     selectFileWithCKFinder('input1');
 };
var button2 = document.getElementById('input2');
 button2.onclick = function() {
     selectFileWithCKFinder('input2');
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
</script>
@endsection