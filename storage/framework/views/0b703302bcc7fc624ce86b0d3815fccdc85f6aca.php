<?php $__env->startSection('title',$cate_posts[0]->categories->name); ?>
<?php $__env->startSection('seo'); ?>
   <meta property="og:title" content="<?php echo e($cate_posts[0]->categories->name); ?>">
    <meta property="og:type" content="article">
    <meta property="og:description" content="<?php echo e($cate_posts[0]->categories->name); ?>">
    <meta property="og:site_name" content="<?php echo e($cate_posts[0]->categories->name); ?>">
    <link rel="canonical" href="<?php echo e(route('trang-chu')); ?>/tin-tuc/<?php echo e($cate_posts[0]->categories->slug); ?>.html">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row mt-1">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo e(route('trang-chu')); ?>"><i class="fas fa-home"></i> Trang chủ</a></li>
			    <li class="breadcrumb-item"><?php echo e($cate_posts[0]->categories->name); ?></li>
			  </ol>
			</nav><!-- end breadcrum -->
        <!-- bài viết theo chuyên mục -->
        <?php $__currentLoopData = $cate_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row mb-3">
            <div class="col-md-4 col-4">
               <img src="<?php echo e($post->Image); ?>" alt="" width="100%" class="rounded"> 
            </div>
            <div class="col-md-8 col-8 ">
               <h6><?php echo e($post->Title); ?></h6>
               <div class="text-muted text-justify d-lg-block d-sm-none d-xs-none d-none">
                <?=$post['Description']?></div>
               <a href="<?php echo e(route('trang-chu')); ?>/<?php echo e($post->Slug); ?>.html">
               <span class="btn btn-primary btn-sm">xem tiếp <i class="far fa-arrow-alt-circle-right"></i></span></a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <!-- kết thúc bài viết theo chuyên mục -->
    	</div><!-- col-md-9 -->
      <div class="clear"></div>
      <div class="col-md-3">
        <?php echo $__env->make('default.includes.right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div><!-- col-md-3 -->
    	
	</div><!-- end row chính -->
</div><!-- end container chính -->
<!-- end pc -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('default.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/default/home/danhmuc.blade.php ENDPATH**/ ?>