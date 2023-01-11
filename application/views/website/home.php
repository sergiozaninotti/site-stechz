<?php $this->load->view($nav); ?>

<div class="left-sidebar">
    <div id="logo" class="mt-4">
        <img src="<?= base_url('assets/website/img/white-logo.png') ?>" alt="Stechz - Criamos websites incríveis">
    </div>
    <div class="col line"></div>
    <div class="col text-center p-0">

        <a href="https://www.instagram.com/stechz.studio/">
            <ion-icon name="logo-instagram" class="text-white icons-sidebar mb-4"></ion-icon>
        </a>
        <a href="https://www.facebook.com/stechz.studio/">
            <ion-icon name="logo-facebook" class="text-white icons-sidebar mb-4"></ion-icon>
        </a>
    </div>
</div>
<!--<div class="left-side-down text-center"><label id="sliderIndex">1-2</label></div>-->
<a href="https://api.whatsapp.com/send?phone=5547996392333&text=Olá,%20gostaria%20de%20fazer%20um%20orçamento%20para%20criar%20um%20site%20incrível!">
    <span class="whatsapp wow zoomIn" data-wow-delay="2s"><img src="<?= base_url('assets/website/img/icons/whatsapp.png'); ?>" alt=""></span>
</a>

<section id="hero" class="wow fadeInDown">
    <div class="slider-one">
        <div class="col-lg-12 text-center copy">
            <div class="col-md-6 mx-auto z-index10">
                <h1 id="copy" class="text-white text-left">
                    <p class="d-inline-block wow fadeInDown" data-wow-delay="1s">creative</p> <br>
                    <p class="mlf-special6 wow fadeInUp" data-wow-delay="1.5s">studio</p>
                </h1>
                <span class="steam"></span>
                <img class="mx-auto wow fadeInUp" data-wow-delay=".5s" src="<?= base_url('assets/website/img/coffe-mug.png'); ?>" alt="">
            </div>
            <h3 class="text-white mt-5 wow zoomIn" data-wow-delay="1.75s" id="description">Criamos sites incríveis para empresas incríveis
                <!--<ion-icon name="ios-heart" class="icon-50 text-white animated infinite pulse" data-wow-delay="2s"></ion-icon>-->
            </h3>
        </div>

    </div>

</section>

