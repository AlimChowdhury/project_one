

<?php $__env->startSection('content'); ?>
<h1>Create Post</h1>
<form action="<?php echo e(route('posts.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <button class="btn btn-success">Submit</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/Posts/create.blade.php ENDPATH**/ ?>