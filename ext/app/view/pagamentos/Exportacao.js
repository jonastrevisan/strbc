Ext.define('Strbc.view.produtos.Exportacao', {
	extend : 'Ext.window.Window',
	alias : 'widget.winexportacaoproduto',
	iconCls : 'botoes-export',
	title : 'Exportação de Figuras Fiscais de ICMS/ICMS-ST',
	modal : true,
	autoScroll : true,
	bodyPadding : 10,
	items : [ {
		xtype : 'form',
		width : 400,
		items : [ {
			xtype : 'filefield',
			name : 'photo',
			fieldLabel : 'Diretório',
			labelWidth : 50,
			msgTarget : 'side',
			allowBlank : false,
			anchor : '100%',
			buttonText : '...'
		} ],

		buttons : [ {
			text : 'Exportar',
			iconCls : 'botoes-export'
		}, {
			text : 'Fechar',
			iconCls : 'botoes-close',
			itemId : 'closewindow'
		} ]

	} ]
});