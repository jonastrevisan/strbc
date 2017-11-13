Ext.define('Strbc.view.usuarios.Pesquisa', {
	extend	: 'Ext.form.Panel',
	alias	: 'widget.pesquisapanel',
	
	padding : '10',
	xtype 	: 'form',
	border 	: false,
	items 	: [{
		xtype 	: 'textfield',
		width 	: 350,
		minLength	: 3,
		emptyText 	: 'Pesquisar...'
	}, {

		xtype 	: 'fieldcontainer',
		layout 	: 'hbox',
		items 	: [{
			xtype 	: 'button',
			text 	: 'Procurar',
			itemId : 'Procurar',
			iconCls : 'botoes-search',
			width 	: 110
		}, {
			xtype 	: 'tbspacer',
			width 	: 10
			,
		}, {
			xtype 	: 'button',
			text 	: 'Limpar',
			itemId : 'Limpar',
			iconCls : 'botoes-clear',
			width 	: 110
		}]
	}]
});