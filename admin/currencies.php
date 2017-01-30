<!DOCTYPE html>
<html lang="en" ng-app="web_app">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exchange Rates Manager</title>
    
        <!-- Vendor CSS -->
        <link href="../assets/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="../assets/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../assets/vendors/socicon/socicon.min.css" rel="stylesheet">
        <link href="../assets/vendors/flag-icon/css/flag-icon.min.css" rel="stylesheet">
        <link href="../assets/bower_components/angular/angular-csp.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="../assets/css/app.min.1.css" rel="stylesheet">
        <link href="../assets/css/app.min.2.css" rel="stylesheet">
        <link href="../assets/css/custom.css" rel="stylesheet">
    </head>
    
    <body ng-controller="CurrenciesCtrl" ng-cloak style="padding-top: 0px;">
        <section id="main">
            <section id="content">
                <div class="container" style="max-width: 650px;">
                     <div class="block-header">
                        <h2>
                            Moedas & Cotações
                            <small>Últ. Atualização: {{ getLastUpdate(configurations.timestamp, true) }}</small>
                        </h2>
                    </div>

                    <div class="card">
                        <div class="card-body clearfix">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Moeda</th>
                                            <th class="text-center" width="80">Compra</th>
                                            <th class="text-center" width="80">Venda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="($index, curr) in configurations.currencies track by $index">
                                            <td class="text-center" width="80">
                                                <div data-toggle="tooltip" title="{{ curr.name }}">
                                                    <span class="m-b-0">
                                                        <span class="flag-icon flag-icon-{{ curr.icon | lowercase }}">
                                                    </span>
                                                    <span>{{ curr.code_iso_alpha_3 }}</span>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <span>{{ curr.name }}</span>
                                            </td>
                                            <td class="text-right" style="vertical-align: middle;">
                                                {{ curr.finalValue.bid | numberFormat : '4' : ',' : '.' }}
                                            </td>
                                            <td class="text-right" style="vertical-align: middle;">
                                                {{ curr.finalValue.ask | numberFormat : '4' : ',' : '.' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

        <script type="text/javascript" src="../assets/js/custom.js"></script>
        <script type="text/javascript" src="../assets/js/extras.js"></script>
        <script type="text/javascript" src="../assets/js/app.js"></script>
        <script type="text/javascript" src="../assets/js/controller/currencies-controller.js"></script>
    </body>
</html>