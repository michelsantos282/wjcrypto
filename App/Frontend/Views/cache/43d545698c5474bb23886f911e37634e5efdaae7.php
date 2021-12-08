<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>

        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body class="bg-dark text-light">
        <div class="container">
                <header>
                    <div class="jumbotron bg-danger p-3 my-3">
                        <h1>WJCrypto</h1>
                    </div>
                    <?php if(isset($_SESSION["acc_number"])): ?>
                        <nav class="nav">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Principal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Depósito</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Saque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Transferência</a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </header>


            <hr>
            <main>
                <?php echo $__env->yieldContent('alert'); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </main>


            <hr>
            <footer>
                <div class="footer navbar-fixed-bottom">
                    WJCRYPTO 2021 - WEBJUMP
                </div>
            </footer>
        </div>
    </body>
</html><?php /**PATH C:\Users\Michel\PhpstormProjects\wjcrypto\App\Frontend\Views/layout.blade.php ENDPATH**/ ?>