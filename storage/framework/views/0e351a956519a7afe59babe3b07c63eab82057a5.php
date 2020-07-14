<?php $__env->startSection('title','Tạo Video'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->active==1): ?>
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12 text-right"><a href="<?php echo e(route('admin.video.index')); ?>"><i class="fas fa-times-circle "></i></a>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <form action="<?php echo e(route('admin.video.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                    <h3 class="text-center mt-3 text-muted">TẠO VIDEO</h3>
                    <div class="form-group <?php echo e($errors->has('name')?'has-error' : ''); ?>">
                        <label for="name"><i class="fas fa-mouse"></i> Tên</label>
                        <input type="text"  class="form-control" name="name">
                        <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                    </div>
                    <div class="form-group <?php echo e($errors->has('link')?'has-error' : ''); ?>">
                        <label for="link"><i class="fas fa-mouse"></i> Liên kết</label>
                        <input type="text"  class="form-control" name="link">
                        <span class="help-block"><?php echo e($errors->first('link')); ?></span>
                    </div>
                   
                    <button type="submit" class="btn btn-success">Tạo Video</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/admin/video/create.blade.php ENDPATH**/ ?>