Ext.define('Strbc.store.Pagamentos', {
    extend : 'Ext.data.Store',
    autoLoad : true,
     model: 'Strbc.model.Pagamento',
    proxy: {
        type: 'ajax',
        url: 'php/boletos.php',
        reader: {
            type: 'json',
            root: 'data',
            totalProperty: 'total'
        }

    }
   
});