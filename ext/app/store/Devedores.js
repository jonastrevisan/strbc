Ext.define('Strbc.store.Devedores', {
	extend	: 'Strbc.commons.abstract.Store',
	model 	: 'Strbc.model.Devedor',
	baseUrl: 'php/devedores/devedores.php',
     autoLoad : false

});