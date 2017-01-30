<!DOCTYPE html>
<html ng-app="web_app">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Moema Content Manager</title>
    
        <!-- Vendor CSS -->
        <link href="../assets/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="../assets/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../assets/vendors/socicon/socicon.min.css" rel="stylesheet">
        <link href="../assets/vendors/flag-icon/css/flag-icon.min.css" rel="stylesheet">
        <link href="../assets/bower_components/angular/angular-csp.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="../assets/css/app.min.1.css" rel="stylesheet">
        <link href="../assets/css/app.min.2.css" rel="stylesheet">
        <link href="../assets/css/custom.css" rel="stylesheet">
    </head>
    
    <body ng-controller="BannersCtrl" ng-cloak>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="index.html">Moema Content Manager</a>
                </li>
                
                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a data-toggle="dropdown" class="tm-settings" href=""></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li>
                                    <a data-action="fullscreen" href="">
                                        <i class="zmdi zmdi-fullscreen"></i> Tela Inteira
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        
        <section id="main">
            <aside id="sidebar">
                <div class="sidebar-inner">
                    <div class="si-inner">
                        <div class="profile-menu">
                            <a href="">
                                <div class="profile-pic">
                                    <img src="../assets/img/profile-pics/2.jpg" alt="">
                                </div>
                
                                <div class="profile-info">
                                    Worker Man
                                </div>
                            </a>
                        </div>
                
                        <ul class="main-menu">
                            <li class="sub-menu active">
                                <a href=""><i class="zmdi zmdi-settings"></i> Configurações</a>
                                <ul>
                                    <li><a href="banners.php" class="active">Banners</a></li>
                                    <li><a href="offers.php">Ofertas</a></li>
                                    <li><a href="terms.php">Termos & Tradução</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-accounts"></i> Usuários</a>
                                <ul>
                                    <li><a href="new-user.php">Cadastro</a></li>
                                    <li><a href="users.php">Consulta</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-money-box"></i> Moedas</a>
                                <ul>
                                    <li><a href="new-currency.php">Cadastro</a></li>
                                    <li><a href="taxes.php">Taxas & Cotações</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-file-text"></i> Relatórios</a>
                                <ul>
                                    <li><a href="report-find-history.php">Histórico de pesquisa</a></li>
                                    <li><a href="report-destinations.php">Destinos mais procurados</a></li>
                                    <li><a href="report-registered-users.php">Usuários registrados</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Gerenciador de Banners</h2>
                    </div>
                
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>
                                        Banner Principal
                                        <small>Dimensões: 1600x514</small>
                                    </h2>
                                </div>

                                <div class="card-body">
                                    <img src="{{ (banners.carousel.image1.source != null) ? banners.carousel.image1.source : 'http://lorempixel.com/1600/514' }}">
                                </div>

                                <div class="card-footer">
                                    <div class="row m-b-10">
                                        <div class="col-lg-12 text-center">
                                            <div class="btn btn-default btn-upload">
                                                <i class="zmdi zmdi-image"></i>
                                                <span class="btn-upload-title">Selecione</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" 
                                                    data-display-location="carousel" data-image-index="image1"/>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-upload-clear"
                                                ng-show="(banners.carousel.image1.source != null)"
                                                ng-click="clearImage('carousel','image1')">
                                                <i class="zmdi zmdi-close-circle"></i> Remover
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-0">
                                                <label class="control-label">Texto Linha 1</label>
                                                <input type="text" class="form-control p-l-10" 
                                                    ng-model="banners.carousel.image1.text_line_1"
                                                    ng-change="banners.carousel.image1.changed = true;"></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="control-label">Texto Linha 2</label>
                                                <input type="text" class="form-control p-l-10" 
                                                    ng-model="banners.carousel.image1.text_line_2"
                                                    ng-change="banners.carousel.image1.changed = true;"></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="control-label">Texto Linha 3</label>
                                                <input type="text" class="form-control p-l-10" 
                                                    ng-model="banners.carousel.image1.text_line_3"
                                                    ng-change="banners.carousel.image1.changed = true;"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>
                                        Banner Promocional 1
                                        <small>Dimensões: 447x492</small>
                                    </h2>
                                </div>

                                <div class="card-body">
                                    <img src="{{ (banners.fixed.image1.source != null) ? banners.fixed.image1.source : '../assets/img/447x492.png' }}">
                                </div>

                                <div class="card-footer">
                                    <div class="row m-b-10">
                                        <div class="col-lg-12 text-center">
                                            <div class="btn btn-default btn-upload">
                                                <i class="zmdi zmdi-image"></i>
                                                <span class="btn-upload-title">Selecione</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" 
                                                    data-display-location="fixed" data-image-index="image1"/>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-upload-clear"
                                                ng-show="(banners.fixed.image1.source != null)"
                                                ng-click="clearImage('fixed','image1')">
                                                <i class="zmdi zmdi-close-circle"></i> Remover
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group m-b-0">
                                                <label class="control-label">URL de destino</label>
                                                <input type="text" class="form-control p-l-10" 
                                                    ng-model="banners.fixed.image1.link"
                                                    ng-change="banners.fixed.image1.changed = true;"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>
                                        Banner Promocional 2
                                        <small>Dimensões: 447x492</small>
                                    </h2>
                                </div>

                                <div class="card-body">
                                    <img src="{{ (banners.fixed.image2.source != null) ? banners.fixed.image2.source : '../assets/img/447x492.png' }}">
                                </div>

                                <div class="card-footer">
                                    <div class="row m-b-10">
                                        <div class="col-lg-12 text-center">
                                            <div class="btn btn-default btn-upload">
                                                <i class="zmdi zmdi-image"></i>
                                                <span class="btn-upload-title">Selecione</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" 
                                                    data-display-location="fixed" data-image-index="image2"/>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-upload-clear"
                                                ng-show="(banners.fixed.image2.source != null)"
                                                ng-click="clearImage('fixed','image2')">
                                                <i class="zmdi zmdi-close-circle"></i> Remover
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group m-b-0">
                                                <label class="control-label">URL de destino</label>
                                                <input type="text" class="form-control p-l-10" 
                                                    ng-model="banners.fixed.image2.link"
                                                    ng-change="banners.fixed.image2.changed = true;"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>
                                        Banner Promocional 3
                                        <small>Dimensões: 447x492</small>
                                    </h2>
                                </div>

                                <div class="card-body">
                                    <img src="{{ (banners.fixed.image3.source != null) ? banners.fixed.image3.source : '../assets/img/447x492.png' }}">
                                </div>

                                <div class="card-footer">
                                    <div class="row m-b-10">
                                        <div class="col-lg-12 text-center">
                                            <div class="btn btn-default btn-upload">
                                                <i class="zmdi zmdi-image"></i>
                                                <span class="btn-upload-title">Selecione</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" 
                                                    data-display-location="fixed" data-image-index="image3"/>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-upload-clear"
                                                ng-show="(banners.fixed.image3.source != null)"
                                                ng-click="clearImage('fixed','image3')">
                                                <i class="zmdi zmdi-close-circle"></i> Remover
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group m-b-0">
                                                <label class="control-label">URL de destino</label>
                                                <input type="text" class="form-control p-l-10" 
                                                    ng-model="banners.fixed.image3.link"
                                                    ng-change="banners.fixed.image3.changed = true;"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <button type="button" 
                                    class="btn btn-primary waves-effect waves-button waves-float"
                                    ng-click="saveBanners()">
                                    <i class="zmdi zmdi-save"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    
        <!-- Javascript Libraries -->
        <script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="../assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="../assets/vendors/input-mask/input-mask.min.js"></script>
        <script type="text/javascript" src="../assets/vendors/auto-size/jquery.autosize.min.js"></script>
        <script type="text/javascript" src="../assets/vendors/waves/waves.min.js"></script>
        <script type="text/javascript" src="../assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script type="text/javascript" src="../assets/vendors/sweet-alert/sweet-alert.min.js"></script>
        <script type="text/javascript" src="../assets/bower_components/underscore/underscore-min.js"></script>
        <script type="text/javascript" src="../assets/bower_components/moment/moment.js"></script>
        <script type="text/javascript" src="../assets/bower_components/moment/locale/pt-br.js"></script>
        <script type="text/javascript" src="../assets/bower_components/angular/angular.min.js"></script>
        <script type="text/javascript" src="../assets/js/angular-locale_pt-br.js"></script>
        <script type="text/javascript" src="../assets/bower_components/angular-input-masks/angular-input-masks-standalone.min.js"></script>
        <script type="text/javascript" src="../assets/bower_components/angucomplete-alt/angucomplete-alt.js"></script>
        <script type="text/javascript" src="../assets/bower_components/angular-datepicker/dist/angular-datepicker.min.js"></script>

        <script type="text/javascript" src="../assets/js/functions.js"></script>
        <script type="text/javascript" src="../assets/js/custom.js"></script>
        <script type="text/javascript" src="../assets/js/extras.js"></script>
        <script type="text/javascript" src="../assets/js/app.js"></script>
        <script type="text/javascript" src="../assets/js/controller/banners-controller.js"></script>
    </body>
</html>