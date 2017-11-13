Ext.define('Strbc.controller.principal.Principal', {
    extend : 'Ext.app.Controller',

    stores : [
   //  'GraficosGerais', 
   // 'BasesUsuarios', 
    //'AlterarSenhas', 
  //  'Menus',
    // 'RecuperarBases' 
     ],

    views : [
     'Ext.ux.TabCloseMenu', 
    'Strbc.view.ViewportMain',
     'Strbc.view.principal.TabInicio', 
    // 'Strbc.view.principal.GraficoGeral',
      'Strbc.view.principal.Toolbar',
        'Strbc.view.principal.Tree', 
       // 'Strbc.view.window.AlterarSenha',
         //'Strbc.view.window.WinBase' 
         ],
    refs : [ {
        ref : 'toolbarprincipal',
        selector : 'toolbarprincipal'
    }, {
        ref : 'winbases',
        selector : 'winbases'
    } ],

    init : function() {

	    this.control({
	        'tabinicio' : {
		        //activate : this.carregarGrafico
	        },
	        'menuStrbc' : {
		        afterrender : this.buscarMenu
	        },

	        'toolbarprincipal' : {
		        afterrender : this.mostrarDadosDoUsuario
	        },
			'toolbarprincipal button#sistemaanterior' : {
		        click : this.sistemaanterior
	        },
	        'toolbarprincipal menuitem#logout' : {
		        click : this.login
	        },
	        'toolbarprincipal menuitem[action=openTab]' : {
		        click : this.abrirTab
	        },
	        'toolbarprincipal menuitem#openWindow' : {
		        click : this.abrirJanela
	        },
	        'toolbarprincipal menuitem#winbases' : {
		        click : this.setarBasePadrao
	        },

	        'winbases button#ok' : {
		        click : this.selecionarBase
	        },
	        'winbases button#closewindow' : {
		        click : this.fecharJanela
	        },
	        'alterarSenha button#alterarSenha' : {
		        click : this.alterarSenha
	        },
	        'alterarSenha button#closewindow' : {
		        click : this.fecharJanela
	        }
	    });

    },
sistemaanterior:function(){
	document.location.href='../index_original.php';
	
	},
    buscarMenu : function(menu) {
	    /*
		 * var me = this; console.log('menu'); console.log(menu); var store = me.getMenuStrStore(); store.proxy.headers.ticketAcesso = sessionStorage.getItem('ticketAcesso'); store.removeAll();
		 * store.add({ "id" : 1, "nome" : "adriano", "email" : "teste", "admin" : false }); store.sync({ success : function(batch) { var obj = Ext.decode(batch.operations[0].response.responseText);
		 * Ext.encode(obj.data) } });
		 */

    },

    mostrarDadosDoUsuario : function(toolbar) {
	    toolbar.down('#btnUsuario').setText(sessionStorage.getItem('nomeUsuario'));

    },

    setarBasePadrao : function() {
	    var me = this;
	    var winBases = Ext.widget('winbases').show();
	    var frmBases = winBases.down('form');
	    var storeCombo = frmBases.getForm().findField('Id').getStore();

	    var possuiBaseSelecionada = false;
	    var basePadrao = 0;

	    var storeBases = me.getRecuperarBasesStore();
	    storeBases.data.clear();
	    storeBases.add({});
	    storeBases.sync({
	        success : function(batch) {debugger
		        var arrayBases = batch.proxy.requestMessage;
		        for ( var i = 0; i < arrayBases.length; i++) {
			        if (arrayBases[i].padrao) {
				        possuiBaseSelecionada = true;
				        basePadrao = arrayBases[i].id;
			        }
		        }
		        if (!possuiBaseSelecionada) {
			        storeCombo.loadData(arrayBases);
			        winBases.show();
		        } else {
			        storeCombo.loadData(arrayBases);
			        frmBases.getForm().findField('Id').setValue(parseInt(basePadrao));
		        }
	        },
	        failure : function(batch) {
		        Ext.ux.Msg.flash({
		            msg : batch.proxy.requestMessage.mensagem,
		            type : 'error'
		        });
	        }
	    });
    },

    carregarGrafico : function() {
	    var me = this;
	    var store = me.getGraficosGeraisStore();
	    store.proxy.headers.tratarInformacao = false;
	    store.proxy.headers.ticketAcesso = sessionStorage.getItem('ticketAcesso');
	    store.add({});
	    store.sync({
		    success : function(batch) {
			    store.loadData(batch.proxy.requestMessage);
		    }
	    });
    },

    abrirJanela : function(btn) {
	    // btn.tab.name é um parametro que informa qual a widget deve ser
	    Ext.widget(btn.tab.name).show();
    },

    fecharJanela : function(btn) {
	    btn.up('window').close();
    },

    alterarSenha : function(btn) {
	    var frmAlterarSenha = btn.up('form'), values = frmAlterarSenha.getValues();

	    if (frmAlterarSenha.isValid()) {
		    store = Ext.create('Strbc.store.AlterarSenhas');
		    store.add(values);
		    store.sync();
	    }

	    btn.up('window').close();
    },

    selecionarBase : function(btn) {
	    var me = this;
	    var winBases = btn.up('window');
	    var frmBases = btn.up('form');
	    var formValues = frmBases.getForm();
	    var store = formValues.findField('Id').getStore();
	    var rec = store.findRecord('id', formValues.findField('Id').value);
	    rec.set("padrao", true);
	    if (frmBases.isValid()) {
		    store.proxy.url = '/Strbc/rs/DefinicaoBasePadraoUsuario';
		    store.proxy.headers.ticketAcesso = sessionStorage.getItem('ticketAcesso');
		    store.sync({
		        success : function(batch) {
		        	winBases.close();
		        	
		        	me.application.fireEvent('authchange', !!sessionStorage.getItem('ticketAcesso'));
		        	
			        Ext.ux.Msg.flash({
			            msg : batch.proxy.requestMessage.mensagem,
			            type : 'success'
			        });
			        
		        },
		        failure : function(batch) {
			        winBases.close();
		        }
		    });
	    }
    },

    abrirTab : function(btn) {
	    var S1controller = btn.children.controllerName;
	    if (S1controller) {
		    var tabPrincipal = Ext.getCmp('tabCenter');
		    if (btn.children.leaf) {
			    var abaAberta = tabPrincipal.items.findBy(function(aba) {
				    return aba.title === btn.children.text;
			    });
			    // Abre a aba se estiver fechada. Caso
			    // esteja aberta, ativa a aba novamente.
			    if (!abaAberta) {
				    // Carrega os controllers somente quando ?
				    // clicado sobre o item do menu.
				    Strbc.app.getController(S1controller);
				    tabPrincipal.add({
				        title : btn.children.text || 'Tela do sistema',
				        closable : true,
				        layout : 'fit',
				        closeAction : 'close',
				        items : {
					        xtype : btn.children.xtypeClass
				        }
				    }).show();
			    } else {
				    tabPrincipal.setActiveTab(abaAberta);
			    }

		    }
	    }

    },

    login : function() {
	    var me = this.application;
	    Ext.MessageBox.confirm('Atenção', 'Deseja realmente sair do sistema?', confirmFunction);
	    function confirmFunction(btn) {
		    if (btn == 'yes') {
			    sessionStorage.removeItem('ticketAcesso');
			    sessionStorage.removeItem('nomeUsuario');
			    me.fireEvent('authchange', false);
		    }
	    }
    },

    verificaAutenticacao : function() {debugger
	    this.application.fireEvent('authchange', 1 > 2);//!!sessionStorage.getItem('ticketAcesso'));
    }

});