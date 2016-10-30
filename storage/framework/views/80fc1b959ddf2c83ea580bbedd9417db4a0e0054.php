<?php $__env->startSection('content'); ?>
<div class="flex-center position-ref full-height">
    <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <a href="<?php echo e(url('/login')); ?>">Login</a>
            <a href="<?php echo e(url('/register')); ?>">Register</a>
        </div>
    <?php endif; ?>

    <div class="content">
        <div class="title m-b-md">
            Portes de l'Essonne Handball
        </div>

        <div class="links">
            <a href="<?php echo e(url('actu')); ?>">Actualités</a>
            <a href="">équipes</a>
            <a href="">calendrier</a>
            <a href="">Résultats</a>
            <a href="">Connexion</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>