<?php $__env->startSection('title',$post[0]->Title); ?>
<?php $__env->startSection('seo'); ?>
    <meta property="og:title" content="<?php echo e($post[0]->Title); ?>">
    <meta property="og:type" content="article">
    <meta property="og:description" content="<?php echo e($post[0]->Description); ?>">
    <meta property="og:url" content="<?php echo e($post[0]->Image); ?>">
    <meta property="og:site_name" content="<?php echo e($post[0]->Title); ?>">
    <meta property="og:image" content="<?php echo e($post[0]->Image); ?>">
    <meta property="og:image:secure_url" content="<?php echo e($post[0]->Image); ?>">
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="284" />
    <meta property="og:image:height" content="202"/>
    <link rel="canonical" href="<?php echo e(route('trang-chu')); ?>/<?php echo e($post[0]->Slug); ?>.html">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row mt-1">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo e(route('trang-chu')); ?>"><i class="fas fa-home"></i> Trang chủ</a></li>
			    <li class="breadcrumb-item"><a href="<?php echo e(route('trang-chu')); ?>/tin-tuc/<?php echo e($post[0]->categories->slug); ?>.html"><?php echo e($post[0]->categories->name); ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo e($post[0]->Title); ?></li>
			  </ol>
			</nav>
			<!-- end breadcrum -->
           
           
			<!-- nội dung bài viết -->
			<h1 class="post_title"><?php echo e($post[0]->Title); ?></h1>
            <b><?=$post[0]['Description']?> </b>   
			<?=$post[0]['Content']?>	
           
            <!--tin tức liên quan -->
            <?php 
            	use App\Http\Controllers\HomeController;
            	$categories = HomeController::getCategory($post[0]->categories->id);
             ?>
            <?php if(count($categories)>0): ?>
            
        	<div class="row mt-4">
        	    <p class="col-md-12 col-sm-12 col-12 pl-1 style_line_tinlienquan title_tintuclienquan">BÀI VIẾT CÙNG CHỦ ĐỀ
        	    </p>
        	</div>

        	<div class="row mt-1" style="background: #d4dadd;">
               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <div class="col-md-6 col-sm-6 col-12 title_thongtinbaiviet">
            		<a href="<?php echo e(route('trang-chu')); ?>/<?php echo e($key->Slug); ?>.html">
            		    <div class="row">
                            <div class="col-md-4 col-sm-4 col-4 mt-1"><img src="<?php echo e($key->Image); ?>" alt="" width="100%"></div>
            		        <div class="col-md-8 col-sm-8 col-8 mt-1 text-left pl-3 title_thongtintieude">
            		            <?php echo e($key->Title); ?>

            		        </div>
            		    </div>
            		</a>
            	</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
        	</div>

            <?php endif; ?>
            <!--end tin tức liên quan-->

        <!-- kết thúc nội dung bài viết -->
		</div><!-- col-md-9 -->
		<div class="col-md-3">
			<?php echo $__env->make('default.includes.right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div><!-- col-md-3 -->
	</div>
</div>

<?php $__env->stopSection(); ?><!-- end section pc -->
<?php echo $__env->make('default.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/default/home/baiviet.blade.php ENDPATH**/ ?>