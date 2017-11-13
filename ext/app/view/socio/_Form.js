Ext.define('Strbc.view.socio.Form', {
    extend : 'Ext.window.Window',
    alias : 'widget.ncmsform',
    title : 'Cadastro de NCMs',
    autoScroll : true,
    modal : true,
    closeAction : 'destroy',
    bodyPadding : 10,

    items : [ {
        xtype : 'form',
        border : false,
        width : 455,

        items : [ {
            xtype : 'hiddenfield',
            name : 'id',

        }, {
            xtype : 'numberfield',
            name : 'numero',
            fieldLabel : 'NCM',
            allowBlank : false,
            minLength : 8,
            maxLength : 8,
            allowDecimals : false,
            anchor : '100%',
            listeners : {
	            afterrender : function(field) {
		            field.focus(false, 100);
	            }
            }
        }, {
            xtype : 'textfield',
            fieldLabel : 'Descrição',
            name : 'descricao',
            anchor : '100%',
            maxLength : 50,
            allowBlank : true
        }, {
            xtype : 'hiddenfield',
            name : 'ativa'

        } ],

        buttons : [ {
            text : 'Salvar',
            itemId : 'salvarNcm',
            formBind : true,
            dosabled : true,
            width : 110,
            iconCls : 'botoes-salvar'
        }, {
            text : 'Ativar',
            itemId : 'ativarInativarNcm',
            width : 110,
            iconCls : 'botoes-check'
        }, {
            text : 'Cancelar',
            iconCls : 'botoes-close',
            width : 110,
            itemId : 'closewindow'
        } ]
    } ]
});