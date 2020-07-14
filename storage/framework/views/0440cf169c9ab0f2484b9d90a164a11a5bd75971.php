<?php $__env->startSection('title','Danh sách Banner'); ?>
<?php $__env->startSection('content'); ?>

<?php if(Auth::user()->active==1): ?>


<div class="container-fluid shadow-sm p-3 bg-white rounded">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a href="<?php echo e(route('admin.giaodien.create')); ?>" class="btn btn-primary">Tạo Giao Diện</a>
            </div>
            <br>
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <?php if(session('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Nội dung</th>
                                <th>User</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th width="150">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>

<?php $__empty_1 = true; $__currentLoopData = $giaodiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $giaodien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

<tr>
    <td><?php echo e($giaodien->id); ?></td>
    <td><?php echo e($giaodien->name); ?></td>
    <td><?php echo e($giaodien->content); ?></td>
    <td><?php echo e($giaodien->users->name); ?></td>
    <td>
        <?php if($giaodien->on_off==1): ?>
        <a href="<?php echo e(route('admin.giaodien.active',['id'=>$giaodien->id])); ?>"><img src="<?php echo e(asset('public/admin/images/pc/icon_on.png')); ?>" alt="on"></a>
        <?php else: ?>
        <a href="<?php echo e(route('admin.giaodien.active',['id'=>$giaodien->id])); ?>"><img src="<?php echo e(asset('public/admin/images/pc/icon_off.png')); ?>" alt="on"></a>
        <?php endif; ?>
    </td>
    <td><?php echo e($giaodien->created_at); ?></td>
    <td><?php echo e($giaodien->updated_at); ?></td>
    <td>
        <a href="<?php echo e(route('admin.giaodien.show', ['id' => $giaodien->id])); ?>"
           class="btn btn-primary">Sửa</a>
        <a href="<?php echo e(route('admin.giaodien.delete', ['id' => $giaodien->id])); ?>"
           class="btn btn-danger"
           onclick="event.preventDefault();
                   window.confirm('Bạn đã chắc chắn xóa Id=<?php echo e($giaodien->id); ?> chưa?') ?
                   document.getElementById('giaodien-delete-<?php echo e($giaodien->id); ?>').submit():
                   0;">Xóa</a>
        <form action="<?php echo e(route('admin.giaodien.delete', ['id' => $giaodien->id])); ?>"
              method="post" id="giaodien-delete-<?php echo e($giaodien->id); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('delete')); ?>

        </form>
    </td>
    
</tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5">No data</td>
                </tr>
            <?php endif; ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            <?php echo e($giaodiens->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/admin/giaodien/list.blade.php ENDPATH**/ ?>