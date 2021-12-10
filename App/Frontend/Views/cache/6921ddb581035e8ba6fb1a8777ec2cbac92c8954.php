

<?php $__env->startSection('head'); ?>
    <title>Home</title>
<?php $__env->stopSection(); ?>

<?php if(isset($message)): ?>
    <?php $__env->startSection('alert'); ?>
        <div>
            <?php echo e($message); ?>

        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <h1>Ultimas transações</h1>

    <div class="list-group">

        <?php foreach ($transactions as $transaction) { ?>
            <div class="list-group-item my-3">
                <div class="d-flex w-100 justify-content-between ">
                    <h5 class="mb-1">Tipo de Transação: <?= $transaction->type ?></h5>
                    <small><?= date("d/m/Y H:i:s", strtotime($transaction->date))?></small>
                </div>
                <p class="mb-1">Quantia: <?= $transaction->amount ?></p>
                <?php if($transaction->type === "Transfer") { ?>
                    <p class="mb-1">Conta Origem: <?=  \Helper::decrypt_data($transaction->from_acc) ?> </p>
                    <p class="mb-1">Conta Destino: <?=  \Helper::decrypt_data($transaction->to_acc) ?> </p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michel\PhpstormProjects\wjcrypto\App\Frontend\Views/pages/home.blade.php ENDPATH**/ ?>