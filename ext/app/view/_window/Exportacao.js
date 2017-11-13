Ext.define('Strbc.view.window.Exportacao', {
    extend  : 'Ext.window.Window',
    alias   : 'widget.winexportacao',
    iconCls : 'botoes-export',
    title   : 'Exportação de Figuras Fiscais de ICMS/ICMS-ST',
    modal   : true,
    autoScroll  : true,
    closeAction :  'close',
    bodyPadding : 10,
    
    items   : [{
        xtype   : 'form',
        border  : false,
        width   : 400,
        items   : [ {
            xtype   : 'filefield',
            name    : 'photo',
            fieldLabel  : 'Diretório',
            labelWidth  : 50,
            msgTarget   : 'side',
            allowBlank  : false,
            anchor      : '100%',
            buttonText  : '...'
        }],

        buttons : [{
            text    : 'Exportar',
            width   : 110,
            iconCls : 'botoes-export'
        }, {
            text    : 'Fechar',
            iconCls : 'botoes-close',
            width   : 110,
            itemId  : 'closewindow'
        }]

    }]
});