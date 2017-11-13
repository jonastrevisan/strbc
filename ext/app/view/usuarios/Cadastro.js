Ext.require('Strbc.view.usuarios.Pesquisa');
Ext.require('Strbc.view.usuarios.Grid');

Ext.define('Strbc.view.usuarios.Cadastro', {
	extend 		: 'Ext.panel.Panel',
	alias 		: 'widget.cadastrousuarios',
	requires 	: ['Ext.ux.grid.FiltersFeature'],
	
	layout 	: {
		type 	: 'vbox',
		align 	: 'stretch',
		pack 	: 'start'
	},
	
	items : [{
		xtype	: 'pesquisapanel'
	}, {
		xtype 	: 'usuariosgrid'
	}]
});