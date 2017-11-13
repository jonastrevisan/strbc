Ext.define('Strbc.controller.usuarios.Usuarios', {    
    extend : 'Ext.app.Controller',
    require: 'Strbc.view.usuarios.Grid',
    
    stores : [ 
	     'Strbc.store.Usuarios',
	     'Strbc.store.BasesUsuarios',
	     'Strbc.store.Permissoes'
	],
    
	views : [ 
         'Strbc.view.usuarios.Cadastro',
         'Strbc.view.usuarios.Edit'
    ],

    refs : [{
        ref : 'cadastrousuarios',
        selector : 'cadastrousuarios'
    },
    {
        ref : 'usuariosgrid',
        selector : 'usuariosgrid'
    },
    {
        ref : 'usuariosedit',
        selector : 'usuariosedit'
    }],

    init : function()
    {

	    this.control({
	    	'cadastrousuarios button#inserir' : {
		        click : this.inserir
	        },        
	    	'cadastrousuarios button#inativar' : {
		        click : this.inativar
	        },
	        'cadastrousuarios button#ativar' : {
		        click : this.ativar
	        },
	        'usuariosedit button#salvar' : {
		        click : this.salvar
	        },
	        'cadastrousuarios actioncolumn' : {
		        click : this.editar
	        },
	    });

    },
    
    editar: function() {    	
		var records = this.getUsuariosgrid().getSelectionModel().getSelection();
		
		if(records.length === 1){
			var view = Ext.widget('usuariosedit'),
				frmUsuario = view.down('form'),
				record = records[0];
			
			frmUsuario.loadRecord(record);
			view.setTitle('Editando usuário');
		} else return;
	},
    
    salvar : function(btn, evt) {
    	var winUsuario  = btn.up('window'),
        frmUsuario    = winUsuario.down('form').getForm(),
    	storePermissoes	= winUsuario.down('grid').getStore();
    	
	    if (frmUsuario.isValid()) {
	
	        var record = frmUsuario.getRecord(),
	            values = frmUsuario.getValues();
	        
	        var storeUsuarios = Ext.create('Strbc.store.Usuarios');
	        
	        if (record) {
	            // Quando existe dados
	            if(record.data['codigo']) {
	                record.set(values);	                
	            }
	        } else {
	            // Quando não existe
	        	var record = Ext.create('Strbc.model.Usuario');
	            record.set(values);            
	            
	            storeUsuarios.add(record);
	            
	        }
	        storeUsuarios.sync();	        
	        storePermissoes.sync();
	        
	        window.close();
	
	    } else {
	        Ext.ux.Msg.Flash({
	            msg     : 'Formulário inválido',
	            type    : 'error'
	        });
	    }
    },
    
    inserir	: function() {
	        	var view = Ext.widget('usuariosedit');
    	view.setTitle('Inserindo usuário');
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
		    Ext.Msg.alert('Selecionados', 'Selecione uma ou mais linhas para efetuar esta opera��o');
	    }

    }
});