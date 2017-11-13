Ext.define('Strbc.commons.abstract.Controller', {
	extend      : 'Ext.app.Controller',
    editTitle   : '',
    insertTitle : '',
    
    gridWidget	: '',
    editWidget	: '',
    
    modelName 	: '',
    storeName	: '',
    
    editar : function(){
    	var records =  this.getGridList().getSelectionModel().getSelection();
    	
    	if (records.length === 1) {
			var view = Ext.widget(this.editWidget),
				form = view.down('form'),
				record = records[0];
			
			form.loadRecord(record);
		} else {
			return;
		}
    },    
    
    salvar : function(btn, evt) {
    	var window  = btn.up('window'),
        	form    = window.down('form').getForm();
    	
	    if (form.isValid()) {	
	        var record = form.getRecord(),
	            values = form.getValues(),     
	            storeSalvar = Ext.create(this.storeName);
	        
	        if (record) {	            
	            if(record.data['codigo']) {
	                record.set(values);	                
	            }
	        } else {
	            var record = Ext.create(this.modelName);
	            record.set(values);            
	            
	            storeSalvar.add(record);	            
	        }
	        
	        storeSalvar.sync();	        
	        window.close();	
	    } else {
	        Ext.ux.Msg.Flash({
	            msg     : 'Formulário inválido',
	            type    : 'error'
	        });
	    }
    },
    
    inserir	: function() {
    	var view = Ext.widget(this.editWidget);
    	view.setTitle(this.insertTitle);
    	view.show();
    },
    
    inativar : function(btn) {

	    var getData = btn.up('grid').getSelectionModel().getSelection();
	    var selecionados = 'Voce selecionou os seguintes:</br> ';
	    if (getData.length > 0)
	    {
		    for ( var i = 0; i < getData.length; i++)
		    {
			    selecionados += '<b>codigo</b> :' + getData[i].get('codigo') + ', <b>Nome</b> :' + getData[i].get('nome') + '</br>';
		    }
		    Ext.Msg.alert('Selecionados', selecionados);

	    } else
	    {
		    Ext.Msg.alert('Selecionados', 'Selecione uma ou mais linhas para efetuar esta opera��o');
	    }

    },
    ativar : function(btn)
    {

	    var getData = btn.up('grid').getSelectionModel().getSelection();
	    var selecionados = 'Voce selecionou os seguintes:</br> ';
	    if (getData.length > 0)
	    {
		    for ( var i = 0; i < getData.length; i++)
		    {
			    selecionados += '<b>codigo</b> :' + getData[i].get('codigo') + ', <b>Nome</b> :' + getData[i].get('nome') + '</br>';
		    }
		    Ext.Msg.alert('Selecionados', selecionados);

	    } else
	    {
		    Ext.Msg.alert('Selecionados', 'Selecione uma ou mais linhas para efetuar esta operação');
	    }

    }
});