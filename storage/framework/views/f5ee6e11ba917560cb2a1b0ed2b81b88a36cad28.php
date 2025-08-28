

<?php $__env->startSection('content'); ?>
    <h1>Edit Post</h1>
    <form action="<?php echo e(route('posts.update', $post->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($post->title); ?>" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required><?php echo e($post->content); ?></textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/posts/edit.blade.php ENDPATH**/ ?>