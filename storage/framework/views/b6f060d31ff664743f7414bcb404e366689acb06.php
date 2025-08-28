<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('posts.index')); ?>">Project_One</a>

            <div class="d-flex ms-auto">
                <?php if(auth()->guard()->check()): ?>
                    <span class="navbar-text me-3">
                        👤<a href="<?php echo e(route('profile.show')); ?>">  <?php echo e(Auth::user()->name); ?> </a>
                    </span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                <?php endif; ?>
            </div>
            
        </div>
    </nav>

    
    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    
    <footer class="text-center mt-5 mb-3 text-muted">
       
    </footer>
</body>
</html>
<?php /**PATH C:\Users\User\Desktop\project_one\resources\views/layouts/app.blade.php ENDPATH**/ ?>