<main class="loginPage">
    <form role="form" action="<?=base_url('login')?>" method="POST">
            <h3 class="mb-0 ml-2 text-center">Login</h3>
            <hr>
            <div class="form-group form-group-icon">
                <input type="text" class="form-control border" name="usuario" placeholder="Usuario" required>
            </div>

            <div class="form-group form-group-icon">
                <input type="password" class="form-control border" name="senha" placeholder="Senha" required>
            </div>

            <?php
            $loginMsg = session()->get('loginMsg');
            $alertColor = session()->get('alertColor') ?? 'danger';

            if($loginMsg){
                echo "<div class='alert alert-$alertColor'>$loginMsg</div>";
            }

            session()->destroy();
            ?>

            <div class="form-group">
                <button type="submit" class="btn btn-success text-uppercase w-100">Entrar</button>
            </div>

        </form>
</main>