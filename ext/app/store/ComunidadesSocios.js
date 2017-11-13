Ext.define('Strbc.store.ComunidadesSocios', {
	extend	: 'Strbc.commons.abstract.Store',
	model 	: 'Strbc.model.Socio',
	baseUrl: 'php/comunidades/listarComunidades.php',
     autoLoad : false

});