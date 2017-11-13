Ext.define('Strbc.controller.pagamentos.Pagamentos', {
    extend : 'Ext.app.Controller',
    stores : [ 'Strbc.store.Pagamentos' ],

    views : [
        'Strbc.view.pagamentos.GridPagamentos',
        'Strbc.view.pagamentos.WinBoleto',
        'Strbc.view.pagamentos.WinNovoBoleto' ],

    refs : [ {
        ref : 'crudProduto',
        selector : 'crudProduto'
    }, {
        ref : 'winexportacao',
        selector : 'winexportacao'
    }, {
        ref : 'winimportacao',
        selector : 'winimportacao'
    } ],

    init : function() {

	    this.control({
	       
             'crudProduto button[action=novo]': {
                click: this.NovoBoleto
            },
            'crudProduto actioncolumn': {
                click: this.columnaAction_Grid_Boletos
            },
            'winnovoboleto button[action=novo]': {
                click: this.salvarBoleto
            },
            'ww button[action=fechar]': {
                click: this.fecharWindow
            }

	    });

    },
     fecharWindow: function (btn) {
        btn.up('window').close();
    },
    salvarBoleto: function (btn) {
        var me = this;
        var win = btn.up('window');
        var form = win.down('form').getForm();
        var values = form.getValues();
        if (form.isValid()) {

            form.submit({
                url: 'php/boletos/UploadBoleto.php',
                 waitMsg: 'Fazendo upload...',
                params: {
                    pagou: values.PAGO == 'on' ? 'S' : 'N'

                },
                success: function (fp, response) {
                    win.close();
                    Ext.ux.Msg.flash({
                        title: 'Aviso!',
                        msg: 'Salvo com sucesso',
                        type: 'success'
                    });
                    var data = Ext.decode(response.response.responseText);
                    var store = me.getStrbcStorePagamentosStore();
                    store.loadData(data.data);
                },
                error: function () {
                    Ext.ux.Msg.flash({
                        title: 'Aviso!',
                        msg: 'Houve um erro ao salvar',
                        type: 'error'
                    });
                }
            });
        }
    },
    closeWindow: function (btn) {
        btn.up('window').close();
    },
    columnaAction_Grid_Boletos: function (view, cell, row, col, e) {

        var acao = e.getTarget().dataset.qtip;
        var me = this;
        var store = this.getStrbcStorePagamentosStore();

        var objData = me.getStrbcStorePagamentosStore().getAt(row);
        if (acao) {
            switch (acao) {
                case 'Visualizar':
                    var win = Ext.widget('ww');
                    var url = win.down('panel').down('image');
                    url.src = 'image/boleto/' + objData.data.NOME_IMAGEM;
                    win.show();
                    break;
                case 'Deletar':
                    Ext.Msg.confirm('Atencao', 'Deseja realmente deletar este documento?', function (id, value) {
                        if (id === 'yes') {
                            Ext.Ajax.request({
                                method: 'POST',
                                url: 'php/boletos/deletarBoleto.php',
                                params: {
                                    id: objData.data.ID
                                },
                                success: function (input, obj) {

                                    Ext.Ajax.request({
                                        method: 'POST',
                                        url: 'php/deletarArquivo.php',
                                        params: {
                                            arquivo: '../image/boleto/' + objData.data.NOME_IMAGEM
                                        },
                                        success: function (input, obj) {
											store.remove(objData);
                                            Ext.ux.Msg.flash({
                                                title: 'Aviso!',
                                                msg: 'Deletado Com sucesso!',
                                                type: 'success'
                                            });
                                        },
                                        failure: function (response) {
                                            store.remove(objData);
                                            Ext.ux.Msg.flash({
                                                title: 'Aviso!',
                                                msg: 'Ocorreu um erro ao deletar arquivo',
                                                type: 'error'
                                            });
                                        }
                                    });
                                },
                                failure: function (response) {
                                    Ext.ux.Msg.flash({
                                        title: 'Aviso!',
                                        msg: 'Ocorreu um erro ao deletar arquivo',
                                        type: 'error'
                                    });
                                }
                            });
                        }
                    });
                    break;
            }
        }
    },
    NovoBoleto: function () {
        Ext.widget('winnovoboleto').show();
    }
    

});