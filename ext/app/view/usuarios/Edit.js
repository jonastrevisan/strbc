Ext.require('Strbc.view.usuarios.permissoes.Grid');

Ext.define('Strbc.view.usuarios.Edit', {
    
    extend  : 'Ext.window.Window',    
    
    title   : 'Editando usuário',
    layout  : 'fit',
    autoShow: true,
    modal   : true,
    alias  	: 'widget.usuariosedit',

    initComponent: function () {

        this.items = [
		    {
		    	xtype       : 'form',
				defaultType : 'textfield',
				
				defaults: {
				    anchor  : '100%'
				},
				
				fieldDefaults : {
				    allowBlack      : false,
				    msgTarget       : 'side',
				    combineErrors   : false,
				    labelWidth      : 150,				    
				    labelAlign      : 'left'				    
				},
				
				items : [				
					{
					    name        : 'email',
					    ref         : 'email',
					    fieldLabel  : 'E-mail/Login',
					    vtype       : 'email',
					    maxLength	: 50
					},
					{
					    name        : 'nome',
					    ref         : 'nome',
					    fieldLabel  : 'Nome',
					    maxLength	: 50
					},
					{
					    name        : 'admin',
					    ref         : 'admin',
					    fieldLabel  : 'Admin',
					    xtype		: 'checkbox'
					},
		            {        
			            xtype	: 'permissoesusuario'			            
		            }
				]
		    }			
        ];
        
        this.dockedItems = [
            {
		        xtype 	: 'toolbar',
		        dock 	: 'bottom',
		        items 	: [ 
	          	   {
				        xtype 	: 'tbfill'
	          	   }, 
	          	   {
			            text 	: 'Salvar',		            
			            iconCls : 'botoes-check',
			            width 	: 110,
			            action	: 'salvar'
	          	   }, 
	          	   {
			            text 	: 'Fechar',
			            iconCls : 'botoes-close',
			            width 	: 110,
			            itemId 	: 'closewindow',
			            scope   : this,
			            handler : this.close
	          	   } 
			    ]
            }
        ];

        this.callParent(arguments);
    }
});