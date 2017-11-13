Ext.define('Strbc.controller.pagouAte.PagouAte', {
	extend : 'Ext.app.Controller',
	stores : ['Strbc.store.PagouAtes'],
	requires : ['Ext.ux.grid.Printer'],
	views : ['Strbc.view.pagouAte.PagouAte'],

	refs : [],

	init : function() {

		this.control({
			'gridpagadores #pesquisar' : {
				click : this.procurar
			},
			'gridpagadores' : {
				afterrender : this.loadStore
			},
			'gridpagadores #imprimir' : {
				click : this.imprimir
			}

		});

	},
	loadStore : function() {
		var me = this;
		var store = me.getStrbcStorePagouAtesStore();
		store.getProxy().setExtraParam("dataPesquisa", Ext.Date.format(new Date(), 'Y-m-d'));

		store.load({});
	},

	procurar : function(btn) {
		var me = this;
		var data = btn.up().down('#dataPesquisa');
		var store = me.getStrbcStorePagouAtesStore();
		console.log(data.value);
		store.getProxy().setExtraParam("dataPesquisa", Ext.Date.format(data.value, 'Y-m-d'));

		store.load({
			callback : function(records, options, success) {
				if (success) {
					console.log('buscou')
				}
			}
		});
	},
	imprimir : function(btn) {
		Ext.ux.grid.Printer.printAutomatically = true;
		Ext.ux.grid.Printer.pageTitle = 'Imprimir';
		Ext.ux.grid.Printer.printLinkText = "Imprimir";
		Ext.ux.grid.Printer.closeLinkText = 'Fechar';
		Ext.ux.grid.Printer.closeAutomaticallyAfterPrint
		Ext.ux.grid.Printer.print(btn.up('grid'))

	}
});
