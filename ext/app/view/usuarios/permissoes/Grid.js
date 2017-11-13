Ext.require('Strbc.view.usuarios.permissoes.ComboBox');

Ext.define('Strbc.view.usuarios.permissoes.Grid', {

    extend : 'Ext.grid.Panel',

    layout : 'fit',
    alias : 'widget.permissoesusuario',
    store : 'Strbc.store.BasesUsuarios',
    height : 200,
    width : 400,

    cellEditor : Ext.create('Ext.grid.plugin.CellEditing', {
	    clicksToEdit : 1
    }),

    initComponent : function() {

	    this.columns = [ {
	        header : 'Nome da base',
	        dataIndex : 'nome',
	        flex : 2
	    }, {
	        header : 'Permissão',
	        dataIndex : 'permissao',
	        flex : 2,
	        editor : {
		        xtype : 'permissoescombo'
	        },
	        renderer : function(value) { // Extrair isso para algum plugin
		        if (value != "") {
			        var store_names = Ext.data.StoreManager.lookup('Strbc.store.Permissoes');

			        if (store_names.findRecord("id", value) != null)
				        return store_names.findRecord("id", value).get('nome');
			        else
				        return value;
		        } else {
			        return ""; // display nothing if value is empty
		        }
	        }
	    }, {
	        header : 'Notificar',
	        dataIndex : 'notificado',
	        xtype : 'checkcolumn',
	        flex : 1,
	        editor : {
		        xtype : 'checkbox'
	        }
	    } ];

	    this.plugins = [ this.cellEditor ];
	    this.callParent(arguments);
    },

    onRender : function() {
	    this.store.load();
	    this.callParent(arguments);
    }
});