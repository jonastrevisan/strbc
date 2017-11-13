Ext.define('Strbc.store.Aniversariantes', {
	extend	: 'Strbc.commons.abstract.Store',
	model 	: 'Strbc.model.Socio',
	baseUrl: 'php/aniversariante/aniversariantes.php',
	alias:'widget.stsociosaniversariantes',
     autoLoad : true

});