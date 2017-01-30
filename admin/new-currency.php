<!DOCTYPE html>
<html lang="en" ng-app="web_app">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exchange Rates Manager</title>
    
        <!-- Vendor CSS -->
        <link href="assets/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="assets/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="assets/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="assets/vendors/socicon/socicon.min.css" rel="stylesheet">
        <link href="assets/vendors/flag-icon/css/flag-icon.min.css" rel="stylesheet">
        <link href="assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="assets/bower_components/angular/angular-csp.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="assets/css/app.min.1.css" rel="stylesheet">
        <link href="assets/css/app.min.2.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
    </head>
    
    <body ng-controller="CurrencyCtrl" ng-cloak>
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
                    <a href="index.html">Exchange Rates Manager</a>
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
                                        <i class="md md-fullscreen"></i> Tela Inteira
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
                                    <img src="img/profile-pics/2.jpg" alt="">
                                </div>
                
                                <div class="profile-info">
                                    Worker Man
                                </div>
                            </a>
                        </div>
                
                        <ul class="main-menu">
                            <li>
                                <a href="index.html">
                                    <i class="md md-settings"></i> Configurações de Moedas
                                </a>
                            </li>
                            <li class="active">
                                <a href="new-currency.html">
                                    <i class="md md-plus-circle-o"></i> Cadastro de Moeda
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Cadastro de Moeda</h2>
                    </div>
                
                    <div class="card">
                        <div class="card-header p-b-0">
                            <h2>
                                Informações gerais
                            </h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">Código</label>
                                        <input type="text" class="form-control text-uppercase" maxlength="3"
                                            ng-model="currency.code_iso_alpha_3">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">Descrição</label>
                                        <input type="text" class="form-control"
                                            ng-model="currency.name">
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">País</label>
                                        <select id="state" class="form-control">
                                            <option>&nbsp;</option>
                                            <option ng-repeat="cnt in countries" value="{{ cnt.iso_alpha_2 }}">
                                                {{ cnt.country_name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">Source Link <i class="md md-link"></i></label>
                                        <input type="text" class="form-control text-lowercase"
                                            ng-model="currency.sourceLink">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group fg-line select m-b-10">
                                        <label class="form-label">Worker</label>
                                        <select id="worketFormatter" class="form-control"
                                            ng-model="currency.workerFormatter">
                                            <option value="JSON" selected="selected">JSON File</option>
                                            <option value="XML" disabled="disabled">XML File</option>
                                            <option value="HTML" disabled="disabled">HTML Page</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">Atual. Automática</label>
                                        <div class="toggle-switch" data-ts-color="green">
                                            <input id="ts_compra" type="checkbox" hidden="hidden"
                                                ng-model="currency.externalRefresh">
                                            <label for="ts_compra" class="ts-helper"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="pull-right">
                        <button type="button" 
                            class="btn btn-primary btn-lg waves-effect waves-button waves-float"
                            ng-click="save()">
                            <i class="md md-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </section>
        </section>
    
        <!-- Javascript Libraries -->
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        
        <script src="assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="assets/vendors/input-mask/input-mask.min.js"></script>
        <script src="assets/vendors/auto-size/jquery.autosize.min.js"></script>
        <script src="assets/vendors/waves/waves.min.js"></script>
        <script src="assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="assets/vendors/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/vendors/select2/dist/js/select2.min.js"></script>
        <script src="assets/bower_components/moment/moment.js" type="text/javascript"></script>
        <script src="assets/bower_components/moment/locale/pt-br.js" type="text/javascript"></script>
        <script src="assets/bower_components/angular/angular.min.js"></script>
        <script src="assets/js/angular-locale_pt-br.js" type="text/javascript"></script>
        <script src="assets/bower_components/angular-input-masks/angular-input-masks-standalone.min.js" type="text/javascript"></script>
        
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/extras.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>