Ext.define('Strbc.store.PagouAtes', {
	extend	: 'Strbc.commons.abstract.Store',
	requires:['Strbc.model.Pagador'],
	model 	: 'Strbc.model.Pagador',
	baseUrl: 'php/test.php',
     autoLoad : false

});