

var filters = {
	ftype: 'filters',
	local: false,
	phpMode: true
};
var FUNCAO = Ext.create('Strbc.util.Funcoes');
Ext.define('Strbc.view.socio.List', {
		extend: 'Ext.grid.Panel',
		alias: 'widget.ncmslist',

		requires: ['Ext.ux.grid.FiltersFeature'],
		border: false,

		loadMask: false,
		// requires: ['Ext.toolbar.Paging', 'Ext.ux.grid.FiltersFeature', 'Sindicato.override.PagingToolbar'],
		store: 'Strbc.store.Socios',
		features: [filters],
		/*listeners: {

		afterRender: function (grid) {
		this.store.load();
		}
		},*/

		columns: [{
					header: "Matricula",
					width: 90,
					dataIndex: 'matricula',
					filter: {
						type: 'int'
					}
				}, {
					header: "NOME",
					width: 170,
					flex: 1,
					dataIndex: 'nome',
					renderer: function(value, metaData, record) {
						return FUNCAO.Masc_ou_Fem(value, metaData, record)
					},
					filter: {
						type: 'string'
					}
				},
				/*{
				    header: "Ativo",
				    width: 60,
				    renderer: function (value) {
				        return FUNCAO.SIM_NAO_POR_EXTENSO(value)
				    },
				    dataIndex: 'ativo'
				},*/
				{
					xtype: 'actioncolumn',
					text: 'acões',
					align: 'center',
					width: 180,
					items: [{
								icon: 'https://cdn3.iconfinder.com/data/icons/text/100/print-16.png',
								tooltip: 'Imprimir',
								style: 'margin-left: 5px;'
							}, '->', {
								iconCls: 'icon-editar',
								tooltip: 'Editar/Detalhar',
								style: 'margin-left: 5px;',
								text: 'desfiliar'
							}, '->', {
								style: 'margin-left: 5px;',
								iconCls: 'icon-desfiliar',
								tooltip: 'Desfiliar',
								action: 'desfiliar'
							}, '->', {
								iconCls: 'icon-book',
								tooltip: 'Carteira',
								style: 'margin-left: 5px;'
							}, '->',

							{
								icon: 'http://cdn1.iconfinder.com/data/icons/6x16-free-application-icons/16/Dollar.png',
								tooltip: 'Mensalidades',
								style: 'margin-left: 5px;'
							}]
				}],

		initComponent: function() {
			this.dockedItems = [{
						xtype: 'pagingtoolbar',
						dock: 'bottom',
						store: 'Strbc.store.Socios',
						pageSize: 30,
						displayInfo: true,
						displayMsg: 'Mostrando dados {0} - {1} de {2}',
						emptyMsg: "Nenhum dado encontrado."
					}, {
						xtype: 'toolbar',
						dock: 'top',
						items: [{
									xtype: 'tbspacer',
									flex: 1
								}, {
									xtype: 'button',
									text: 'Novo',
									icon: 'http://findicons.com/files/icons/982/dellipack_2/16/plus.png',
									action: 'novosocio'
								}

						]
					}];
			this.callParent(arguments);
		}
	});