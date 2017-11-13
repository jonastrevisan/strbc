var objCriarTab = Ext.create('Strbc.util.CriarTab');
Ext.define('Strbc.controller.socio.SociosDesfiliados', {
    extend : 'Ext.app.Controller',
    stores : [ 'Strbc.store.SociosDesfiliados' ],

    //storeGrid : Ext.create('Strbc.store.Socios'),
    views : [ 
    'socio.Desfiliados', 
   
     ],

    refs : [ {
        ref : 'sociosdesfiliados',
        selector : 'sociosdesfiliados'
    }

    ],

    init : function() {

	    this.control({
	      
            'sociosdesfiliados actioncolumn': {
                click: this.columnaAction_Grid_Socio_Desfiliado
            }
	    });
    },
   
   
     columnaAction_Grid_Socio_Desfiliado: function (view, cell, row, col, e) {
        //alert('columnaAction_Grid_Socio');
        var acao = e.getTarget().dataset.qtip;
        // var acaox= e.getTarget().className.match(/\bicon-(\w+)\b/);
        var store = this.getStrbcStoreSociosDesfiliadosStore();
        var objData = this.getStrbcStoreSociosDesfiliadosStore().getAt(row);

        if (acao) {//pega o icon-Cls para se referanciar
            switch (acao) {
                case 'Filiar':
                    Ext.Msg.confirm('Atencao', 'Deseja filiar novamente <b>' + objData.data.nome + '</b>?', function (id, value) {
                        if (id === 'yes') {
                            Ext.Ajax.request({
                                method: 'POST',
                                url: 'php/socio/filiar.php',
                                params: {
                                    data: Ext.encode(objData.data)
                                },
                                success: function (input, obj) {
                                    var data = Ext.decode(input.responseText);
                                    if (data.success) {
                                        store.remove(objData);
                                        Ext.ux.Msg.flash({
                                            title: 'Aviso!',
                                            msg: objData.data.nome + ', Filiado novamente',
                                            type: 'success'
                                        });
                                    }
                                    else {
                                        Ext.ux.Msg.flash({
                                            title: 'Atencao!',
                                            msg: 'Houve um erro ao filiar ' + objData.data.nome,
                                            type: 'error'
                                        });
                                    }
                                },
                                failure: function (response) {
                                    Ext.ux.Msg.flash({
                                        title: 'Conexao!',
                                        msg: 'Falha de comunicação com o servidor.',
                                        type: 'error'
                                    });
                                }
                            });
                        }
                    }, this);
                    break;

                /* case 'delete':
                alert("Sell " + rec.get('name'));
                break;*/ 
            }
        }
    }
   

});
