

<?php $__env->startSection('head'); ?>
    <title>Cadastro</title>
<?php $__env->stopSection(); ?>

<?php if(isset($message)): ?>
<?php $__env->startSection('alert'); ?>
    <div class="alert shadow">
        <div>
            <?php echo e($message); ?>

            <?php if($message == 'Usuário criado com sucesso!'): ?>
                <p>
                    Número da conta:
                </p>
                <span>
          <?php echo e($acc_number); ?>

        </span>
                <div>OBS: Guarde este número para realizar o <a href="/">login</a> em sua conta!</div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <h1>Cadastro</h1>


    <form action="cadastro" method="post">
        <div class="row">
            <div class="col-6">
                <h6 class="my-3">Dados Pessoais</h6>
                <div class="form-group">
                    <label for="">Nome/Razao Social</label>
                    <input type="text" name="name" class="form-control my-3"aria-describedby="emailHelp" placeholder="Nome Completo" required>
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="password" class="form-control my-3" placeholder="Senha" required>
                </div>
                <div class="form-group">
                    <label for="">Data de Nascimento</label>
                    <input type="date" name="dob" class="form-control my-3" placeholder="Data de Nascimento" required>
                </div>
                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="text" name="phone" class="form-control my-3" placeholder="Telefone" required>
                </div>
                <div class="form-group">
                    <label for="">CPF/CNPJ</label>
                    <input type="text" name="doc_number" class="form-control my-3" placeholder="Numero do documento" required>
                </div>
            </div>
            <div class="col-6">
                <h6 class="my-3">Endereco</h6>
                <div class="form-group">
                    <label for="">CEP</label>
                    <input type="text" name="postcode" class="form-control my-3"aria-describedby="emailHelp" placeholder="CEP" required>
                </div>
                <div class="form-group">
                    <label for="">País</label>
                    <input type="text" name="country" class="form-control my-3" placeholder="País" required>
                </div>
                <div class="form-group">
                    <label for="">Estado</label>
                    <input type="text" name="state" class="form-control my-3" placeholder="Estado" required>
                </div>
                <div class="form-group">
                    <label for="">Cidade</label>
                    <input type="text" name="city" class="form-control my-3" placeholder="Cidade" required>
                </div>
                <div class="form-group">
                    <label for="">Rua</label>
                    <input type="text" name="street" class="form-control my-3" placeholder="Rua">
                </div>
                <div class="form-group">
                    <label for="">Numero</label>
                    <input type="text" name="number" class="form-control my-3" placeholder="Numero da casa" required>
                </div>
                <div class="form-group">
                    <label for="">Complemento</label>
                    <input type="text" name="complement" class="form-control my-3" placeholder="Complemento">
                </div>
                <div class="form-group">
                    <label for="">Referência</label>
                    <input type="text" name="reference" class="form-control my-3" placeholder="Referência">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">Cadastrar</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michel\PhpstormProjects\wjcrypto\App\Frontend\Views/pages/register.blade.php ENDPATH**/ ?>