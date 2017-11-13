var selModel = Ext.create('Ext.selection.CheckboxModel', {
	checkOnly : false,
	mode : 'MULTI'
});
var filters = {
	ftype : 'filters',
	local : true
};

Ext.define('Strbc.view.clientes.Cadastro', {
	extend : 'Ext.tab.Panel',
	alias : 'widget.clientescadastro',
	requires : [
		'Ext.ux.grid.FiltersFeature'
	],
	margins : '10 10 10 10',
	defaults : {
		autoScroll : true
	},
	
	items : [{
		title : 'Grupos',
		layout : 'fit',
		items : [{
			xtype : 'grid',
			selModel : selModel,
			features : [filters],
			// frame : true,
			store : 'Strbc.store.Clientes',
			columns : [{
				text : 'Codigo',
				dataIndex : 'codigo',
				filter : {
					type : 'int'
				}
			}, {
				text : 'Grupo',
				dataIndex : 'grupo',
				flex : 1,
				filter : {
					type : 'string'
				}
			},

			],
			tbar : [{
				xtype : 'button',
				iconCls : 'botoes-add',
				text : 'Inserir',
				itemId : 'inserirGrupo',
				width : 110
			}, {
				xtype : 'button',
				iconCls : 'botoes-delete',
				text : 'Remover',
				itemId : 'removerGrupo',
				width : 110
			}],
			bbar : {
				xtype : 'pagingtoolbar',
				store : 'Strbc.store.Grupos',
				pageSize : 10,
				displayInfo : true,
				plugins : Ext.create('Ext.ux.ProgressBarPager')
			}
		}]
	}, {
		title : 'Clientes',
		layout : 'fit',
		items : [{
			xtype : 'grid',
			selModel : selModel,
			features : [filters],
			// frame : true,
			plugins : new Ext.grid.plugin.CellEditing({
				clicksToEdit : 1
			}),
			viewConfig : {
				stripeRows : false,
				getRowClass : function(record) {
					return record.get('codigo') < 500
					? 'child-row'
					: 'adult-row';
				}
			},
			store : 'Strbc.store.Clientes',
			columns : [{
				header : 'Codigo',
				dataIndex : 'codigo',
				filter : {
					type : 'int'
				}
			}, {
				header : 'Nome',
				dataIndex : 'nome',
				flex : 1,
				filter : {
					type : 'string'
				}
			}, {
				header : 'Email',
				dataIndex : 'email',
				flex : 1,
				filter : {
					type : 'string'
				}
			}, {
				header : 'Grupo',
				dataIndex : 'grupo',
				width : 150,
				filter : {
					type : 'string'
				},
				editor : new Ext.form.field.ComboBox({
							// typeAhead : false,
							// triggerAction : 'all',
							// selectOnTab : true,
							displayField : 'grupo',
							store : [['Shade', 'Shade'],
							['Mostly Shady', 'Mostly Shady'],
							['Sun or Shade', 'Sun or Shade'],
							['Mostly Sunny', 'Mostly Sunny'],
							['Sunny', 'Sunny']]
							,
								// lazyRender : false

							})
			}],
			tbar : [{
				xtype : 'button',
				iconCls : 'botoes-add',
				text : 'Inserir',
				itemId : 'inserir',
				width : 110
			}, {
				xtype : 'button',
				iconCls : 'botoes-delete',
				text : 'Remover',
				itemId : 'remover',
				width : 110
			}, {
				xtype : 'button',
				iconCls : 'botoes-check',
				text : 'Ativar',
				itemId : 'ativar',
				width : 110
			}, {
				xtype : 'button',
				iconCls : 'botoes-uncheck',
				text : 'Desativar',
				itemId : 'desativar',
				width : 110
			}],
			bbar : {
				xtype : 'pagingtoolbar',
				store : 'Strbc.store.Clientes',
				pageSize : 5,
				displayInfo : true,
				plugins : Ext.create('Ext.ux.ProgressBarPager')
			}
		}]

	}]
});
