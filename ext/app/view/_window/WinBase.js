Ext.define('Strbc.view.window.WinBase', {
    extend : 'Ext.window.Window',
    alias : 'widget.winbases',
    title : 'Selecione a base de dados',
    autoScroll : true,
    modal : true,
    closeAction : 'close',
    bodyPadding : 10,
    items : [ {
        xtype : 'form',
        border : false,
        width : 400,
        items : [ {
            xtype : 'combobox',
            name : 'Id',
            store : 'Bases',
            valueField : 'id',
            displayField : 'nome',
            fieldLabel : 'Bases disponíveis',
            labelWidth : 120,
            emptyText : 'Selecione uma base de dados...',
            queryMode : 'local',
            msgTarget : 'side',
            allowBlank : false,
            triggerAction : 'all',
            anchor : '100%',
        } ],
        buttons : [ {
            text : 'Ok',
            itemId : 'ok',
            width : 110,
            iconCls : 'botoes-salvar'
        }, {
            text : 'Cancelar',
            iconCls : 'botoes-close',
            width : 110,
            itemId : 'closewindow'
        } ]

    } ]
});