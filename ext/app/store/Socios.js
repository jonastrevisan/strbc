Ext.define('Strbc.store.Socios', {
	extend	: 'Strbc.commons.abstract.Store',
	model 	: 'Strbc.model.Socio',
	baseUrl: 'php/sociosAtivos.php',
	alias:'widget.stsocios',
     autoLoad : true

});