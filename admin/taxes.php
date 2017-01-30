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
        <link href="assets/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="assets/vendors/socicon/socicon.min.css" rel="stylesheet">
        <link href="assets/vendors/flag-icon/css/flag-icon.min.css" rel="stylesheet">
        <link href="assets/bower_components/angular/angular-csp.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="assets/css/app.min.1.css" rel="stylesheet">
        <link href="assets/css/app.min.2.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
    </head>
    
    <body ng-controller="HomeCtrl" ng-cloak>
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
                                <li>
                                    <a href="" ng-click="updateData()">
                                        <i class="md md-refresh"></i> Atualizar Cotações
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
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-settings"></i> Configurações</a>
                                <ul>
                                    <li><a href="index.php">Conteúdos Dinâmicos</a></li>
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
                            <li class="sub-menu active">
                                <a href=""><i class="zmdi zmdi-money-box"></i> Moedas</a>
                                <ul>
                                    <li><a href="new-currency.html">Cadastro</a></li>
                                    <li><a href="taxes.html" class="active">Taxas & Cotações</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-file-text"></i> Relatórios</a>
                                <ul>
                                    <li><a href="new-currency.html">Histórico de pesquisa</a></li>
                                    <li><a href="taxes.html">Destinos mais procurados</a></li>
                                    <li><a href="taxes.html">Usuários registrados</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Configurações de Moedas</h2>
                    </div>
                
                    <div class="card">
                        <div class="card-header p-b-0">
                            <h2>
                                Ajustes Globais
                            </h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <div class="row">
                                <div class="col-xs-12 col-sm-1">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">% IOF</label>
                                        <input type="text" class="form-control text-right" 
                                            placeholder="% IOF" ui-number-mask
                                            ng-model="configurations.iofTax" 
                                            ng-keyup="calculateComercialValues();calculateFinalValues()">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-4">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label">Disponibilizar em URL pública</label>
                                        <div class="toggle-switch" data-ts-color="green">
                                            <label for="ts_compra" class="ts-label">Compra</label>
                                            <input id="ts_compra" type="checkbox" hidden="hidden"
                                                ng-checked="configurations.showBid"
                                                ng-model="configurations.showBid">
                                            <label for="ts_compra" class="ts-helper"></label>
                                        </div>

                                        <div class="toggle-switch m-l-20" data-ts-color="green">
                                            <label for="ts_venda" class="ts-label">Venda</label>
                                            <input id="ts_venda" type="checkbox" hidden="hidden"
                                                ng-checked="configurations.showAsk"
                                                ng-model="configurations.showAsk">
                                            <label for="ts_venda" class="ts-helper"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-2">
                                    <div class="form-group fg-line m-b-10">
                                        <label class="form-label"></label>
                                        <button class="btn btn-info waves-effect waves-button waves-float hidden-xs"
                                            ng-click="updateData()">
                                            <i class="md md-refresh"></i> Atualizar Cotações
                                        </button>
                                        <span class="label label-default">Últ. Execução: {{ getLastUpdate(configurations.timestamp, true) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>Moedas e Cotações</h2>
                        </div>
                        <div class="card-body clearfix">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="3">Moeda</th>
                                            <th class="text-center" rowspan="2" colspan="2">Valor Comercial</th>
                                            <th class="text-center" colspan="4">Corretagem</th>
                                            <th class="text-center" rowspan="2" colspan="2">Valor Comercial + IOF</th>
                                            <th class="text-center" rowspan="2" colspan="2">% Margem</th>
                                            <th class="text-center" rowspan="2" colspan="2">Valor Final</th>
                                            <th class="text-center" rowspan="3" width="80">Atual. Autom.</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" width="80" colspan="2">Compra</th>
                                            <th class="text-center" width="80" colspan="2">Venda</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" width="80">Compra</th>
                                            <th class="text-center" width="80">Venda</th>
                                            
                                            <th class="text-center" width="80">%</th>
                                            <th class="text-center" width="80">R$</th>
                                            <th class="text-center" width="80">%</th>
                                            <th class="text-center" width="80">R$</th>
                                            
                                            <th class="text-center" width="80">Compra</th>
                                            <th class="text-center" width="80">Venda</th>
                                            
                                            <th class="text-center" width="80">Compra</th>
                                            <th class="text-center" width="80">Venda</th>

                                            <th class="text-center" width="80">Compra</th>
                                            <th class="text-center" width="80">Venda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="curr in configurations.currencies">
                                            <td class="text-center">
                                                <div data-toggle="tooltip" title="{{ curr.name }}">
                                                    <span class="m-b-0">
                                                        <span class="flag-icon flag-icon-{{ curr.icon | lowercase }}">
                                                    </span>
                                                    <span>{{ curr.code_iso_alpha_3 }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" ui-number-mask="4"
                                                    ng-model="curr.cost.bid"
                                                    ng-keyup="calculateBrokingValue(curr, 'bid')">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" ui-number-mask="4"
                                                    ng-model="curr.cost.ask"
                                                    ng-keyup="calculateBrokingValue(curr, 'ask')">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" ui-number-mask
                                                    ng-model="curr.broking.bid.percent"
                                                    ng-keyup="calculateBrokingValue(curr, 'bid')">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" 
                                                    ui-number-mask="4" ng-model="curr.broking.bid.value" readonly="readonly">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" ui-number-mask
                                                    ng-model="curr.broking.ask.percent"
                                                    ng-keyup="calculateBrokingValue(curr, 'ask')">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" 
                                                    ui-number-mask="4" ng-model="curr.broking.ask.value" readonly="readonly">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" 
                                                    ui-number-mask="4" ng-model="curr.comercial.bid" readonly="readonly">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" 
                                                    ui-number-mask="4" ng-model="curr.comercial.ask" readonly="readonly">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" ui-number-mask
                                                    ng-model="curr.markupPercent.bid"
                                                    ng-keyup="calculateFinalValues()">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" ui-number-mask
                                                    ng-model="curr.markupPercent.ask"
                                                    ng-keyup="calculateFinalValues()">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right" 
                                                    ui-number-mask="4" ng-model="curr.finalValue.bid"
                                                    ng-keyup="calculateMarkupValues()">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm text-right"
                                                    ui-number-mask="4" ng-model="curr.finalValue.ask"
                                                    ng-keyup="calculateMarkupValues()">
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-xs bgm-bluegray"
                                                	data-toggle="tooltip" data-title="Exibir Detalhes"
                                                	ng-click="showDetails(curr)">
                                                    <i class="md md-info"></i>
                                                </a>
                                                <div class="toggle-switch" data-ts-color="green" 
                                                    data-toggle="tooltip" title="Última Atualização: {{ getLastUpdate(curr.timestamp, true) }}"
                                                    data-placement="top" style="margin-top: 3px;">
                                                    <input id="ts_moeda_{{ curr.code_iso_alpha_3 }}" type="checkbox" hidden="hidden" 
                                                        ng-checked="curr.externalRefresh"
                                                        ng-model="curr.externalRefresh">
                                                    <label for="ts_moeda_{{ curr.code_iso_alpha_3 }}" class="ts-helper"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

        <div class="modal fade" data-modal-color="bluegray" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true">
        	<div class="modal-dialog modal-sm">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h4 class="modal-title">
        					<i class="md md-plus-circle"></i>
        					Detalhes (<span><span class="flag-icon flag-icon-{{ objectModal.icon | lowercase }}"></span><span>{{ objectModal.code_iso_alpha_3 }}</span>
        					<strong ng-show="(objectModal.sourceData.varBid > 0)"><i class="md md-trending-up text-success"></i></strong>
							<strong ng-show="(objectModal.sourceData.varBid < 0)"><i class="md md-trending-down text-danger"></i></strong>)
						</h4>
        			</div>
        			<div class="modal-body">
        				<table class="table table-bordered table-condensed" style="color: #333;">
        					<tbody>
        						<tr>
        							<td><strong>Moeda</strong></td>
        							<td class="text-right">
        								{{ objectModal.name }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Últ. Atualização</strong></td>
        							<td class="text-right">
        								{{ getLastUpdate(objectModal.timestamp, true) }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Últ. Negociação</strong></td>
        							<td class="text-right">
        								{{ getLastUpdate(objectModal.sourceData.timestamp, false) }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Compra</strong></td>
        							<td class="text-right">
        								{{ objectModal.sourceData.bid | numberFormat : '4' : ',' : '.' }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Venda</strong></td>
        							<td class="text-right">
        								{{ objectModal.sourceData.ask | numberFormat : '4' : ',' : '.' }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>% Variação</strong></td>
        							<td class="text-right {{ (objectModal.sourceData.pctChange < 0) ? 'text-danger' : 'text-success' }}">
        								{{ objectModal.sourceData.pctChange | numberFormat : '4' : ',' : '.' }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Variação</strong></td>
        							<td class="text-right {{ (objectModal.sourceData.varBid < 0) ? 'text-danger' : 'text-success' }}">
        								{{ objectModal.sourceData.varBid | numberFormat : '4' : ',' : '.' }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Mínimo</strong></td>
        							<td class="text-right">
        								{{ objectModal.sourceData.low | numberFormat : '4' : ',' : '.' }}
    								</td>
        						</tr>
        						<tr>
        							<td><strong>Máximo</strong></td>
        							<td class="text-right">
        								{{ objectModal.sourceData.high | numberFormat : '4' : ',' : '.' }}
    								</td>
        						</tr>
        					</tbody>
        				</table>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
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