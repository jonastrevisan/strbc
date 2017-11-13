Ext.define('Strbc.view.pagamentos.WinBoleto', {
    extend: 'Ext.window.Window',
    alias: 'widget.ww',
    height: 500,
    width: 900,
    icon:'http://png.findicons.com/files/icons/1156/fugue/16/barcode.png',
    title: 'Controle de cobrança',
    autoScroll: true,
    modal: true,
    layout: 'fit',
    items: [{
        xtype: 'panel',
        autoScroll: true,
        items: {
            xtype: 'image',
            resizable: true
        }

    },
    ], buttons: [{
        text: 'Imprimir',
        action: 'salvar',
        handler: function (btn) {
            var e = btn.up('window').down('panel');
            var f = e.down('image')
            var html = f.container.dom.innerHTML;
            var win = window.open();
            win.document.write(html);
            win.print();
            win.close();

            /* var URL = "http://www.guiageo-americas.com/imagens/imagem-america-do-sul.jpg";
            var W = window.open(URL);
            W.window.print();
            /*var e = btn.up('window').down('panel');
            var f= e.down('image')
            e.print();
            //console.log();*/
        }
    }, {
        text: 'Cancelar',
        action: 'fechar'
    }]

});