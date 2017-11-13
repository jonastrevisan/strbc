
Ext.require(['Ext.ux.TextMaskPlugin']);
Ext.define('Strbc.view.mensalidades.Win_cad_ano', {
    extend: 'Ext.window.Window',
    alias: 'widget.wincadano',
    iconCls: 'botoes-export',
    title: 'Cadastro de mensalidades',
    modal: true,
    bodyPadding: 10,
    items: [{
        xtype: 'form',
        layout: 'form',
		border:false,
        width: 350,
        fieldDefaults: {
            msgTarget: 'side'
        },

        defaultType: 'textfield',
        items: [
		{
            xtype: 'hiddenfield',
            name: 'idpagto'
        },
        {
            xtype: 'hiddenfield',
            name: 'cd_conta_receber'
        }, {
            xtype: 'hiddenfield',
            name: 'matricula'
        },
		 {
                fieldLabel: 'Ano', 
                name: 'ano',
				maskRe:/[0-9]/,
				allowBlank: false
              
            },
            {
                fieldLabel: 'Valor mensal', //http://rkn.com.br/git/ExtJS4-TextMask/
                name: 'valor',
                allowBlank: false,
                plugins: 'textmask',
                mask: '9.999.990,00',
                money: true
            },
        {
         xtype: 'checkboxfield',
         boxLabel  : 'Ano todo pago',
		 boxLabelAlign:'before',
		 labelWidth:110,
          name : 'anotodo'
        }
                   ],

        buttons: [{
            text: 'Salvar',
            action: 'salvarano'
        }, {
            text: 'Cancelar',
            action: 'fechar'
        }]

    }]
});
