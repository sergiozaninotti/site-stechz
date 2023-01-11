<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 bg-white">
                <div class="col-lg-5 mx-auto p-5">
                    <form class="form-signin text-center" action="<?= base_url("dashboard/config"); ?>" method="post">
                        <h1 class="h3 mb-3 font-weight-normal mb-4"><?= $page_title; ?></h1>

                        <label for="username" class="sr-only">Nome de Usuário</label>
                        <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Nome de Usuário" autofocus required>

                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email" required>

                        <label for="inputPassword" class="sr-only">Senha</label>
                        <input type="password" name="password" class="form-control" placeholder="Senha">

                        <label for="inputPassword" class="sr-only">Repita a senha</label>
                        <input type="password" name="password_match" class="form-control" placeholder="Repita a senha">
                        <?php
                        if ($msg = get_msg()) { // verifica se existe alguma msg na função get_msg
                            echo "<div class='alert alert-secondary' role='alert'>$msg</div>";
                        }
                        ?>
                        <button class="btn btn-lg btn-success btn-block mt-5" type="submit">Alterar</button>
                    </form>

                    <form class="form-signin text-center" action="<?= base_url("dashboard/tutorial"); ?>" method="post">
                        <input type="checkbox" name="checked">
                        <button class="btn btn-lg btn-danger btn-block mt-5" type="submit">Entendi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>