<?php $__env->startSection('title','Trang cập nhật Danh Mục'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->active==1): ?>
    <div class="container-fluid shadow-sm p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-weight-bold text-muted text-center">CẬP NHẬT DANH MỤC</div>
                    
                    <div class="panel-body">
                        <form action="<?php echo e(route('admin.category.update', ['id' => $category->id])); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên chuyên mục"
                                       value="<?php echo e($category->name); ?>">
                                <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>