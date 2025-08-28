

<?php $__env->startSection('content'); ?>
    <h1>All Posts</h1>


    <div>
        <h3>Hello, <?php echo e(Auth::user()->name); ?></h3>
    </div>
    <br>
    <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary mb-3">Create new post</a>

    <?php $__currentLoopData = $temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($post->title); ?></h5>
                <p class="card-text"><?php echo e(Str::limit($post->content, 150)); ?></p>
                <div class="d-flex justify-content-between">
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-post')): ?>
                            <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-sm btn-info">View</a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-post')): ?>
                            <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <?php endif; ?>

                    </div>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-post')): ?>
                        <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/Posts/index.blade.php ENDPATH**/ ?>