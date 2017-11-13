
Ext.require(['Ext.ux.TextMaskPlugin'])
Ext.define('Strbc.view.mensalidades.Win_mensalidade', {
    extend: 'Ext.window.Window',
    alias: 'widget.winmensalidade',
    iconCls: 'botoes-export',
    title: 'Valor da mensalidade',
    modal: true,
    closeAction: 'close',
    bodyPadding: 10,
    items: [{
        xtype: 'form',
        layout: 'form',
		border:false,
        width: 350,
        fieldDefaults: {
            msgTarget: 'side',
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
                fieldLabel: 'Valor', //http://rkn.com.br/git/ExtJS4-TextMask/
                name: 'valor',
                allowBlank: false,
                plugins: 'textmask',
                mask: '9.999.990,00',
                money: true
            }
                   ],

        buttons: [{
            text: 'Salvar',
            action: 'salvar'
        }, {
            text: 'Cancelar',
            action: 'fechar'
        }]

    }]
});
