Ext.apply(Ext.form.field.VTypes, {
	password : function(val, field) {
		if (field.initialPassField) {
			var pwd = field.up('form').down('#'
					+ field.initialPassField);
			return (val == pwd.getValue());
		}
		return true;
	},

	passwordText : 'Senhas (nova senha e confirmar senha) não conferem'
});

Ext.define('Strbc.view.window.AlterarSenha', {
    extend : 'Ext.window.Window',
    alias : 'widget.alterarSenha',
    title : 'Alteração de senha',
    autoScroll : true,
    modal : true,
    closeAction : 'destroy',
    bodyPadding : 10,
    items : [ {
        xtype : 'form',
        border : false,
        width : 400,
        items : [ {
            xtype : 'textfield',
            name : 'senha',
            fieldLabel : 'Senha atual',
            inputType : 'password',
            allowBlank : false,
            minLength : 4,
            maxLength : 10,
            anchor : '100%',
            listeners : {
	            afterrender : function(field) {
		            field.focus(false, 200);
	            }
            }
        }, {

            xtype : 'textfield',
            fieldLabel : 'Nova senha',
            name : 'novaSenha',
            id : 'novaSenha',
            anchor : '100%',
            minLength : 4,
            maxLength : 10,
            inputType : 'password',
            allowBlank : false,
            listeners : {
                validitychange : function(field) {
	                field.next().validate();
                },
                blur : function(field) {
	                field.next().validate();
                }
            }
        }, {
            xtype : 'textfield',
            fieldLabel : 'Confirmar senha',
            allowBlank : false,
            name : 'confNovaSenha',
            vtype : 'password',
            minLength : 4,
            maxLength : 10,
            anchor : '100%',
            inputType : 'password',
            initialPassField : 'novaSenha' // id
        } ],
        buttons : [ {
            text : 'Ok',
            itemId : 'alterarSenha',
            formBind : true,
            dosabled : true,
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