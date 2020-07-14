@extends('admin.master')
@section('title','Cập nhật Banner Phải')
@section('content')
@if(Auth::user()->active==1)

<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12 text"><a href="{{route('admin.advertisement1.index')}}" alt="close"><i class="fas fa-times-circle "></i></a>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">CẬP NHẬT QUẢNG CÁO</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.advertisement1.update', ['id' => $advertisement1->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
      
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">Hình</label>
                            <input type="text" class="form-control" id="input1" name="image" value="{{ $advertisement1->image }}" placeholder="| Browser" readonly>
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" value="{{$advertisement1->link}}">
                            <span class="help-block">{{ $errors->first('link') }}</span>
                        </div>

                        <button type="submit" class="btn btn-success">Chỉnh sửa Banner</button>
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