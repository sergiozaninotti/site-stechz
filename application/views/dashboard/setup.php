<section id="setup_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form class="form-signin text-center" action="<?= base_url("setup/instalar");?>" method="post">                
                    <h1 class="h3 mb-3 font-weight-normal mb-4"><?= $page_title; ?></h1>

                    <label for="username" class="sr-only">Nome de Usuário</label>
                    <input type="text" name="username" class="form-control" placeholder="Nome de Usuário" autofocus required>

                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>

                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" name="password" class="form-control" placeholder="Senha" required>

                    <label for="inputPassword" class="sr-only">Repita a senha</label>
                    <input type="password" name="password_match" class="form-control" placeholder="Repita a senha" required>
                    
                    <input type="text" name="" hidden>

                    <?php 
                    if($msg = get_msg()){ // verifica se existe alguma msg na função get_msg
                        echo "<div class='alert alert-secondary' role='alert'>$msg</div>";
                    }
                    ?>
                    <button class="btn btn-lg btn-success btn-block mt-5" type="submit">Configurar</button>
                </form>
            </div>
        </div>
    </div>
</section>