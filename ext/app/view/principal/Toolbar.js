Ext.define('Strbc.view.principal.Toolbar', {
    extend 	: 'Ext.toolbar.Toolbar',
    xtype 	: 'StrbcToolbar',
    alias 	: 'widget.toolbarprincipal',
    items 	: [{
        iconCls : 'menu-cadastros',
        text 	: 'Cadastros',
        iconAlign : 'left',
        //scale 	: 'large',
        menu : {
	        items : [{
	            text 	: 'Socios',
	            action 	: 'openTab',
	            children : {
	                "text" : "Socios",
	                "leaf" : true,
	                "xtypeClass" 	: "ncmslist",
	                "controllerName": "Strbc.controller.socio.Socios"
	            }
	        },{
	            text 	: 'Desfiliados',
	            action 	: 'openTab',
	            children : {
	                "text" : "Desfiliados",
	                "leaf" : true,
	                "xtypeClass" 	: "sociosdesfiliados",
	                "controllerName": "Strbc.controller.socio.SociosDesfiliados"
	            }
	        }, {
	            text : 'Cobrancas',
	            action : 'openTab',
	            children : {
	                "text" : "Cobrancas",
	                "leaf" : true,
	                "xtypeClass" : "crudProduto",
	                "controllerName" : "Strbc.controller.pagamentos.Pagamentos"
	            }
	        }, {
	            text : 'Aniversariantes',
	            action : 'openTab',
	            children : {
	                "text" : "Aniversariantes",
	                "leaf" : true,
	                "xtypeClass" : "gridaniversariantes",
	                "controllerName" : "Strbc.controller.aniversariante.Aniversariantes"
	            }
	        }
			]
        }
    },{
		text:'Sistema anterior',
		itemId:'sistemaanterior',
		iconCls:'botoes-back'
		}, '->', {
        iconCls : 'usuario-1',
        id : 'btnUsuario',
       // scale : 'large',
        text : 'Administrador',
        menu : {
	        items :
	        [/* {
	            text : 'Alterar Senha',
	            iconCls : 'lock_key',
	            itemId : 'openWindow',
	            tab : {
		            name : 'alterarSenha'

	            }
	        },*//* {
	            text : 'Ajuda',
	            iconCls : 'help-item',
	            itemId : 'logout'
	        },*/ {
	            text : 'Sair',
	            iconCls : 'sair-item',
	            itemId : 'logout'
	        } ]
        }
    } ]
});
