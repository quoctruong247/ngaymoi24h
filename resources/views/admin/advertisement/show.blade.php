@extends('admin.master')
@section('title','Cập nhật advertisement')
@section('content')
@if(Auth::user()->active==1)

<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12 text-right"><a href="{{route('admin.advertisement.index')}}" alt="close"><i class="fas fa-times-circle "></i></a>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">CẬP NHẬT QUẢNG CÁO</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.advertisement.update', ['id' => $advertisement->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group {{ $errors->has('categories_id') ? 'has-error' : '' }}">
                                <label for="categories_id"><i class="fas fa-mouse"></i> Chọn Danh mục cho Banner </label>
                                <select name="categories_id" id="categories_id" class="form-control">
                                @if($advertisement->categories_id==0)
                                    <option value="0" selected>Banner Top</option>
                                @else
                                    <option value="0">Banner Top</option>
                                @endif
                                @if($advertisement->categories_id==-1)
                                    <option value="-1" selected>Banner Trái</option>
                                @else
                                    <option value="-1">Banner Trái</option>
                                @endif
                                @if($advertisement->categories_id==-2)
                                    <option value="-2" selected>Banner Phải</option>
                                @else
                                    <option value="-2">Banner Phải</option>
                                @endif
                                
                                @forelse($categories as $object)
                                    @if($object->id==$advertisement->categories_id)
                                    <option value="{{$object->id}}" selected>{{$object->name}}</option>
                                    @else
                                    <option value="{{$object->id}}">{{$object->name}}</option>
                                    @endif
                                @empty
                                <tr>
                                    <td colspan="8">Không có dữ liệu nào</td>
                                </tr>
                                @endforelse
                                </select>
                                <span class="help-block">{{$errors->first('categories_id')}}</span>
                            </div>
                            
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">Hình</label>
                            <input type="text" class="form-control" id="input1" name="image" value="{{ $advertisement->image }}" placeholder="| Browser" readonly>
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" value="{{$advertisement->link}}">
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