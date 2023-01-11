<div class="content">
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Used Space</p>
                        <h3 class="card-title">49/50
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="#pablo">Get More Space...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Revenue</p>
                        <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Last 24 Hours
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Fixed Issues</p>
                        <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Github
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Followers</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-info">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" id="addCourse">
                                    <i class="material-icons">add</i>
                                </button>
                                <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right d-none" id="addTeacher">
                                    <i class="material-icons">add</i>
                                </button>
                                <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right d-none" id="addUser">
                                    <i class="material-icons">add</i>
                                </button>
                                <span class="nav-tabs-title"></span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a id="courses" class="nav-link active" href="#profile" data-toggle="tab">
                                            <i class="material-icons">library_books</i> Eventos
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                   <!-- <li class="nav-item">
                                        <a id="teacher" class="nav-link" href="#messages" data-toggle="tab">
                                            <i class="material-icons">people</i> Professores
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li> 
                                    <li id="user" class="nav-item">
                                        <a class="nav-link" href="#show_users" data-toggle="tab">
                                            <i class="material-icons">person</i> Usuários
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table class="table" id="dt_course">
                                    <thead>
                                        <tr>
                                            <th class="no-sort th-fontSize">#</th>
                                            <th class="dt-center th-fontSize">Nome</th>
                                            <th class="dt-center th-fontSize">Data/Hora</th>
                                            <th class="no-sort th-fontSize">Local</th>
                                            <th class="no-sort th-fontSize">Descrição</th>
                                            <th class="no-sort th-fontSize">Status</th>
                                            <th class="dt-center no-sort th-fontSize">Ações</th>
                                            <!--<th>Local</th>
                                            <th class="text-right">Ações</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="messages">
                                <table class="table" id="dt_teacher">
                                    <thead>
                                        <tr>
                                            <th class="dt-center">Nome</th>
                                            <th class="dt-center no-sort">Foto</th>
                                            <th class="no-sort">Descrição</th>
                                            <th class="no-sort">Descrição</th>
                                            <th class="dt-center no-sort text-center">Ações</th>
                                            <!--<th>Local</th>
                                            <th class="text-right">Ações</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="show_users">
                            <table class="table" id="dt_user">
                                    <thead>
                                        <tr>
                                            <th class="dt-center no-sort">#</th>
                                            <th class="dt-center">Nome</th>
                                            <th class="dt-center no-sort">E-mail</th>
                                            <th class="dt-center no-sort">Status</th>
                                            <th class="dt-center no-sort text-center">Ações</th>
                                            <!--<th>Local</th>
                                            <th class="text-right">Ações</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Teacher Modal -->
<div class="modal fade" id="teachersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Professor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" id="form_teacher">
                    <input id="teacher_id" name="teacher_id" hidden>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome do professor</label>
                        <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <div>
                            <!-- caminho visualização -->
                            <img src="" class="" id="teacher_img_path" alt="" width="200px" height="200px">
                            <label class="btn btn-block btn-primary">
                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar Foto
                                <input type="file" id="btn_upload_teacher_img" class="d-none" accept="image/*">
                            </label>
                            <input id="teacher_img" name="teacher_img" hidden>
                            <span class="help-block"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" name="teacher_description" id="teacher_description" rows="3"></textarea>
                        <span class="help-block"></span>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" id="btn_save_teacher" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Users Modal -->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Usuários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" id="form_users">
                    <input id="user_id" name="user_id" hidden>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Usuário</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome completo</label>
                        <input type="text" class="form-control" name="user_full_name" id="user_full_name" placeholder="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <div>
                            <!-- caminho visualização -->
                            <img src="" class="" id="user_img_path" alt="" width="200px" height="200px">
                            <label class="btn btn-block btn-primary">
                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Enviar foto
                                <input type="file" id="btn_upload_user_img" class="d-none" accept="image/*">
                            </label>
                            <input id="user_img" name="user_img" hidden>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-mail</label>
                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Confirmar e-mail</label>
                        <input type="email" class="form-control" name="user_email_match" id="user_email_match" placeholder="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Senha</label>
                        <input type="password" class="form-control" name="user_password" id="user_password" placeholder="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Confirmar senha</label>
                        <input type="password" class="form-control" name="user_password_match" id="user_password_match" placeholder="">
                        <span class="help-block"></span>
                    </div>

                    <input type="number" class="form-control" name="user_status" id="user_status" value="1" placeholder="" hidden>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" id="btn_save_user" class="btn btn-primary">Salvar</button>
                <span class="help-block"></span>
            </div>
            </form>
        </div>
    </div>
</div>