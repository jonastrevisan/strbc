Ext.define('Strbc.model.Pagador', {
	extend : 'Ext.data.Model',
	fields : [{
		name : 'PAGOUATE',
		convert : function(value, rec, g) {
			return rec.data.ATEMES + '/' + rec.data.ATEANO
		}
	}, {
		name : 'ATEANO'
	}, {
		name : 'ATEMES'
	}, {
		name : 'NOME'
	}]

});
