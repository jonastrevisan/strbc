Ext.define('Strbc.store.Mensalidades', {
    extend: 'Ext.data.Store',
    model: 'Strbc.model.Mensalidade',
	alias:'widget.stmensalidades',
    groupField: 'ano',
    proxy: {
        type: 'ajax',
        url: 'php/mensalidade/Mensalidade.php',
        reader: {
            type: 'json',
            root: 'data'
        }
    },
    autoLoad: false

});