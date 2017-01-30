<!DOCTYPE html>
<?php
    require_once('util/HttpUtil.php');
    $response = json_decode(HttpUtil::doGetRequest('http://localhost:8080/banner', null));
    $banners = array();
    if(!empty($response)) {
        foreach ($response as $banner) {
            $display_location = $banner->display_location;
            if (isset($banners[$display_location])) {
                $banners[$display_location][] = $banner;
            } else {
                $banners[$display_location] = array($banner);
            }
        }
    }
?>

<html ng-app="web_app">
    <head>
        <title>Grupo Moema Interpax Turismo</title>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
        <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="assets/bower_components/angucomplete-alt/angucomplete-alt.css">
        <link rel="stylesheet" type="text/css" href="assets/bower_components/angular-datepicker/dist/angular-datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/flag-icon/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/pace/pace.css">
        <!-- CHAMADA ESTILO DA HOME -->
        <link rel="stylesheet" type="text/css" href="assets/css/home.css">
        
        <style type="text/css">
            div.pace-div {
                position: absolute;
                width: 100%;
                height: 100%;
                background-color: #000;
                z-index: 1000;
                opacity: 0.6;
            }
        </style>

        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script type="text/javascript">
            window.paceOptions = {
                ajax: {
                    ignoreURLs: ['script.php']
                }
            };
        </script>
    </head>
    <body ng-controller="HomeCtrl" ng-cloak>
        <div class="pace-div"></div>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <!-- menu contact -->
                    <section class="menu-contact col-md-12 no-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <nav class="content-contact pull-left">
                                        <ul class="nav nav-pills">
                                            <li>
                                                <a href="#" id="email-contact">
                                                    <i class="fa fa-envelope"></i><!-- icon -->
                                                    <span>suporte@moematurismo.com.br</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" id="tel-contact">
                                                    <i class="fa fa-phone""></i><!-- icon -->
                                                    <span class="hidden-xs">(11) 3217-9900</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-6">
                                    <nav class="content-social pull-right">
                                        <ul class="nav nav-pills">
                                            <li>
                                                <a href="https://www.facebook.com/decolandomoemaviagens" target="_blank">
                                                    <i class="fa fa-facebook"></i><!-- icon -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.youtube.com/watch?v=MsvMFuvJOQY" target="_blank">
                                                    <i class="fa fa-youtube"></i><!-- icon -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/moematurismo" target="_blank">
                                                    <i class="fa fa-twitter"></i><!-- icon -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/decolandomoemainstagram" target="_blank">
                                                    <i class="fa fa-instagram"></i><!-- icon -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.linkedin.com/in/grupo-moema-interpax-turismo-decolandomoema-com-77a93a57" target="_blank">
                                                    <i class="fa fa-linkedin"></i><!-- icon -->
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://plus.google.com/+GrupoMoemaInterpaxTurismoDecolandoMoemacomS%C3%A3oPaulo" target="_blank">
                                                    <i class="fa fa-google"></i><!-- icon -->
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- menu top  -->
                    <section class="menu-top col-md-12 no-padding">
                        <nav class="navbar">
                            <div class="container">
                                <div class="row">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        </button>
                                        <h1>Moema Interpax Turismo
                                            <a class="navbar-brand" href="#">
                                            <img src="assets/img/logo_moema_interpax.png" alt="Logo Moema Interpax Turismo" class="img-responsive">
                                            </a>
                                        </h1>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#" class="active">Inicio</a></li>
                                            <li><a href="#">Hotéis</a></li>
                                            <li><a href="#">Passagens Aéreas</a></li>
                                            <li><a href="#">Seguros</a></li>
                                            <li><a href="#">Atendimento</a></li>
                                            <li><a href="#">City Tour</a></li>
                                            <li><a href="#">Corporativo</a></li>
                                            <li><a href="#">Câmbio</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                        </nav>
                    </section>
                </div>
            </div>
        </header>

        <!-- Banner top home -->
        <section class="banner-home">
            <!-- background image for banner -->
            <?php
                if (!empty($banners) && !empty($banners['carousel'])) {
            ?>
            <style type="text/css">
                .banner-home {
                    background-image: url('http://localhost:8080/<?=(str_replace("assets", "", $banners['carousel'][0]->source))?>');
                }
            </style>
            <?
                }
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 pull-right no-padding hidden-xs">
                        <?php
                            if (!empty($banners) && !empty($banners['carousel'])) {
                        ?>
                        <!-- text for banner -->
                        <section class="text-banner pull-right">
                            <h2 class="text-uppercase text-right"> 
                                <span class="line-1"><?=($banners['carousel'][0]->text_line_1)?></span></br>
                                <span class="line-2"><?=($banners['carousel'][0]->text_line_2)?></span></br>
                                <span class="line-3"><?=($banners['carousel'][0]->text_line_3)?></span>
                            </h2>
                        </section>
                        <?
                            }
                        ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 no-padding">
                        <!-- initiation of box inputs -->
                        <section class="form-search-fly">
                            <div class="col-xs-12 col-sm-12">
                                <!-- bar -->
                                <section class="bar-top-search">
                                    <nav class="nav-search">
                                        <ul class="nav nav-pills">
                                            <li>
                                                <a href="" 
                                                    ng-class="{'active':  (pesquisa.type == 'flights')}"
                                                    ng-click="pesquisa.type = 'flights'">
                                                    <i class="zmdi zmdi-airplane search-icon"></i>
                                                    VOOS
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" 
                                                    ng-class="{'active':  (pesquisa.type == 'hotels')}"
                                                    ng-click="pesquisa.type = 'hotels'">
                                                    <i class="zmdi zmdi-hotel search-icon"></i>
                                                    HOTÉIS
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" 
                                                    ng-class="{'active':  (pesquisa.type == 'packages')}"
                                                    ng-click="pesquisa.type = 'packages'">
                                                    <i class="zmdi zmdi-mall search-icon"></i>
                                                    PACOTES
                                                </a>
                                            </li>
                                            <!--<li>
                                                <a href="" ng-click="pesquisa.type = ''">
                                                    <img src="assets/img/ico-car.png">
                                                    CARROS
                                                </a>
                                            </li>-->
                                        </ul>
                                    </nav>
                                </section>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <!-- inputs -->
                                <section class="box-form">
                                    <h3 class="text-uppercase text-center">
                                        Pesquisar {{ getSearchTitle() }}
                                    </h3>
                                    <form>
                                        <!-- radios -->
                                        <div class="col-xs-12 col-sm-12" ng-show="(pesquisa.type == 'flights')">
                                            <div class="radios-button">
                                                <label class="radio-inline">
                                                    <input type="radio" name="way_direction" value="1" ng-model="pesquisa.way_direction"> Ida e Volta
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="way_direction" value="2" ng-model="pesquisa.way_direction"> Somente Ida
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <!-- first box inputs -->
                                        <div class="col-xs-12 col-sm-12 no-padding">
                                            <div class="first-box-inputs">
                                                <label for="origem" class="col-xs-3 col-sm-3 col-md-2 control-label text-right no-padding"
                                                    ng-show="(pesquisa.type == 'flights')">
                                                    <i class="zmdi zmdi-flight-takeoff"></i> Origem:
                                                </label>
                                                <div class="col-xs-9 col-sm-9 col-md-10 no-padding padding-left"
                                                    ng-show="(pesquisa.type == 'flights')">
                                                    <angucomplete-alt
                                                        pause="300"
                                                        selected-object="pesquisa.origem"
                                                        remote-url="script.php?t={{ pesquisa.type }}&q="
                                                        remote-url-data-field="autocomplete"
                                                        title-field="name"
                                                        text-searching="Aguarde, pesquisando..."
                                                        minlength="1"
                                                        input-class="form-control form-control-small"
                                                        match-class="highlight" />
                                                </div>
                                                
                                                <div class="clearfix" ng-show="(pesquisa.type == 'flights')"></div>
                                                
                                                <label for="destino" class="col-xs-3 col-sm-3 col-md-2 control-label text-right no-padding"
                                                    ng-show="(pesquisa.type == 'flights')">
                                                    <i class="zmdi zmdi-flight-land"></i> Destino:
                                                </label>
                                                <div class="col-xs-9 col-sm-9 col-md-10 no-padding padding-left"
                                                    ng-show="(pesquisa.type == 'flights')">
                                                    <angucomplete-alt
                                                        pause="300"
                                                        selected-object="pesquisa.destino"
                                                        remote-url="script.php?t={{ pesquisa.type }}&q="
                                                        remote-url-data-field="autocomplete"
                                                        title-field="name"
                                                        text-searching="Aguarde, pesquisando..."
                                                        minlength="1"
                                                        input-class="form-control form-control-small"
                                                        match-class="highlight" />
                                                </div>

                                                <label for="destino" class="col-xs-3 col-sm-3 col-md-2 control-label text-right no-padding"
                                                    ng-show="(pesquisa.type == 'hotels')">
                                                    <i class="zmdi zmdi-flight-land"></i> Destino:
                                                </label>
                                                <div class="col-xs-9 col-sm-9 col-md-10 no-padding padding-left"
                                                    ng-show="(pesquisa.type == 'hotels')">
                                                    <angucomplete-alt
                                                        pause="300"
                                                        selected-object="pesquisa.destino"
                                                        remote-url="script.php?t={{ pesquisa.type }}&q="
                                                        title-field="description"
                                                        text-searching="Aguarde, pesquisando..."
                                                        minlength="1"
                                                        input-class="form-control form-control-small"
                                                        match-class="highlight" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12">
                                            <!-- second box inputs -->
                                            <div class="row second-box-inputs">
                                                <div class="col-xs-offset-1 col-sm-offset-2 col-md-offset-3 col-xs-5 col-sm-4 col-md-3 no-padding">
                                                    <div class="form-group data-ida">
                                                        <label for="dataDeIda" class="no-padding">
                                                            <i class="zmdi zmdi-calendar"></i> Ida:
                                                        </label>
                                                        <input type="text" class="form-control text-center" id="dataDeIda"
                                                            ng-model="pesquisa.data_ida" date-time
                                                            min-view="date" max-view="date" format="DD/MM/YYYY">
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 no-padding padding-left" ng-show="(pesquisa.way_direction == 1)">
                                                    <div class="form-group">
                                                        <label for="dataDeVolta" class="no-padding">
                                                            <i class="zmdi zmdi-calendar"></i> Volta:
                                                        </label>
                                                        <input type="text" class="form-control text-center" id="dataDeVolta"
                                                            ng-model="pesquisa.data_volta" date-time min-date="pesquisa.data_ida"
                                                            min-view="date" max-view="date" format="DD/MM/YYYY">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row third-box-inputs">
                                                <div class="col-xs-offset-1 col-sm-offset-2 col-md-offset-2 col-xs-5 col-sm-4 col-md-3 no-padding"
                                                    ng-show="(pesquisa.type == 'hotels')">
                                                    <div class="form-group adultos">
                                                        <label for="adultos" class="text-center no-padding">
                                                            <i class="zmdi zmdi-home"></i> Quartos:
                                                        </label>
                                                        <input type="number" class="form-control text-center" id="adultos"
                                                            ng-model="pesquisa.qtd_quartos">
                                                    </div>
                                                </div>
                                                <div class="{{ (pesquisa.type == 'hotels') ? 'padding-left' : 'col-xs-offset-1 col-sm-offset-2 col-md-offset-3' }} col-xs-5 col-sm-4 col-md-3 no-padding">
                                                    <div class="form-group adultos">
                                                        <label for="adultos" class="text-center no-padding">
                                                            <i class="zmdi zmdi-male-female"></i> Adultos:
                                                        </label>
                                                        <input type="number" class="form-control text-center" id="adultos"
                                                            ng-model="pesquisa.qtd_adultos">
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 no-padding padding-left">
                                                    <div class="form-group childs">
                                                        <label for="criancas" class="text-center no-padding"
                                                            data-toggle="tooltip" title="(2 a 11 anos)">
                                                            <i class="zmdi zmdi-run"></i> Crianças
                                                        </label>
                                                        <input type="number" class="form-control text-center" id="criancas"
                                                            ng-model="pesquisa.qtd_criancas">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 no-padding"
                                            style="{{ (pesquisa.type != 'flights') ? 'margin-top: 73px;' : '' }}">
                                            <p class="text-center call-for-submit">
                                                Clique em procurar e garanta o <span><i class="fa fa-dollar"></i> Menor Preço</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="btn-submit">
                                                <button type="button" class="btn btn-default"
                                                    ng-click="searchRedirect()">
                                                    PROCURAR
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- end row section banner top -->

        <!-- section small banners  -->
        <section class="small-banners">
            <div class="container">
                <div class="row">
                    <div class="small-banners-box">
                        <?php
                            if (!empty($banners) && !empty($banners['fixed'])) {
                                if(!empty($banners['fixed'][0])) {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 no-padding padding-left padding-right">
                            <a href="{{ banners.fixed.image1.link }}" target="_blank">
                                <img src="http://localhost:8080/<?=(str_replace('assets', '', $banners['fixed'][0]->source))?>" class="img-responsive">
                            </a>
                        </div>
                        <?
                                }
                                if(!empty($banners['fixed'][1])) {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 no-padding padding-left padding-right">
                            <a href="<?=($banners['fixed'][1]->link)?>" target="_blank">
                                <img src="http://localhost:8080/<?=(str_replace('assets', '', $banners['fixed'][1]->source))?>" class="img-responsive">
                            </a>
                        </div>
                        <?
                                }
                                if(!empty($banners['fixed'][2])) {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 no-padding padding-left padding-right">
                            <a href="<?=($banners['fixed'][2]->source.link)?>" target="_blank">
                                <img src="http://localhost:8080/<?=(str_replace('assets', '', $banners['fixed'][2]->source))?>" class="img-responsive">
                            </a>
                        </div>
                        <?
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end small banners  -->

        <!-- section hoteis promo -->
        <section class="hoteis-promo" ng-repeat="offer in offers" ng-show="(offer.show)">
            <div class="bar-hoteis-promo col-xs-12 col-sm-12 no-padding">
                <h3 class="text-uppercase text-center">{{ offer.title }}</h3>
            </div>
            <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                    <div class="small-banners-hoteis">
                        <a class="link-slider" href="{{ adItem.link }}" target="_blank" 
                            ng-repeat="adItem in offer.items" ng-show="(adItem.show)">
                            <div class="box-selo" ng-show="(adItem.is_promotion == true)">
                                <p class="selo">
                                    <span>{{ adItem.promotion_percent | numberFormat : '0' : '' : '' }}%</span> OFF
                                </p>
                            </div>
                            <div class="box-hotel box-hotel-1" style="background-image: url('{{ adItem.background_image }}');">
                                <div class="box-text-hotel">
                                    <h4 class="text-uppercase hotel-name text-center">{{ adItem.title }}</h4>
                                    <p class="call-price-hotel">A partir de:</p>
                                    <p class="price-hotel"><span>R$ </span>{{ adItem.start_price | numberFormat : '0' : '' : '' }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center text-uppercase">Inscreva-se para receber ofertas exclusivas</h3>
                        <p class="text-uppercase text-center">Você vai receber <span>ofertas, dicas e novidades</span> sobre viagens e turismo</p>
                        <p class="text-center subscribe-news">Assine nossa Newsletter</p>
                        <div class="row">
                            <form>
                                <div class="col-xs-12 col-sm-12">           
                                    <input type="email" class="form-control" id="email" placeholder="Insira aqui seu e-mail">
                                </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="btn-submit-newsletter">
                                        <button type="submit" class="btn btn-default">Assinar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="money-news">
            <h3 class="text-center text-uppercase">Cotação do momento</h3>
            <div class="container">
                <div class="row">
                    <div class="box-slider-money-news">
                        
                        <div class="box-money-news" ng-repeat="curr in currencies.currencies">
                            <div class="first-box">
                                <h5 class="text-uppercase text-left">{{ curr.name }}</h5>
                                <div class="firt-box">
                                    <!-- <img src="assets/img/ico-usa.png"> -->
                                    <span class="flag-icon flag-icon-{{ curr.icon | lowercase }}"></span>
                                    <p class="text-left text-uppercase">{{ curr.code_iso_alpha_3 }}</p>
                                </div>

                                <p class="text-left text-uppercase">
                                    Compra R$<span> {{ curr.sourceData.bid | numberFormat : '4' : ',' : '.' }}</span>
                                </p>
                                <p class="text-left text-uppercase">
                                    % de Variação <span>{{ curr.sourceData.pctChange | numberFormat : '4' : ',' : '.' }}%</span>
                                </p>
                                <p class="text-left text-uppercase">
                                    Variação <span>{{ curr.sourceData.varBid | numberFormat : '4' : ',' : '.' }}</span>
                                </p>
                                <p class="text-left text-uppercase">
                                    Últ. Negociação <span>{{ getLastUpdate(curr.sourceData.timestamp, false) }}</span>
                                </p>
                            </div>
                            <!-- <img class="img-responsive img-fluxo" src="assets/img/fluxo.png"> -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-news">
            <div class="container">
                <div class="row">
                    <div class="box-slider-news">
                        <div class="col-sm-12 col-md-3">
                            <h3 class="text-uppercase">Últimas Notícias:</h3>
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="slider-news">
                                <p ng-repeat="notice in news">{{ notice.title }}<small class="clearfix">Fonte: G1 - Portal de Notícias</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer-home">
            <div class="links">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <img src="assets/img/logo_moema_interpax_trans.png" class="img-responsive">
                        </div>

                        <nav class="col-xs-12 col-sm-offset-1 col-sm-3">
                            <ul>
                                <li><a href="">Inicio</a></li>
                                <li><a href="">Hoteis</a></li>
                                <li><a href="">Passagens Aéreas</a></li>
                                <li><a href="">Seguro</a></li>
                            </ul>
                        </nav>
                        <nav class="col-xs-12 col-sm-3">
                            <ul>
                                <li><a href="">Atendimento</a></li>
                                <li><a href="">City Tour</a></li>
                                <li><a href="">Corporativo</a></li>
                                <li><a href="">Câmbio</a></li>
                            </ul>
                        </nav>  
                    </div>
                </div>
            </div>

            <div class="info">
                <div class="container">
                    <p>MOEMA VIAGENS E TURISMO LTDA. - EPP. - CNPJ: 50.596.550/0001-93 - I.E.: ISENTO - CCM-SP: 8.446631-1</p>
                    <p>ABAV: 353 | IATA: 57-7 4466 5 | SNEA: 2135 | SINDETUR: 287 | EMBRATUR: SP-10-50596550000193</p>
                </div>
            </div>
        </footer>

        <!-- Libraries -->
        <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/slick.min.js"></script>
        <script type="text/javascript" src="assets/bower_components/moment/moment.js"></script>
        <script type="text/javascript" src="assets/bower_components/moment/locale/pt-br.js"></script>
        <script type="text/javascript" src="assets/bower_components/angular/angular.min.js"></script>
        <script type="text/javascript" src="assets/js/angular-locale_pt-br.js"></script>
        <script type="text/javascript" src="assets/bower_components/angular-input-masks/angular-input-masks-standalone.min.js"></script>
        <script type="text/javascript" src="assets/bower_components/angucomplete-alt/angucomplete-alt.js"></script>
        <script type="text/javascript" src="assets/bower_components/angular-datepicker/dist/angular-datepicker.js"></script>
        <script type="text/javascript" src="assets/vendors/pace/pace.js"></script>

        <!-- Project Files -->
        <script type="text/javascript" src="assets/js/custom.js"></script>
        <script type="text/javascript" src="assets/js/extras.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/home.js"></script>
        <script type="text/javascript" src="assets/js/controller/home-controller.js"></script>
        <script type="text/javascript">
            Pace.on("start", function(){
                $("div.pace-div").show();
            });

            Pace.on("done", function(){
                $("div.pace-div").hide();
            });
        </script>
    </body>
</html>