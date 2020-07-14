@extends('admin.master')
@section('title','Cập nhật Giao diện')
@section('content')
@if(Auth::user()->active==1)
<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12 text-right"><a href="{{route('admin.giaodien.index')}}" alt="close"><i class="fas fa-times-circle "></i></a>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">CẬP NHẬT GIAO DIỆN</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.giaodien.update', ['id' => $giaodien->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="Pc">Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên" value="{{ $giaodien->name }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="content" rows="5" class="form-control ckeditor"
                                      placeholder="Nội dung">{{ $giaodien->content }}</textarea>
                            <span class="help-block">{{ $errors->first('content') }}</span>
                        </div>
                        <button type="submit" class="btn btn-success">Update Giao Diện</button>
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