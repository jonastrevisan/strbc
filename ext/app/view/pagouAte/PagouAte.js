var filters = {
	ftype : 'filters',
	local : true
};
var FUNCAO = Ext.create('Strbc.util.Funcoes');
Ext.define('Strbc.view.pagouAte.PagouAte', {
	extend : 'Ext.grid.Panel',
	alias : 'widget.gridpagadores',
	requires : ['Ext.ux.grid.FiltersFeature'],
	boder : false,
	loadMask : false,

	store : 'Strbc.store.PagouAtes',
	features : [filters],
	columns : [{
		header : "SOCIOID",
		width : 90,
		hidden : true,
		dataIndex : 'SOCIOID',
	}, {
		header : "Nome",
		width : 170,
		flex : 1,
		dataIndex : 'NOME',
		filter : {
			type : 'string'
		}
	}, {
		header : "Pagou até",
		width : 170,
		flex : 1,
		dataIndex : 'PAGOUATE',

	}],

	initComponent : function() {
		this.dockedItems = [{
			xtype : 'pagingtoolbar',
			dock : 'bottom',
			store : 'Strbc.store.PagouAtes',
			pageSize : 30,
			displayInfo : true,
			displayMsg : 'Mostrando dados {0} - {1} de {2}',
			emptyMsg : "Nenhum dado encontrado."
		}, {
			xtype : 'toolbar',
			dock : 'top',
			items : [{
				dock : 'top',
				xtype : 'toolbar',
				items : [{
					xtype : 'datefield',
					allowBlank : false,
					fieldLabel : 'Desde',
					maxValue : new Date(),
					format : 'M/Y',
					itemId : 'dataPesquisa',
					value : new Date()
				}, {
					xtype : 'button',
					text : 'pesquisar',
					itemId : 'pesquisar'
				}, {
					xtype : 'button',
					text : 'Imprimir',
					itemId : 'imprimir'
				}]
			}]
		}];
		this.callParent(arguments);
	}
});
