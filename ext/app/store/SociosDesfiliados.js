Ext.define('Strbc.store.SociosDesfiliados', {
	extend	: 'Strbc.commons.abstract.Store',
	model 	: 'Strbc.model.Socio',
	baseUrl: 'php/socio/sociosDesfiliados.php',
     autoLoad : true

});