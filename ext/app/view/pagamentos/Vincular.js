Ext.define('NCM', {
    extend : 'Ext.data.Model',
    fields : [ 'codigo' ]
});
var dadosNCM = [ {
	codigo : 22089000
}, {
	codigo : 20441123
}, {
	codigo : 98754622
} ];
// The data store holding the states
var storeNCM = Ext.create('Ext.data.Store', {
    model : 'NCM',
    data : dadosNCM
});

Ext.define('Strbc.view.produtos.Vincular', {
    extend : 'Ext.window.Window',
    xtype : 'basic-window',
    width : 300,
    modal : true,
    title : 'Vincular produtos a NCM',
    autoScroll : true,
    bodyPadding : 10,
    items : [ {
        xtype : 'container',
        items : [ {
            xtype : 'fieldset',
            title : '',
            layout : 'anchor',
            margins : '10 10 10 10',
            collapsible : false,
            defaults : {
                anchor : '100%',
                labelWidth : 110
            },
            items : [ {
                xtype : 'textfield',
                readOnly : true,
                fieldLabel : 'Total de produtos',
                value : '5'

            }, {
                xtype : 'combo',
                fieldLabel : 'NCM',
                valueField : 'codigo',
                displayField : 'codigo',
                store : storeNCM,
                queryMode : 'local',
                typeAhead : true
            } ]
        } ]
    } ],

    buttons : [ {
        xtype : 'button',
        iconCls : 'botoes-check',
        text : 'Confirmar',
        width : 110,
        listeners : {
	        click : function() {
		        Ext.ux.Msg.flash({
		            msg : 'Vinculado com sucesso!',
		            type : 'success'
		        });
		        this.up('window').close();
	        }
        }
    }, {

        text : 'Cancelar',
        iconCls : 'botoes-delete',
        listeners : {
	        click : function() {
		        Ext.ux.Msg.flash({
		            msg : 'Ação cancelada!',
		            type : 'success'
		        });
		        this.up('window').close();
	        }
        }

    } ]

});