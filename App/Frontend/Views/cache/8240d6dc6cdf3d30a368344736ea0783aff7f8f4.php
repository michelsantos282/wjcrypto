

<?php $__env->startSection('head'); ?>
    <title>Transferência</title>
<?php $__env->stopSection(); ?>

<?php if(isset($message)): ?>
    <?php $__env->startSection('alert'); ?>
        <div>
            <?php echo e($message); ?>

        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <h1>Transferência</h1>

    <form>
        <div class="form-group">
            <label for="">Qual o valor da transferência?</label>
            <small>Saldo disponivel em conta <strong>R$800,00</strong></small>
            <input type="text" name="amount" class="form-control my-3" placeholder="Valor">
        </div>
        <div class="form-group">
            <label for="">Para quem você quer transferir?</label>
            <input type="text" class="form-control my-3"  placeholder="Conta">
        </div>
        <button type="submit" class="btn btn-primary my-3">Transferir</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michel\PhpstormProjects\wjcrypto\App\Frontend\Views/pages/transfer.blade.php ENDPATH**/ ?>