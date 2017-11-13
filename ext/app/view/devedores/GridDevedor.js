var filters = {
	ftype : 'filters',
	local : false,
	phpMode : true
};
var FUNCAO = Ext.create('Strbc.util.Funcoes');
Ext.define('Strbc.view.devedores.GridDevedor', {
	extend : 'Ext.grid.Panel',
	alias : 'widget.griddevedor',
	requires : ['Ext.ux.grid.FiltersFeature'],
	boder : false,
	loadMask : false,

	store : 'Strbc.store.Devedores',
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
		header : "Desde mês",
		width : 170,
		flex : 1,
		dataIndex : 'DESDEMES',

	}, {
		header : "Desde Ano",
		width : 170,
		flex : 1,
		dataIndex : 'DESDEANO',

	}, {
		header : "Total",
		width : 170,
		flex : 1,
		dataIndex : 'TOTAL',
	}],

	initComponent : function() {
		this.dockedItems = [{
			xtype : 'pagingtoolbar',
			dock : 'bottom',
			store : 'Strbc.store.Devedores',
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
				}]
			}]
		}];
		this.callParent(arguments);
	}
}); 