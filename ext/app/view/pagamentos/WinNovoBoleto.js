
Ext.require(['Ext.ux.TextMaskPlugin'])
Ext.define('Strbc.view.pagamentos.WinNovoBoleto', {
    extend: 'Ext.window.Window',
    alias: 'widget.winnovoboleto',
    iconCls: 'botoes-export',
    title: 'Cadastro de Boletos',
    modal: true,
  
    closeAction: 'hide',
    
    // html:'<form action="php/boletos/UploadBoleto.php" id="fileInput" method="POST" enctype="multipart/form-data"> Descrição:<input type="text" name="fname"><br> <input name="file" type="file"> <BR> <input type="submit" value="Enviar"> </form>',
    items: [{
        xtype: 'form',
        layout: 'form',
		border:false,
		    bodyPadding : 5,
        width: 350,
        fieldDefaults: {
            msgTarget: 'side'
        },

        defaultType: 'textfield',
        items: [
		{
		    xtype: 'hiddenfield',
		    name: 'id'
		},
         {
             xtype: 'hiddenfield',
             name: 'matricula'
         }, {
             xtype: 'filefield',
             name: 'uploadedFile',
             fieldLabel: 'Arquivo',
             labelWidth: 50,
             msgTarget: 'side',
             allowBlank: false,
             anchor: '100%',
             buttonText: '...'
         },
		 {
		     fieldLabel: 'Descrição',
		     name: 'DESCRICAO',
		     allowBlank: false

		 },

        {
            xtype: 'checkboxfield',
            boxLabel: 'Pago      .',
            boxLabelAlign: 'before',
            labelWidth: 110,
            name: 'PAGO'
        }
                   ],

        buttons: [{
            text: 'Salvar',
            action: 'novo',
           
        }, {
            text: 'Cancelar',
            handler: function (btn) {
                btn.up('window').close();
            }
        }]

    }]
});

