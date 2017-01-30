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
    
    <body ng-controller="OffersCtrl" ng-cloak>
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
                                    <li><a href="banners.php">Banners</a></li>
                                    <li><a href="offers.php" class="active">Ofertas</a></li>
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
                        <h2>Gerenciador de Ofertas</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>
                                        Ofertas
                                        <small>Configuração de blocos de ofertas, ordem e itens ofertados</small>
                                    </h2>
                                    <ul class="actions">
                                        <li class="dropdown action-show">
                                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#" ng-click="newOfferModal('show', true)">Criar novo grupo de ofertas</a>
                                                </li>
                                                <li>
                                                    <a href="#">Atualizar lista</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="card-body card-padding offers">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th width="80" class="text-center text-middle">Ordem</th>
                                                    <th width="150" class="text-middle">Campanha</th>
                                                    <th class="text-middle">Título</th>
                                                    <th width="80" class="text-center text-middle">Anúncios</th>
                                                    <th width="50" class="text-center text-middle">Exibir?</th>
                                                    <th width="80" class="text-center text-middle">Ações</th>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="offer in offers">
                                                        <td class="text-middle">{{ offer.order }}</td>
                                                        <td class="text-middle">{{ offer.name }}</td>
                                                        <td class="text-middle">{{ offer.title }}</td>
                                                        <td class="text-center text-middle">{{ offer.items.length }}</td>
                                                        <td class="text-center text-middle">
                                                            <span class="label label-success" ng-show="offer.show">SIM</span>
                                                            <span class="label label-danger" ng-show="!offer.show">NÃO</span>
                                                        </td>
                                                        <td class="text-center text-middle">
                                                            <button class="btn btn-xs btn-danger"
                                                                ng-click="deleteOffer(offer)">
                                                                <i class="zmdi zmdi-delete"></i> 
                                                            </button>
                                                            <button class="btn btn-xs btn-warning"
                                                                ng-click="editOffer(offer)">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
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
                        <div class="well offer">
                            <fieldset>
                                <legend>Dados do Campanha</legend>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Ordem</label>
                                            <input type="number" class="form-control" min="1"
                                                ng-model="offer.order" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Nome da Campanha</label>
                                            <input type="text" class="form-control" 
                                                ng-model="offer.name" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Titulo da Campanha</label>
                                            <input type="text" class="form-control" 
                                                ng-model="offer.title" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Exibir?</label>
                                            <div class="toggle-switch" data-ts-color="green">
                                                <input id="ts_offer_show" type="checkbox" hidden="hidden"
                                                    ng-checked="offer.show"
                                                    ng-model="offer.show">
                                                <label for="ts_offer_show" class="ts-helper"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="well items">
                            <fieldset>
                                <legend>Inclusão de Ofertas</legend>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Ordem</label>
                                            <input type="number" class="form-control" min="1" 
                                                ng-model="adItem.order" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Título da Oferta</label>
                                            <input type="text" class="form-control" 
                                                ng-model="adItem.title" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-5">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">URL de Destino</label>
                                            <input type="text" class="form-control" 
                                                ng-model="adItem.link" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-1">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Exibir?</label>
                                            <div class="toggle-switch" data-ts-color="green">
                                                <input id="ts_aditem_show" type="checkbox" hidden="hidden"
                                                    ng-checked="adItem.show"
                                                    ng-model="adItem.show">
                                                <label for="ts_aditem_show" class="ts-helper"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Preço Inicial</label>
                                            <input type="text" class="form-control text-right"
                                                ng-model="adItem.start_price" required="true"
                                                ui-number-mask/>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Promoção?</label>
                                            <div class="toggle-switch" data-ts-color="green">
                                                <input id="ts_aditem_promotion" type="checkbox" hidden="hidden"
                                                    ng-checked="adItem.is_promotion"
                                                    ng-model="adItem.is_promotion">
                                                <label for="ts_aditem_promotion" class="ts-helper"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">% Desconto</label>
                                            <input type="text" class="form-control text-right" 
                                                ng-model="adItem.promotion_percent" 
                                                ng-disabled="(!adItem.is_promotion)"
                                                ui-number-mask/>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Data Expiração</label>
                                            <input type="text" class="form-control" ng-model="adItem.end_date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">Tipo de Oferta</label>
                                            <select class="form-control" ng-model="adItem.type" required="true">
                                                <option></option>
                                                <option value="flight">Aéreo</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="package">Pacote</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-8">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">URL Imagem de Fundo</label>
                                            <input type="text" class="form-control" 
                                                ng-model="adItem.background_image" required="true" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group fg-line m-b-10">
                                            <label class="form-label">&nbsp;</label>
                                            <button class="btn btn-block btn-success" ng-click="saveAdItem()">
                                                <i class="zmdi zmdi-plus-circle"></i> Incluir
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
                                                <th width="60">Ações</th>
                                            </thead>
                                            
                                            <tbody>
                                                <tr ng-repeat="adItem in offer.items | filter : { excluir : false }">
                                                    <td class="text-center">{{ adItem.order }}</td>
                                                    <td class="text-center">{{ adItem.type }}</td>
                                                    <td>{{ adItem.title }}</td>
                                                    <td class="text-right">R$ {{ adItem.start_price }}</td>
                                                    <td class="text-center">
                                                        <span class="label label-success" ng-show="adItem.show">SIM</span>
                                                        <span class="label label-danger" ng-show="!adItem.show">NÃO</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-xs btn-danger"
                                                            rel="tooltip" data-toggle="tooltip" data-original-title="Excluir"
                                                            ng-click="adItem.excluir = true">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-xs btn-warning"
                                                            rel="tooltip" data-toggle="tooltip" data-original-title="Editar"
                                                            ng-click="editAdItem(adItem)">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
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
                        <button type="button" class="btn btn-link" data-dismiss="modal"
                            ng-click="newOfferModal('hide', true)">
                            Fechar
                        </button>
                        <button type="button" class="btn btn-primary"
                            ng-click="saveOffer()">
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
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
        <script type="text/javascript" src="../assets/js/controller/offers-controller.js"></script>
    </body>
</html>