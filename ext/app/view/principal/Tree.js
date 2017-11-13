Ext.define('Strbc.view.principal.Tree', {

    extend 		: 'Ext.tree.Panel',

    width 		: 255,

    xtype 		: 'StrbcMenu',

    title 		: 'Menu',

    rootVisible : false,

    autoScroll 	: true,

    collapsible : true,

    animate 	: true,

    useArrows 	: true,

    border 		: true,

    itemId 		: 'treePanelPrincipal',

    

    dockedItems : [{ 

        xtype : 'toolbar',

        items : [{

            text : 'Expandir todos',

            iconCls : 'expand',

            handler : function() {

	            this.up('#treePanelPrincipal').expandAll();

            }

        }, {

            text : 'Contrair todos',

            iconCls : 'collapse',

            handler : function() {

	            this.up('#treePanelPrincipal').collapseAll();

            }

        } ]

    } ],

    listeners : {



	    /**

		 * 

		 * Abre uma nova aba. Caso a aba esteja aberta n�o � feito o procedimento de abertura.

		 * 

		 */

	    itemclick : function(view, record, item, index, evt, options) {



		    var S1controller = record.raw['controllerName'];

		    if (S1controller) {

			    var tabPrincipal = Ext.getCmp('tabCenter');

			    if (record.get('leaf')) {

				    var abaAberta = tabPrincipal.items.findBy(function(aba) {

					    return aba.title === record.get('text');

				    });

				    // Abre a aba se estiver fechada. Caso

				    // esteja aberta, ativa a aba novamente.

				    if (!abaAberta) {

					    // Carrega os controllers somente quando �

					    // clicado sobre o item do menu.

					    Strbc.app.getController(S1controller);

					    tabPrincipal.add({

					        title : record.get('text') || 'Tela do sistema',

					        closable : true,

					        layout : 'fit',

					        closeAction : 'close',

					        items : {

						        xtype : record.raw['xtypeClass']

					        }

					    }).show();

				    } else {

					    tabPrincipal.setActiveTab(abaAberta);

				    }



			    }

		    }

	    }

    },

    store : Ext.create('Ext.data.TreeStore', {

	    proxy : {

	        type : 'ajax',

	        url : 'serverside/menu/items.json'

	        

	    }

    })

});