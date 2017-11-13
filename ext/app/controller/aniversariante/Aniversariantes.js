Ext.define('Strbc.controller.aniversariante.Aniversariantes', {
    extend : 'Ext.app.Controller',

     stores : [ 
    'Strbc.store.Aniversariantes'
         ],

    views : [ 
    'Strbc.view.aniversariantes.GridAniversariantes', 
     ],

    refs : [ {
        ref : 'login',
        selector : 'login'
    }, {
        ref : 'recuperarsenha',
        selector : 'recuperarsenha'
    } ],

    init : function() {
	    var me = this;

	    this.control({
	        /*'login' : {
		        enterExecute : me.fazerLogin
	        },
	        'login button#login' : {
		        click : me.fazerLogin
	        },
	        'login button#recuperarSenha' : {
		        click : me.recuperarSenha
	        },
	        'recuperarsenha button#closewindow' : {
		        click : this.closeWindow
	        },
	        'toolbar[itemId=mainmenu] button[itemId=userbutton] menuitem[itemId=userlogout]' : {
		        click : me.encerrarSessao
	        }*/
	    });

    },

    

    closeWindow : function(btn) {
	    btn.up('window').close();
    },

    recuperarSenha : function() {
	    var frmLogin = this.getLogin().getValues();
	    var winRecuperarSenha = Ext.widget('recuperarsenha');
	    winRecuperarSenha.down('form').getForm().setValues({
		    usuario : frmLogin.usuario
	    });
	    winRecuperarSenha.show();
    },

    encerrarSessao : function() {
	    sessionStorage.removeItem('ticketAcesso');
	    this.application.fireEvent('authchange', false);
    },

    fazerLogin : function() {
	    var me = this;
	    var frmLogin = this.getLogin(), values = frmLogin.getValues();

	    if (frmLogin.isValid()) {
		    var storeLogin = me.getLoginsStore();
		    //storeLogin.proxy.headers.ticketAcesso = '';
		    storeLogin.add(values);
			storeLogin.getProxy().setExtraParam("usuario", values.usuario);
			storeLogin.getProxy().setExtraParam("senha", values.senha);
		    storeLogin.sync({
			
		        success : function(batch) {
				   if(batch.proxy.requestMessage.success)
				   {
					   sessionStorage.setItem('ticketAcesso',batch.proxy.requestMessage.ticket);
					   me.application.fireEvent('authchange', !!sessionStorage.getItem('ticketAcesso'));
					   //sessionStorage.setItem('ticketAcesso', batch.proxy.requestMessage.admin);
					    Ext.ux.Msg.flash({
				            msg : 'Login efetuado com sucesso',
				            type : 'success'
				        });
					   }  
			        else {
                         me.application.fireEvent('authchange', false);
				        Ext.ux.Msg.flash({
				            msg : 'Informações do usuário são insuficientes para verificar acesso a base de dados',
				            type : 'error'
				        });
			        }
		        },
		        failure : function(batch) {
                     me.application.fireEvent('authchange',false);
			        Ext.ux.Msg.flash({
			            msg : batch.proxy.requestMessage.mensagem,
			            type : 'error'
			        });
		        }
		    });
	    }
    },

    verificarAutenticacao : function() {
	    this.application.fireEvent('authchange', !!sessionStorage.getItem('ticketAcesso'));
    }

});
