

<?php $__env->startSection('head'); ?>
    <title>Login</title>
<?php $__env->stopSection(); ?>

<?php if(isset($message)): ?>
    <?php $__env->startSection('alert'); ?>
        <div>
            <?php echo e($message); ?>

        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <h1>Login</h1>

    <form action="login" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Numero da conta</label>
            <input type="text" class="form-control my-3" name="acc_number" aria-describedby="emailHelp" placeholder="Numero da Conta">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control my-3" name="password" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary my-3">Entrar</button>
    </form>
    <small id="emailHelp" class="form-text text-muted">Não possui uma conta ainda? clique <a href="/cadastro">AQUI</a> para se cadastrar</small>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michel\PhpstormProjects\wjcrypto\App\Frontend\Views/pages/login.blade.php ENDPATH**/ ?>