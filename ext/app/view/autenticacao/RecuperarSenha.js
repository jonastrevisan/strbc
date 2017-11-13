Ext.define('Strbc.view.autenticacao.RecuperarSenha', {
	extend : 'Ext.window.Window',
	alias : 'widget.recuperarsenha',
	title : 'Recuperação de senha',
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
			fieldLabel : 'E-mail',
			allowBlank : false,
			name : 'usuario',
			vtype : 'email',
			minLength : 4,
			anchor : '100%',
			listeners : {
				afterrender : function(field) {
					field.focus(false, 100);
				}
			}
		} ],
		buttons : [ {
			text : 'Ok',
			itemId : 'enviarSenhaPorEmail',
			width : 110,
			formBind: true,
			iconCls : 'botoes-salvar'
		}, {
			text : 'Cancelar',
			iconCls : 'botoes-close',
			width : 110,
			itemId : 'closewindow'
		} ]

	} ]
});