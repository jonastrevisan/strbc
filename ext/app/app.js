Ext.Loader.setConfig({
	enabled : true
});

Ext.Loader.setPath('Ext.ux', 'app/commons/vendor');
Ext.Loader.setPath('Config', 'app/commons/config');

Ext.application({

	name : 'Strbc',
	appFolder : 'app',

	controllers : ["Strbc.controller.autenticacao.Logins", 
					"Strbc.controller.principal.Principal", 
					'Strbc.controller.pagouAte.PagouAte', 
					'Strbc.controller.devedores.Devedores',
					'Strbc.controller.aniversariante.Aniversariantes',
					'Strbc.controller.socio.Socios',
					'Strbc.controller.socio.SociosDesfiliados'//,
					//'Strbc.controller.usuarios.Usuarios'
					],

	launch : function() {
		Strbc.app = this;

		this.on({
			authchange : this.onAuthChange,
			getTicket : this.retornarAccessTicket,
			sleep : this.sleep
		});

		this.getController('Strbc.controller.autenticacao.Logins').verificarAutenticacao();
	},

	onAuthChange : function(estaAutorizado) {debugger
		if (this.viewport) {
			this.viewport.destroy();
		}

		this.viewport = Ext.create( estaAutorizado ? 'Strbc.view.ViewportMain' : 'Strbc.view.ViewportAuth');

	},

	retornarAccessTicket : function() {
		var ticket = sessionStorage.getItem('ticketAcesso');
		if (!this.isEmpty(ticket)) {
			return ticket;
		} else {
			return 'login';
		}
	},

	sleep : function(milliseconds) {
		var start = new Date().getTime();
		for (var i = 0; i < 1e7; i++) {
			if ((new Date().getTime() - start) > milliseconds) {
				break;
			}
		}
	},

	isEmpty : function(val) {
		return (val === undefined || val == null || val.length <= 0) ? true : false;
	}
});
