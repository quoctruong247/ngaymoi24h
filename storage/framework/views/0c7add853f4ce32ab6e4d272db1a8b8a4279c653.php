<?php $__env->startSection('title','Trang tin tức ngày mới 24h'); ?>
<?php $__env->startSection('seo'); ?>
	<meta property="og:title" content="Ngày mới 24h">
    <meta property="og:type" content="article">
    <meta property="og:description" content="trang tin nhanh, tin nóng, tin hot, người Việt xem nhiều nhất, tin doanh nghiệp">
    <meta property="og:url" content="<?php echo e(asset('public/default/images/pc/logo.jpg')); ?>">
    <meta property="og:site_name" content="Ngày mới 24h">
    <meta property="og:image" content="<?php echo e(asset('public/default/images/pc/logo.jpg')); ?>">
    <meta property="og:image:secure_url" content="<?php echo e(asset('public/default/images/pc/logo.jpg')); ?>">
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="284" />
    <meta property="og:image:height" content="202"/>
    <link rel="canonical" href="<?php echo e(route('trang-chu')); ?>">
<?php $__env->stopSection(); ?>
<!-- -------------phần pc------------------------>
<?php $__env->startSection('content'); ?>

<!-- tin mới -->
<div class="container mt-2">
	<!-- banner top -->
	<div class="row">
		<div class="col-12 d-lg-none d-md-block d-xs-block d-sm-block d-block mb-2"><img src="<?php echo e(asset($advertisements[2]->image)); ?>" alt="" class="rounded shadow p-1 mt-2 w-100"></div>
	</div>
	<!-- kết thúc banner top -->
	<div class="row">
		<div class="col-md-4">
			<h6 class="line_cate">TIN MỚI CẬP NHẬT</h6>

			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<div class="carousel-item active">
			    	<a href="<?php echo e($posts[0]->Slug); ?>.html">
				      	<img src="<?=$posts[0]['Image']?>" class="d-block w-100" alt="...">
				      	<p class="mt-2 common-title"><b><?=$posts[0]['Title']?></b></p>
						<p><?php echo \Illuminate\Support\Str::words($posts[0]['Description'], 31,'....'); ?></p>
					</a>
			    </div>
			  	<?php for($i=1;$i<6;$i++): ?>
			    <div class="carousel-item">
			    	<a href="<?php echo e(route('trang-chu')); ?>/<?php echo e($posts[$i]->Slug); ?>.html">
				      	<img src="<?=$posts[$i]['Image']?>" class="d-block w-100" alt="...">
				      	<p class="mt-2 common-title"><b><?=$posts[$i]['Title']?></b></p>
						<p><?php echo \Illuminate\Support\Str::words($posts[$i]['Description'], 31,'....'); ?></p>
					</a>
			    </div>
			    <?php endfor; ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>	

		</div><!-- kết thúc cột 1 -->
		<div class="col-md-4">	
			<div class="container">
				<?php for($i=7;$i<12;$i++): ?>
				<div class="row rowItem">
					<div class="col-md-5 col-5 pt-1 pb-1">
						<a href="<?php echo e(route('trang-chu')); ?>">
						<img src="<?=$posts[$i]['Image']?>" alt="" class="rounded w-100">
						</a>
					</div>
					<div class="col-md-7 col-7">
						<p class="common-title">
							<a href="<?php echo e($posts[$i]->Slug); ?>.html">
							<?php echo \Illuminate\Support\Str::words($posts[$i]->Title, 10,'....'); ?></a>
						</p>
						
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div><!-- kết thúc cột 2 -->
		<div class="col-md-4">
			<div id="video">
  				<iframe width="100%" height="200" src="//www.youtube.com/embed/<?php echo e($videos[0]->link); ?>?autoplay=1&mute=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>

			</div>
			<style>
				.carousel-indicators{
					bottom: -42px!important;
				}
				.carousel-indicators li{
					width: 10px!important;
					height: 5px!important;
					background-color: #00BCD4!important;
				}
			</style>
			<div class="video">	
	  			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				<div class="carousel-inner">
					<?php 
						$i=0;
					?>
					
		  			<div class="carousel-item active">
						<div class="row">
							<?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="col-md-4 col-4 ">
								<div class="videoItem" data-id="<?php echo e($video->link); ?>" style="cursor: pointer;">
								<img src="<?php echo e($video->image); ?>" class="d-block w-100" >
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								Chưa có dữ liệu
							<?php endif; ?>
						</div>
				    </div>
				 
	  			</div>
		  		<!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				 <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				 </a> -->
	  		</div> 
				  
			</div>
		</div><!-- kết thúc cột 3 -->
	</div>
</div>  
<!-- kết thúc tin mới -->

<!-- banner quảng cáo -->
<div class="container mt-4 mb-2">
	<div class="row">
		<div class="col-md-6">
			<a href="<?php echo e(asset($advertisements[1]->link)); ?>"><img src="<?php echo e(asset($advertisements[1]->image)); ?>" class="d-block w-100 rounded shadow-sm p-1 mt-2" alt="..."></a>
		</div>
		<div class="col-md-6">
			<a href="<?php echo e(asset($advertisements[1]->link)); ?>"><img src="<?php echo e(asset($advertisements[0]->image)); ?>" class="d-block w-100 rounded shadow-sm p-1 mt-2" alt="..." ></a>
		</div>
	</div>
</div>
<!-- kết thúc banner quảng cáo -->

<!-- danh mục tin tức -->
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php $j=0; ?>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<!-- tiêu đề -->
				<h6 class="line_cate mt-2"><?php echo e($cate->name); ?></h6>
					<div class="row">
					<?php $i=0; $j++;?>
					<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	

						<?php if($cate->id==$post->categories_id): ?>
							<?php $i++; ?>
							<?php if($i==1): ?>

							<div class="col-md-6">
								<a href="<?=$post['Slug']?>.html">
									<img src="<?=$post['Image']?>" alt="" width="100%">
									<h5 class="mt-2"><?=$post['Title']?></h5>
									<p><?php echo \Illuminate\Support\Str::words($post['Description'], 31,'....'); ?></p>
								</a>
							</div>
							<div class="col-md-6">
							<?php elseif($i<6): ?>
							
								<div class="container">
									<div class="row rowItem">
										<div class="col-md-5 col-5 pt-1 pb-1">
											<a href="<?php echo e($post->Slug); ?>.html">
											<img src="<?php echo e($post->Image); ?>" alt="" class="rounded w-100">
											</a>
										</div>
										<div class="col-md-7 col-7">
											<a href="<?php echo e($post->Slug); ?>.html">
											<p><?php echo \Illuminate\Support\Str::words($post->Title, 8,'..'); ?></p>
											</a>
										</div>
									</div>
								</div>
							<?php endif; ?>
								
						<?php endif; ?>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<a href="<?php echo e(asset($advertisements[$j]->link)); ?>"><img src="<?php echo e($advertisements[$j]->image); ?>" alt="" class="w-100"></a>
				
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div> <!-- end col-md-8 -->

		<!-- phần bên phải -->
		<div class="col-md-4 "><?php echo $__env->make('default.layouts.right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div> 
		<!-- kết thúc phần bên phải -->
	</div>
</div>

<!-- kết thúc danh mục tin tức -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\my-app-ngaymoi24h.vn\resources\views/default/pages/index.blade.php ENDPATH**/ ?>