Ext.define('Strbc.controller.autenticacao.Logins', {
		extend: 'Ext.app.Controller',

		models: ['Login'],

		stores: ['Logins'],

		views: ['Strbc.view.autenticacao.Form', 'Strbc.view.ViewportAuth'],

		refs: [{
					ref: 'login',
					selector: 'login'
				}, {
					ref: 'recuperarsenha',
					selector: 'recuperarsenha'
				}],

		init: function() {
			var me = this;

			this.control({
					'login': {
						enterExecute: me.fazerLogin
					},
					'login button#login': {
						click: me.fazerLogin
					},
					'login button#recuperarSenha': {
						click: me.recuperarSenha
					},
					'recuperarsenha button#closewindow': {
						click: this.closeWindow
					},
					'toolbar[itemId=mainmenu] button[itemId=userbutton] menuitem[itemId=userlogout]': {
						click: me.encerrarSessao
					},
					'login checkbox#lembrar': {
						afterrender: me.verificarCookie
					}
				});

		},
		verificarCookie: function(check) {
			console.log(check);
			var devemosPreencherForm = Ext.util.Cookies.get("lembrarSenha");
			console.log(devemosPreencherForm);
			var usuario = '', senha = '';
			// Nem pense em deixar apenas if (devemosPreencherForm)
			// ele precisa ser verdadeiro ao invez de existir
			if (devemosPreencherForm == 'S') {
				usuario = Ext.util.Cookies.get("usuario");
				senha = Ext.util.Cookies.get("senha");
				check.setValue(true);
			} else {
				check.setValue(false);
			}

			check.up('form').getForm().setValues({
					'usuario': usuario,
					'senha': senha
				});
		},

		closeWindow: function(btn) {
			btn.up('window').close();
		},

		recuperarSenha: function() {
			var frmLogin = this.getLogin().getValues();
			var winRecuperarSenha = Ext.widget('recuperarsenha');
			winRecuperarSenha.down('form').getForm().setValues({
					usuario: frmLogin.usuario
				});
			winRecuperarSenha.show();
		},

		encerrarSessao: function() {
			sessionStorage.removeItem('ticketAcesso');
			this.application.fireEvent('authchange', false);
		},

		fazerLogin: function() {
			var me = this;
			var frmLogin = this.getLogin(), values = frmLogin.getValues();

			if (frmLogin.isValid()) {
				var storeLogin = me.getLoginsStore();
				// storeLogin.proxy.headers.ticketAcesso = '';
				storeLogin.add(values);
				storeLogin.getProxy().setExtraParam("usuario", values.usuario);
				storeLogin.getProxy().setExtraParam("senha", values.senha);
				debugger

				var sParams = {
					"usuario": values.usuario,
					"senha": values.senha
				}
				Ext.Ajax.request({
						url: 'php/autenticacao/login.php',
						method: 'GET',
						params: sParams,
						success: function(batch) {
							debugger
							// if(batch.proxy.requestMessage.success)
							// {
							if (values.lembrar == 'on') {
								Ext.util.Cookies.set('lembrarSenha', 'S');
								Ext.util.Cookies.set('senha', values.senha);
								Ext.util.Cookies.set('usuario', values.usuario);
							} else {
								Ext.util.Cookies.set('lembrarSenha', 'N');
								Ext.util.Cookies.set('senha', '');
								Ext.util.Cookies.set('usuario', '');
							}
							sessionStorage.setItem('ticketAcesso', Ext.decode(batch.responseText).ticket);
							me.application.fireEvent('authchange', !!sessionStorage.getItem('ticketAcesso'));
							// sessionStorage.setItem('ticketAcesso',
							// batch.proxy.requestMessage.admin);
							Ext.ux.Msg.flash({
									msg: 'Login efetuado com sucesso',
									type: 'success'
								});
							// }
							/*
							 * else {
							 * me.application.fireEvent('authchange',
							 * false); Ext.ux.Msg.flash({ msg :
							 * 'Informações do usuário são
							 * insuficientes para verificar
							 * acesso a base de dados', type :
							 * 'error' }); }
							 */
						},
						failure: function(batch) {
							debugger
							me.application.fireEvent('authchange', false);
							Ext.ux.Msg.flash({
									msg: batch.proxy.requestMessage.mensagem,
									type: 'error'
								});
						}

					});

				/*
				 * storeLogin.sync({ success : function(batch) {
				 * if(batch.proxy.requestMessage.success) {
				 * if(values.lembrar == 'on'){
				 * Ext.util.Cookies.set('lembrarSenha','S');
				 * Ext.util.Cookies.set('senha',values.senha);
				 * Ext.util.Cookies.set('usuario',values.usuario);
				 * }else{ Ext.util.Cookies.set('lembrarSenha','N');
				 * Ext.util.Cookies.set('senha','');
				 * Ext.util.Cookies.set('usuario',''); }
				 * sessionStorage.setItem('ticketAcesso',batch.proxy.requestMessage.ticket);
				 * me.application.fireEvent('authchange',
				 * !!sessionStorage.getItem('ticketAcesso'));
				 * //sessionStorage.setItem('ticketAcesso',
				 * batch.proxy.requestMessage.admin);
				 * Ext.ux.Msg.flash({ msg : 'Login efetuado com
				 * sucesso', type : 'success' }); } else {
				 * me.application.fireEvent('authchange', false);
				 * Ext.ux.Msg.flash({ msg : 'Informações do
				 * usuário são insuficientes para verificar acesso
				 * a base de dados', type : 'error' }); } }, failure :
				 * function(batch) {
				 * me.application.fireEvent('authchange',false);
				 * Ext.ux.Msg.flash({ msg :
				 * batch.proxy.requestMessage.mensagem, type :
				 * 'error' }); } });
				 */
			}
		},

		verificarAutenticacao: function() {
			this.application.fireEvent('authchange', !!sessionStorage.getItem('ticketAcesso'));
		}

	});
