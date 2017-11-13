Ext.define('Strbc.view.produtos.Form', {
    extend : 'Ext.window.Window',
    alias : 'widget.formscadastroproduto',
    height : 350,
    width : 400,
    layout : 'fit',
    modal : true,
    title : 'Cadastro de produtos',
    bodyPadding : 10,

    items : [ {
        xtype : 'form',
        layout : {
            type : 'vbox',
            align : 'stretch'
        },

        bodyPadding : '5 5 0',
        fieldDefaults : {
            msgTarget : 'side',
            labelWidth : 75,
            anchor : '100%'
        },
        defaultType : 'textfield',

        items : [ {
            fieldLabel : 'Código',
            name : 'codigo',
            allowBlank : false,
            tooltip : 'Código do produto'
        }, {
            fieldLabel : 'GTIN',
            name : 'gtin',
            allowBlank : false,
        }, {
            fieldLabel : 'NCM',
            name : 'ncm',
        }, {
            xtype : 'htmleditor',
            name : 'descricao',
            enableColors : false,
            enableAlignments : false,
            height : 155,
            anchor : '100%'
        } ]
    } ],

    dockedItems : [ {
        xtype : 'toolbar',
        dock : 'bottom',

        items : [ {
	        xtype : 'tbfill'
        }, {
            text : 'Salvar',
            width : 110,
            iconCls : 'botoes-check'
        }, {
            text : 'Fechar',
            iconCls : 'botoes-close',
            width : 110,
            itemId : 'closewindow'
        } ]
    } ]
});