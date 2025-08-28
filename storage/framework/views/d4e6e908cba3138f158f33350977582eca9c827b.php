

<?php $__env->startSection('content'); ?>

<h1><?php echo e($post->title); ?></h1>
<p><?php echo e($post->content); ?></p>
<a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary">Back to List</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/posts/show.blade.php ENDPATH**/ ?>