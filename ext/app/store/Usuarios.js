var dadosCliente = [{
			codigo : 123,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'Alterar',
			admin : 'Não'
		}, {
			codigo : 321,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'Alterar',
			admin : 'Sim'
		}, {
			codigo : 999,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'Leitura',
			admin : 'Sim'
		}, {
			codigo : 879,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'grupo',
			admin : 'Sim'
		}, {
			codigo : 879,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'Leitura',
			admin : 'Não'
		}, {
			codigo : 879,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'Alterar',
			admin : 'Sim'
		}, {
			codigo : 879,
			login : 'jonas',
			nome : 'jonas',
			email : 'jonas@Strbc.com',
			permissao : 'Leitura',
			admin : 'Sim'
		}];
Ext.define('Strbc.store.Usuarios', {
			extend : 'Ext.data.Store',

			model : 'Strbc.model.Usuario',
			remoteSort : true,
			autoLoad : true,
			pageSize : 5,
			proxy : {
				type : 'memory',
				enablePaging : true,
				data : dadosCliente,
				reader : {
					type : 'json'
				}
			}

		});