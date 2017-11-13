Ext.define('Strbc.commons.abstract.Store', {
		extend: 'Ext.data.Store',
		alias: 'data.store',
		constructor: function(config) {
			this.proxy = this.initProxy();
			this.callParent(arguments);
		},
		proxy: {
			type: 'ajax',
			params: {
				start: 0,
				limit: 25
			},
			headers: {
				'ticketAcesso': retornarAccessTicket()
			},
			requestMessage: ''
		},
		autoLoad: false,
		autoSync: false,
		autoSave: false,
		remoteSort: true,
		pageSize: 25,
		baseUrl: '',

		/*listeners: {
			write: function(proxy, operation) {
				// atribui a mensagem de retorno do java para uma propriedade de facil acesso.
				this.proxy.requestMessage = JSON.parse(operation.response.responseText);
			}
		},*/
		initProxy: function() {
			debugger
			return {
				type: 'ajax',
				url: this.baseUrl,
				requestMessage: '',
				headers: {

					'ticketAcesso': retornarAccessTicket()
				},

				reader: {
					type: 'json',
					root: 'data',
					totalProperty: "total",
					successProperty: 'success'
				},
				writer: {
					type: 'json',
					writeAllFields: true,
					allowSingle: true,
					encode: false
				},
				listeners: {
					exception: function(proxy, response, operation) {
						var tabPrincipal = Ext.getCmp('tabCenter');
						//console.log(Strbc);
						//console.log(tabPrincipal);
						debugger
						switch (response.status) {
							case 400:
								// quando o serviço rest estiver com o caminho incorreto.
								logarFalha(proxy, response, operation);

								Ext.ux.Msg.flash({
										msg: JSON.parse(response.responseText).mensagem,
										type: 'warning'
									});
								proxy.requestMessage = JSON.parse('{"mensagem": ""}');
								break;
							case 401:
								// quando o ticket de acesso for inválido.
								logarFalha(proxy, response, operation);

								try {
									// fechar todas as tabs do sistema antes de deslogar o usuário
									tabPrincipal.removeAll();

								} catch (e) {
									console.log('Ocorreu um erro ao fechar as abas da aplicação Strbc' + e.message);
								}

								// remover configurações do login guardadas no session storage.
								sessionStorage.removeItem('ticketAcesso');
								sessionStorage.removeItem('padrao');
								sessionStorage.removeItem('nomeUsuario');
								sessionStorage.removeItem('emailUsuario');

								proxy.requestMessage = JSON.parse('{"mensagem": ""}');

								Ext.ux.Msg.flash({
										msg: JSON.parse(response.responseText).mensagem,
										type: 'warning'
									});
								Strbc.app.fireEvent('authchange', false);
								break;
							case 404:
								// quando o serviço rest estiver com o caminho incorreto.
								logarFalha(proxy, response, operation);
								Ext.ux.Msg.flash({
										msg: 'Não foi possível encontrar o serviço executado.',
										type: 'warning'
									});
								proxy.requestMessage = JSON.parse('{"mensagem": ""}');
								break;
							case 502:
								// quando o servidor recusar a operação
								logarFalha(proxy, response, operation);
								Ext.ux.Msg.flash({
										msg: 'Falha na conexão com o servidor Java Web.',
										type: 'warning'
									});
								proxy.requestMessage = JSON.parse('{"mensagem": ""}');
								break;
							default :
								// quando retornar uma exceção válida e tratada pelo java
								logarFalha(proxy, response, operation);
								// atribui a mensagem de retorno do java para uma propriedade de facil acesso.
								console.log(JSON.parse(response.responseText));
								Ext.ux.Msg.flash({
										msg: JSON.parse(response.responseText).mensagem,
										type: 'warning'
									});
								proxy.requestMessage = JSON.parse('{"mensagem": ""}');
								break;
						}
					}
				}
			};
		}
	});
function logarFalha(proxy, response, operation) {
	console.log('>>Iniciando o log de uma Falha')
	/*console.log('>>Iniciando o log de uma Falha');
	console.log('1- Ocorreu uma falha na comunicação com o serviço ' + proxy.url + ', o ticketAcesso atual é: ' + (proxy.headers.ticketAcesso == '' ? 'em branco' : proxy.headers.ticketAcesso));
	console.log('2- O status da operação com o serviço retornou ' + response.status + ', e o statusText ' + response.statusText);
	console.log('3- Os dados enviados pela aplicação Java Web ' + JSON.stringify(operation.request.jsonData));
	console.log('4- Os dados recebidos do servidor  ' + response.responseText);
	console.log('>>Finalizando o log de uma Falha');*/
};
function retornarAccessTicket() {
	var ticket = sessionStorage.getItem('ticketAcesso');
	if (ticket != undefined) {
		return ticket;
	} else {
		return '';
	}
};
