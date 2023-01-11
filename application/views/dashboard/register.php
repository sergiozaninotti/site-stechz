<section id="login_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form class="form-signin text-center" id="register_form" action="<?= base_url("dashboard/register"); ?>" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>

                    <label for="inputName" class="sr-only">Nome</label>
                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Digite seu nome">

                    <label for="inputLogin" class="sr-only">Usuário</label>
                    <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Nome de usuário">

                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email">

                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="text" name="password" id="inputPassword" class="form-control" placeholder="Senha">

                    <input type="text" name="password2" class="form-control" placeholder="Repita a senha">

                    <?php
                    if ($msg = get_msg()) { // verifica se existe alguma msg na função get_msg
                        echo "<div class='alert alert-light shake-horizontal p-0' role='alert'>$msg</div>";
                    }
                    ?>
                    <!--<button class="btn btn-lg btn-success btn-block" type="submit">Cadastrar</button>-->
                </form>
            </div>
        </div>
    </div>
</section>