<section id="nossos-servicos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto our-services text-center">
                <h3 class="nunito-regular wow fadeIn text-center">Sua empresa merece um site incrível</h3>
                <h2 class="text-center purple mb-5 pb-4 nunito-extrabold wow fadeIn" data-wow-delay="0.25s">Conheça nossos serviços</h2>
                <div class="col-md-3 d-inline-block">
                    <div id="card1" class="card mb-5 wow fadeIn" data-wow-delay="0.75s">
                        <div class="card-icon card1">
                            <ion-icon name="ios-code-working" class="icon-services"></ion-icon>
                        </div>
                        <div class="card-body">
                            <h4 class="">Criação de Sites</h4>
                            <p class="card-text">Desenvolvemos sites com alto padrão de design e desempenho para clientes exigentes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-inline-block">
                    <div class="card wow fadeIn" data-wow-delay="1.25s" id="card3">
                        <div class="card-icon card3">
                            <ion-icon name="ios-mail" class="icon-services"></ion-icon>
                        </div>
                        <div class="card-body">
                            <h4 class="">E-mail Profissional</h4>
                            <p class="card-text">Proporcionamos até 5 contas de e-mail profissional totalmente grátis para clientes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-inline-block">
                    <div class="card mb-5 wow fadeIn" data-wow-delay="1s" id="card2">
                        <div class="card-icon card2">
                            <ion-icon name="ios-cloud" class="icon-services"></ion-icon>
                        </div>
                        <div class="card-body">
                            <h4 class="">Hospedagem</h4>
                            <p class="card-text">Crie um site com a Stechz e ganhe a hospedagem totalmente gratuíta por até 6 meses.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-inline-block">
                    <div class="card wow fadeIn" data-wow-delay="1.5s" id="card4">
                        <div class="card-icon card4">
                            <ion-icon name="logo-google" class="icon-services"></ion-icon>
                        </div>
                        <div class="card-body">
                            <h4 class="">Seo Google</h4>
                            <p class="card-text">Desenvolvemos seu site com as melhores práticas de SEO para você estar bem ranqueado no google.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mx-auto">
                    <a href="<?= base_url('nossos-servicos'); ?>"><span class="span-km1"><button class="btn btn-primary">CONHEÇA NOSSOS SERVIÇOS</button></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="nossos-pilares">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center text-default-color mt-3 font-50 wow fadeInUp">Nossos Pilares</h2>
                <h3 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.5s">Conheça o que a Stechz prioriza para criar o seu site incrível</h3>
                <div class="col-md-3 pillar p1 wow fadeInUp">
                    <h2 class="pillar-description">#01 <br> Design criativo</h2>
                </div>
                <div class="col-md-3 pillar p2 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="pillar-description">#02 <br> Experiência do usuário</h2>
                </div>
                <div class="col-md-3 pillar p3 wow fadeInUp" data-wow-delay="1s">
                    <h2 class="pillar-description">#03 <br>Alto desempenho</h2>
                </div>
                <div class="col-md-3 pillar p4 wow fadeInUp" data-wow-delay="1.5s">
                    <h2 class="pillar-description">#04 <br>Inovação impactante</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portifolio" class="wow bounceInUp">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 126" style="enable-background:new 0 0 1440 126;position: absolute;top: -1px;transform: rotate(180deg);" xml:space="preserve">
        <style type="text/css">
            .st01 {
                fill: #ffffff !important;
            }
        </style>
        <title>Rectangle 3</title>
        <desc>Created with Sketch.</desc>
        <path class="st01" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"></path>
    </svg>
    <!-- <div class="waves"><img src="<?= base_url('assets/website/img/waves.png') ?>" alt=""></div>
        <div class="waves line"><img src="<?= base_url('assets/website/img/lines.png') ?>" alt=""></div> -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-12 text-center pb-5">
                <h2 class="text-white">Portifólio</h2>
                <div class="col-md-4 works w1 wow fadeIn" data-wow-delay="0.5s">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?= base_url('assets/website/img/projects/valeapena1.png') ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Projeto Vale a Pena</h4>
                            <div class="col-sm-12 mt-2">
                                <span class="badge bg-pink text-white">SITE</span>
                                <span class="badge bg-pink text-white">SEO</span>
                                <span class="badge bg-pink text-white">EMAIL</span>
                                <span class="badge bg-pink text-white">HOSPEDAGEM</span>
                            </div>
                            <a href="<?= base_url('projetos-finalizados/valeapena'); ?>"><button class="btn btn-primary mt-3">Ver projeto</button></a>
                        </div>
                    </div>
                    <!--  <span><img src="<?= base_url('assets/website/img/projects/valeapena1.png') ?>"></span>
                    <div class="col-sm-12 mt-2">
                        <span class="badge bg-pink text-white">SITE</span>
                        <span class="badge bg-pink text-white">SEO</span>
                        <span class="badge bg-pink text-white">EMAIL</span>
                        <span class="badge bg-pink text-white">HOSPEDAGEM</span>
                    </div>
                    <button class="btn btn-primary mt-3">Ver projeto</button>-->

                </div>
                <div class="col-md-4 works w2 wow fadeIn" data-wow-delay="1s">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?= base_url('assets/website/img/projects/credsoft1.jpg') ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Projeto CredSoft</h4>
                            <div class="col-sm-12 mt-2">
                                <span class="badge bg-pink text-white">SITE</span>
                                <span class="badge bg-pink text-white">HOSPEDAGEM</span>
                            </div>
                            <a href="<?= base_url('projetos-finalizados/credsoft'); ?>"><button class="btn btn-primary mt-3">Ver projeto</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 126" style="enable-background:new 0 0 1440 126;position: absolute;bottom: 0;" xml:space="preserve">
        <style type="text/css">
            .st0 {
                fill: #fafbfd !important;
            }
        </style>
        <title>Rectangle 3</title>
        <desc>Created with Sketch.</desc>
        <path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"></path>
    </svg>
</section>

<!--<section id="budget">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">
                <h2 class="text-center purple">Pronto para ter seu site incrível?</h2>
                <h3>Solicite um orçamento</h3>

                <form class="grop-from" id="signup">
                    <div class="form-head"><span class="text"> </span><i class="icon-placeholder"></i></div>
                    <div class="form-body"><span class="error-text">Please Fill Out This Field</span>
                        <div class="form-controls">
                            <input type="text" id="control-name" placeholder="Qual seu nome?" required />
                            <input type="tel" id="control-phone" placeholder="Telefone" required />
                            <input type="email" id="control-email" placeholder="Email" required />
                            <input id="control-password" placeholder="Password" type="password" />
                            <input id="control-password-repeat" placeholder="Confirm Password" type="password" />
                        </div>
                    </div><a class="form-action"><i class="icon-action"></i></a>
                </form>

            </div>
        </div>
    </div>
   
</section>
        -->

<section id="who-we-are">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">
                <div class="col-lg-6 d-inline-block align-top" id="logo-stechz">
                    <h2 class="wow fadeIn">Nós somos a stechz</h2>
                    <p class="text-left wow fadeIn" data-wow-delay="0.5s">Somos especialistas em desenvolvimento de sites incríveis, com um espírito jovem e criativo buscamos soluções inovadoras e eficazes para nossos clientes.
                        Acreditamos que o design e a praticidade são essenciais neste universo digital, por isto a stechz tem como prioridade focar na experiência do usuário.
                        Com este pensamento dizemos que não criamos apenas um site, e sim, uma esperiência digital para sua empresa.<br><label> Somos um Stúdio Digital, que conta com desenvolvedores capacitados para cuidar do seu projeto.</label>
                    </p>
                </div>

                <div class="col-lg-5 d-inline-block mt-5">

                </div>

            </div>
        </div>
    </div>
</section>

<?php $this->load->view($contato); ?>

<div class="waves-footer"><img src="<?= base_url('assets/website/img/waves.png') ?>" alt=""></div>

<style>
    #contato{
        padding-top: 60px;
    }
</style>