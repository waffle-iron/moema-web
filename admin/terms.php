<!DOCTYPE html>
<html lang="en" ng-app="web_app">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Moema Content Manager</title>
    
        <!-- Vendor CSS -->
        <link href="assets/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="assets/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="assets/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="assets/vendors/socicon/socicon.min.css" rel="stylesheet">
        <link href="assets/vendors/flag-icon/css/flag-icon.min.css" rel="stylesheet">
        <link href="assets/bower_components/angular/angular-csp.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="assets/css/app.min.1.css" rel="stylesheet">
        <link href="assets/css/app.min.2.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
    </head>
    
    <body ng-controller="ContentManagerCtrl" ng-cloak>
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
                                    <img src="img/profile-pics/2.jpg" alt="">
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
                                    <li><a href="index.html" class="active">Conteúdos Dinâmicos</a></li>
                                    <li><a href="list-user.html">Termos & Tradução</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-accounts"></i> Usuários</a>
                                <ul>
                                    <li><a href="new-user.html">Cadastro</a></li>
                                    <li><a href="list-user.html">Consulta</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-money-box"></i> Moedas</a>
                                <ul>
                                    <li><a href="new-currency.html">Cadastro</a></li>
                                    <li><a href="taxes.html">Taxas & Cotações</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Conteúdos Dinâmicos</h2>
                    </div>
                
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="card">
                                <div class="card-header p-b-0 ch-alt">
                                    <h2>
                                        Banner Principal (Rotativo)
                                        <small>Dimensões: 937x223</small>
                                    </h2>
                                </div>

                                <div class="card-body">
                                    <ul class="tab-nav tn-justified tn-icon" role="tablist">
                                        <li role="presentation" class="active">
                                            <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">
                                                1
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">
                                                2
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a class="col-xs-4" href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab">
                                                3
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a class="col-xs-4" href="#tab-4" aria-controls="tab-4" role="tab" data-toggle="tab">
                                                4
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a class="col-xs-4" href="#tab-5" aria-controls="tab-" role="tab" data-toggle="tab">
                                                5
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated fadeIn in active" id="tab-1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img src="http://placehold.it/937x225?text=IMG1">
                                                </div>
                                            </div>

                                            <div class="row m-t-10">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" 
                                                        class="btn btn-bluegray waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-image"></i> Selecionar
                                                    </button>

                                                    <button type="button" 
                                                        class="btn btn-danger waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-close-circle"></i> Remover
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane animated fadeIn" id="tab-2">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img src="http://placehold.it/937x225?text=IMG2">
                                                </div>
                                            </div>

                                            <div class="row m-t-10">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" 
                                                        class="btn btn-bluegray waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-image"></i> Selecionar
                                                    </button>

                                                    <button type="button" 
                                                        class="btn btn-danger waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-close-circle"></i> Remover
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane animated fadeIn" id="tab-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img src="http://placehold.it/937x225?text=IMG3">
                                                </div>
                                            </div>

                                            <div class="row m-t-10">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" 
                                                        class="btn btn-bluegray waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-image"></i> Selecionar
                                                    </button>

                                                    <button type="button" 
                                                        class="btn btn-danger waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-close-circle"></i> Remover
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane animated fadeIn" id="tab-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img src="http://placehold.it/937x225?text=IMG4">
                                                </div>
                                            </div>

                                            <div class="row m-t-10">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" 
                                                        class="btn btn-bluegray waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-image"></i> Selecionar
                                                    </button>

                                                    <button type="button" 
                                                        class="btn btn-danger waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-close-circle"></i> Remover
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane animated fadeIn" id="tab-5">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img src="http://placehold.it/937x225?text=IMG5">
                                                </div>
                                            </div>

                                            <div class="row m-t-10">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" 
                                                        class="btn btn-bluegray waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-image"></i> Selecionar
                                                    </button>

                                                    <button type="button" 
                                                        class="btn btn-danger waves-effect waves-button waves-float">
                                                        <i class="zmdi zmdi-close-circle"></i> Remover
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header p-b-0 ch-alt">
                                    <h2>
                                        Ofertas
                                        <small>Configuração de blocos de ofertas, ordem e itens ofertados</small>
                                    </h2>
                                    <ul class="actions">
                                        <li class="dropdown action-show open">
                                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#" ng-click="showNewOfferGroupModal()">Criar novo grupo de ofertas</a>
                                                </li>
                                                <li>
                                                    <a href="#">Atualizar lista</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="card-body card-padding">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th width="80" class="text-center text-middle">Ações</th>
                                                    <th width="80" class="text-center text-middle">Ordem</th>
                                                    <th width="150" class="text-middle">Campanha</th>
                                                    <th class="text-middle">Título</th>
                                                    <th width="80" class="text-center text-middle">Anúncios</th>
                                                    <th width="50" class="text-center text-middle">Exibir?</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center text-middle">
                                                            <button class="btn btn-xs btn-warning">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            <button class="btn btn-xs btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> 
                                                            </button>
                                                        </td>
                                                        <td class="text-center text-middle">
                                                            <input type="text" class="form-control input-xs text-center">
                                                        </td>
                                                        <td class="text-middle">Hotéis</td>
                                                        <td class="text-middle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</td>
                                                        <td class="text-center text-middle">9</td>
                                                        <td class="text-center text-middle">
                                                            <span class="label label-success">SIM</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="pull-right">
                        <button type="button" 
                            class="btn btn-primary waves-effect waves-button waves-float"
                            ng-click="save()">
                            <i class="zmdi zmdi-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </section>
        </section>

        <div class="modal fade" id="modalNewOfferGroup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="zmdi zmdi-plus-circle"></i>
                            Grupo de Ofertas
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="well">
                            <fieldset>
                                <legend>Dados do Campanha</legend>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Ordem</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Nome da Campanha</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Titulo da Campanha</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Exibir?</label>
                                            <div class="toggle-switch" data-ts-color="green">
                                                <input id="ts_compra" type="checkbox" hidden="hidden"
                                                    ng-checked="configurations.showBid"
                                                    ng-model="configurations.showBid">
                                                <label for="ts_compra" class="ts-helper"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="well">
                            <fieldset>
                                <legend>Inclusão de Ofertas</legend>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Ordem</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Título da Oferta</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">URL de Destino</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Exibir?</label>
                                            <div class="toggle-switch" data-ts-color="green">
                                                <input id="ts_compra" type="checkbox" hidden="hidden"
                                                    ng-checked="configurations.showBid"
                                                    ng-model="configurations.showBid">
                                                <label for="ts_compra" class="ts-helper"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Preço Inicial</label>
                                            <input type="text" class="form-control text-right"
                                                ng-model="adItem.start_price"  
                                                ui-number-mask/>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Imagem de Fundo</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Promoção?</label>
                                            <div class="toggle-switch" data-ts-color="green">
                                                <input id="ts_compra" type="checkbox" hidden="hidden"
                                                    ng-checked="configurations.showBid"
                                                    ng-model="configurations.showBid">
                                                <label for="ts_compra" class="ts-helper"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">% Desconto</label>
                                            <input type="text" class="form-control text-right" 
                                                ng-model="adItem.promotion_percent" 
                                                ui-number-mask/>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Data Expiração</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">&nbsp;</label>
                                            <button class="btn btn-block btn-success">
                                                <i class="zmdi zmdi-plus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <caption>Ofertas Cadastradas</caption>
                                            <thead>
                                                <th width="40" class="text-center">Ordem</th>
                                                <th width="80" class="text-center">Tipo</th>
                                                <th>Título</th>
                                                <th width="120" class="text-center">Preço Inicial</th>
                                                <th width="40">Exibir?</th>
                                            </thead>
                                            
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Aéreo</td>
                                                    <td>Bla bla bla bla bla bla</td>
                                                    <td class="text-right">R$ 192,97</td>
                                                    <td class="text-center">
                                                        <span class="label label-success">SIM</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Aéreo</td>
                                                    <td>Bla bla bla bla bla bla</td>
                                                    <td class="text-right">R$ 63,99</td>
                                                    <td class="text-center">
                                                        <span class="label label-danger">NÃO</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Javascript Libraries -->
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        
        <script src="assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="assets/vendors/input-mask/input-mask.min.js"></script>
        <script src="assets/vendors/auto-size/jquery.autosize.min.js"></script>
        <script src="assets/vendors/waves/waves.min.js"></script>
        <script src="assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="assets/vendors/sweet-alert/sweet-alert.min.js"></script>
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