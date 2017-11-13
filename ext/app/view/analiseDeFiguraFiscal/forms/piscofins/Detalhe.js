Ext.define('Analise', {
    extend : 'Ext.data.Model',
    fields : [ 'codigo', 'cfop', 'cst', 'piscum', 'pisncum', 'cofinscum', 'cofinsncum', 'descricao' ]
});

var dadosAnalise = [ {
    codigo : 1,
    cfop : 5101,
    cst : 10,
    piscum : 0.75,
    pisncum : 1.65,
    cofinscum : 5,
    cofinsncum : 7.6,
    descricao : 'Tributada e com cobrança de ICMS pela substituíção tributária'
}, {
    codigo : 2,
    cfop : 5102,
    cst : 00,
    piscum : 0.85,
    pisncum : 1.85,
    cofinscum : 5,
    cofinsncum : 7.6,
    descricao : 'Tributada integralmente com ICMS 12%'
}, {
    codigo : 3,
    cfop : 5103,
    cst : 10,
    piscum : 0.75,
    pisncum : 1.55,
    cofinscum : 5,
    cofinsncum : 7.6,
    descricao : 'Tributada e com cobrança de ICMS pela substituíção tributária'
}, {
    codigo : 4,
    cfop : 5104,
    cst : 10,
    piscum : 0.65,
    pisncum : 1.65,
    cofinscum : 3,
    cofinsncum : 7.6,
    descricao : 'Tributada integralmente com ICMS 12%'
}, {
    codigo : 5,
    cfop : 5105,
    cst : 10,
    piscum : 0.75,
    pisncum : 1.85,
    cofinscum : 3,
    cofinsncum : 7.6,
    descricao : 'Tributada e com cobrança de ICMS pela substituíção tributária'
} ];

var storeAnalise = Ext.create('Ext.data.Store', {
    model : 'Analise',
    remoteSort : true,
    autoLoad : true,
    pageSize : 10,
    proxy : {
        type : 'memory',
        enablePaging : true,
        data : dadosAnalise,
        reader : {
	        type : 'json'
        }
    }
});
var selModel = Ext.create('Ext.selection.CheckboxModel', {
	mode : 'SINGLE',
});

Ext.define('Strbc.view.analiseDeFiguraFiscal.forms.piscofins.Detalhe', {
    extend : 'Ext.window.Window',
    xtype : 'basic-window',
    width : 850,
    modal : true,
    title : 'Visualização de figuras fiscais de PIS/Cofins',
    autoScroll : true,
    bodyPadding : 5,
    items : [ {
        xtype : 'container',
        items : [ {
            xtype : 'fieldset',
            title : 'Informações Básicas',
            layout : 'anchor',
            collapsible : true,
            defaults : {
	            anchor : '100%'
            },
            items : [ {
                xtype : 'textfield',
                readOnly : true,
                fieldLabel : 'Código',
                value : '2002'

            }, {
                xtype : 'textfield',
                readOnly : true,
                fieldLabel : 'Descrição',
                value : 'Operação tributável com alíquota básica'

            } ]
        }, {
            xtype : 'gridpanel',
            flex : 1,
            selModel : selModel,
            title : 'Análise de vinculações de figuras fiscais a produtos',
            border : true,
            frame : true,
            store : storeAnalise,
            columns : [ {
                text : 'Código',
                dataIndex : 'codigo',
                width : 60
            }, {
                text : 'CFOP',
                dataIndex : 'cfop',
                width : 60
            }, {
                text : 'CST',
                dataIndex : 'cst',
                width : 40
            }, {
                text : 'PIS Cum.',
                dataIndex : 'piscum',
                width : 70
            }, {
                text : 'PIS ñ Cum.',
                dataIndex : 'pisncum',
                width : 70
            }, {
                text : 'Cofins Cum.',
                dataIndex : 'cofinscum',
                width : 50
            }, {
                text : 'Cofins ñ Cum.',
                dataIndex : 'cofinsncum',
                width : 50
            }, {
                text : 'Descrição',
                dataIndex : 'descricao',
                flex : 1
            } ],
            bbar : {
                xtype : 'pagingtoolbar',
                store : storeAnalise,
                pageSize : 5,
                displayInfo : true,
                plugins : Ext.create('Ext.ux.ProgressBarPager')
            }
        } ]

    } ],

    buttons : [ {
        xtype : 'button',
        iconCls : 'botoes-print',
        text : 'Imprimir',
        width : 110,
        listeners : {
	        click : function() {
		        Ext.ux.Msg.flash({
		            msg : 'Enviado para impressora!',
		            type : 'success'
		        });
	        }
        }
    }, {

        text : 'Fechar',
        iconCls : 'botoes-close',
        listeners : {
	        click : function() {
		        this.up('window').close();
	        }
        }

    } ]

});