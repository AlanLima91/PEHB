<?php $__env->startSection('content'); ?>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Portes de l'Essonne Handball
        </div>

        <div class="links">
            <a href="<?php echo e(url('actu')); ?>">Actualités</a>
            <a href="<?php echo e(url('equipe')); ?>">équipes</a>
            <a href="<?php echo e(url('calendrier')); ?>">calendrier</a>
            <a href="<?php echo e(url('resultats')); ?>">Résultats</a>
            <a href="<?php echo e(url('connexion')); ?>">Connexion</a>
            <a href="<?php echo e(url('information')); ?>">Informations</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>