<section id="login_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form class="form-signin text-center" id="login_form" action="<?= base_url("dashboard/ajax_login"); ?>" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Login">
                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Senha">
                
                    <div class="form-check mb-3 mt-3 float-right">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">Lembrar senha
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <?php
                    if ($msg = get_msg()) { // verifica se existe alguma msg na função get_msg
                        echo "<div class='alert alert-light shake-horizontal p-0' role='alert'>$msg</div>";
                    }
                    ?>
                    <div id="error_block">
                        <button class="btn btn-lg btn-info btn-block" type="submit" id="btn_login">Entrar</button>
                        <span class="help-block"></span>
                    </div>

                </form>
                <!--<a href="<?= base_url('dashboard/register'); ?>" class="btn btn-lg btn-primary btn-block" id="btn_register">Cadastre-se</a>-->
            </div>
        </div>
    </div>
</section>