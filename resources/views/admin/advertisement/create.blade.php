@extends('admin.master')
@section('title','Tạo Quảng Cáo')
@section('content')
@if(Auth::user()->active==1)
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12 text-right"><a href="{{route('admin.advertisement.index')}}"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <form action="{{ route('admin.advertisement.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <h3 class="text-center mt-3 text-muted">TẠO BANNER</h3>
                    <div class="form-group {{ $errors->has('categories_id') ? 'has-error' : '' }}">
                                <label for="categories_id"><i class="fas fa-mouse"></i> Danh mục </label>
                                <select name="categories_id" id="categories_id" class="form-control" required>
                                    <option value="" disabled selected value="">Chọn danh mục cho Banner</option>
                                    <option value="0">Banner Top</option>
                                    <option value="-1">Banner Trái</option>
                                    <option value="-2">Banner Phải</option>
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
                            
                            <div class="form-group {{$errors->has('image')?'has-error' : '' }}">
                                <label for="image"><i class="fas fa-mouse"></i> Hình</label>
                                <input type="text"  class="form-control text-right" id="input1" name="image" placeholder="| Browser" value="{{ old('image') }}" readonly >
                                <span class="help-block">{{$errors->first('image')}}</span>
                            </div>
                            <div class="form-group {{$errors->has('link')?'has-error' : '' }}">
                                <label for="link"><i class="fas fa-mouse"></i> Link Website</label>
                                <input type="text"  class="form-control" name="link">
                                <span class="help-block">{{$errors->first('link')}}</span>
                            </div>
                            
                            <button type="submit" class="btn btn-success">Tạo Quảng Cáo</button>
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