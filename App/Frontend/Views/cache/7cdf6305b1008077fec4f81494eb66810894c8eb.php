

<?php $__env->startSection('head'); ?>
    <title>Depósito</title>
<?php $__env->stopSection(); ?>

<?php if(isset($message)): ?>
<?php $__env->startSection('alert'); ?>
    <div>
        <?php echo e($message); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <h1>Depósito</h1>

    <form action="/deposito" method="post">
        <div class="form-group">
            <label for="">Qual o valor deseja depositar??</label>
            <input type="text" name="amount" class="form-control my-3" placeholder="Valor">
        </div>
        <button type="submit" class="btn btn-primary my-3">Depositar</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michel\PhpstormProjects\wjcrypto\App\Frontend\Views/pages/deposit.blade.php ENDPATH**/ ?>