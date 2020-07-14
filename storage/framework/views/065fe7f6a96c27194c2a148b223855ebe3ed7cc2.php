<?php $__env->startSection('title','Cập nhật video'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->active==1): ?>
<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12 text-right"><a href="<?php echo e(route('admin.video.index')); ?>" alt="close"><i class="fas fa-times-circle "></i></a>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <h3 class="text-center mt-3 text-muted">CẬP NHẬT VIDEO</h3>
                <div class="panel-body">
                    <form action="<?php echo e(route('admin.video.update', ['id' => $video->id])); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>

                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($video->name); ?>">
                            <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" value="<?php echo e($video->link); ?>">
                            <span class="help-block"><?php echo e($errors->first('link')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                            <label for="image">Hình</label>
                            <input type="text" class="form-control" id="input1" name="image" value="<?php echo e($video->image); ?>" placeholder="| Browser" readonly>
                            <span class="help-block"><?php echo e($errors->first('image')); ?></span>
                        </div>
                        <button type="submit" class="btn btn-success">Chỉnh sửa video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/admin/video/show.blade.php ENDPATH**/ ?>