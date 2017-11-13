Ext.define('Analise', {
    extend : 'Ext.data.Model',
    fields : [ 'codigo', 'origem', 'destino', 'cst', 'icms', 'reducao', 'aliquota', 'mva', 'descricao' ]
});

var dadosAnalise = [ {
    codigo : 1,
    origem : 'SC',
    destino : 'SC',
    cst : 10,
    icms : '12%',
    reducao : '58.82%',
    aliquota : '7%',
    mva : '40%',
    descricao : 'Tributada e com cobrança de ICMS pela substituíção tributária'
}, {
    codigo : 2,
    origem : 'SC',
    destino : 'RS',
    cst : 00,
    icms : '12%',
    reducao : '0%',
    aliquota : '0%',
    mva : '0%',
    descricao : 'Tributada integralmente com ICMS 12%'
}, {
    codigo : 3,
    origem : 'RS',
    destino : 'SC',
    cst : 10,
    icms : '17%',
    reducao : '7%',
    aliquota : '17%',
    mva : '40%',
    descricao : 'Tributada e com cobrança de ICMS pela substituíção tributária'
}, {
    codigo : 4,
    origem : 'SC',
    destino : 'SC',
    cst : 10,
    icms : '7%',
    reducao : '0%',
    aliquota : '0%',
    mva : '40%',
    descricao : 'Tributada integralmente com ICMS 12%'
}, {
    codigo : 5,
    origem : 'SC',
    destino : 'SC',
    cst : 10,
    icms : '12%',
    reducao : '58.82%',
    aliquota : '7%',
    mva : '40%',
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
/*
 * listeners: { deselect: function(model, record, index) { id = record.get('id'); alert(id); }, select: function(model, record, index) { id = record.get('id'); alert(id); } }
 */
});
Ext.define('Strbc.view.analiseDeFiguraFiscal.forms.icms.Detalhe', {
    extend : 'Ext.window.Window',
    xtype : 'basic-window',
    width : 850,
    modal : true,
    title : 'Visualização de figuras fiscais de ICMS/ICMS-ST',
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
                value : '1001'

            }, {
                xtype : 'textfield',
                readOnly : true,
                fieldLabel : 'Descrição',
                value : 'Tributada e com cobrança do ICMS por substiruição tributária'

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
                text : 'Origem',
                dataIndex : 'origem',
                width : 60
            }, {
                text : 'Destino',
                dataIndex : 'destino',
                width : 60
            }, {
                text : 'CST',
                dataIndex : 'cst',
                width : 40
            }, {
                text : 'ICMS',
                dataIndex : 'icms',
                width : 50
            }, {
                text : 'Redução',
                dataIndex : 'reducao',
                width : 70
            }, {
                text : 'Al. Red',
                dataIndex : 'aliquota',
                width : 70
            }, {
                text : 'MVA',
                dataIndex : 'mva',
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