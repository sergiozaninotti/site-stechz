<div class="content" id="overview">
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
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Cabeçalho</h4>
                        <button class="btn btn-primary btn-block" id="alterarCabecalho">Alterar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Banner Principal</h4>
                        <button class="btn btn-primary btn-block" id="banner">Alterar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Cabeçalho</h4>
                        <button class="btn btn-primary btn-block">Alterar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">
                                star
                            </i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Seo</h4>
                        <button class="btn btn-primary btn-block">Configurar</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- ALTERAR CABEÇALHO -->
<div class="modal fade" id="cabecalhoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-6">
                                <form action="" id="form_cabecalho">
                                    <input id="cabecalho_id" name="cabecalho_id" hidden>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nome do evento</label>
                                        <input type="text" class="form-control" id="cabecalho_name" name="cabecalho_name" placeholder="">
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <!-- caminho visualização -->
                                            <img src="" class="" id="cabecalho_img_path" alt="" width="200px" height="200px">
                                            <label class="btn btn-block btn-primary">
                                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar imagem
                                                <input type="file" id="btn_upload_cabecalho_img" class="d-none" accept="image/*">
                                            </label>
                                            <input id="cabecalho_img" name="cabecalho_img1" hidden>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="text" class="form-control" id="event_date" name="event_date" id="datepicker" data-timepicker="true" data-language='pt' />
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Local</label>
                                        <input type="text" class="form-control" id="event_location" name="event_location" placeholder="">
                                        <span class="help-block"></span>
                                    </div>

                                    <!--<div class="form-group">
                        <label>Duração(h)</label>
                        <input type="number" step="0.1" class="form-control" name="cabecalho_duration" id="cabecalho_duration" placeholder="">
                        <span class="help-block"></span>
                    </div>-->
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descrição</label>
                                        <textarea class="form-control" name="cabecalho_description" id="cabecalho_description" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Link do evento</label>
                                        <input type="text" class="form-control" id="event_link" name="event_link" placeholder="">
                                        <span class="help-block"></span>
                                    </div>

                                    <input type="number" name="active" value="1" hidden>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" id="btn_save_cabecalho" class="btn btn-primary">Salvar</button>
                                    <span class="help-block"></span>
                                </form>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        border-radius: 0;
    }

    .modal-dialog {
        margin: 0;
        max-width: 100%;
    }

    .modal-body {
        height: 100vh;
        max-height: 650px;
    }
</style>