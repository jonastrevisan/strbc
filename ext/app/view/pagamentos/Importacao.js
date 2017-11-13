Ext.define('Strbc.view.produtos.Importacao', {
    extend : 'Ext.window.Window',
    alias : 'widget.winimportacaoproduto',

    title : 'Importação de Figuras Fiscais de ICMS/ICMS-ST',
    autoScroll : true,
    modal : true,
    bodyPadding : 10,
    items : [ {
        xtype : 'form',
        width : 400,
        items : [ {
            xtype : 'filefield',
            name : 'photo',
            fieldLabel : 'Arquivo',
            labelWidth : 50,
            msgTarget : 'side',
            allowBlank : false,
            anchor : '100%',
            buttonText : '...'
        } ],

        buttons : [ {
            text : 'Importar',
            itemId : 'importar',
            iconCls : 'botoes-import'
        }, {
            text : 'Fechar',
            iconCls : 'botoes-close',
            itemId : 'closewindow'
        } ]

    } ]
});