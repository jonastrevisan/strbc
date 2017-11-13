Ext.define('Strbc.model.Usuario', {
    extend : 'Ext.data.Model',
    fields : [ {
        name : 'id',
        type : 'integer'
    }, {
        name : 'nome',
        type : 'string'
    }, {
        name : 'email',
        type : 'string'
    }, {
        name : 'admin',
        type : 'boolean'
    } ]
});