Ext.define('Strbc.controller.devedores.Devedores', {
    extend : 'Ext.app.Controller',

     stores : [ 
    'Strbc.store.Devedores'
         ],

    views : [ 
    'Strbc.view.devedores.GridDevedor', 
     ],

    refs : [ {
        ref : 'login',
        selector : 'login'
    }, {
        ref : 'griddevedor',
        selector : 'griddevedor'
    } ],

    init : function() {
	    var me = this;

	    this.control({
	        
	        'griddevedor button#pesquisar' : {
		        click : me.procurar
	        },
	        'griddevedor' : {
		        afterrender : me.loadStoreDevedores
	        }
	    });

    },

    loadStoreDevedores:function () {
    	var me=this;
       var store=   me.getStrbcStoreDevedoresStore();
        store.getProxy().setExtraParam("dataPesquisa",Ext.Date.format(new Date(), 'Y-m-d'));
	
	store.load({
		
	});
    },

    procurar : function(btn) {
	   var me=this;
	   var data= btn.up().down('#dataPesquisa');
	   var store=   me.getStrbcStoreDevedoresStore();
	console.log(data.value);
	   store.getProxy().setExtraParam("dataPesquisa",Ext.Date.format(data.value, 'Y-m-d'));
	
	store.load({
        callback : function(records, options, success) {
            if (success) {
               console.log('buscou')
            }
        }
    });
	
	
	
    },

    

});

















