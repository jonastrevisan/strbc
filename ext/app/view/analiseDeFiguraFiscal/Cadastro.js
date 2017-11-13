var selModel = Ext.create('Ext.selection.CheckboxModel', {
	mode : 'MULTI'
});
var filters = {
    ftype : 'filters',
    local : true
};
Ext.define('Strbc.view.analiseDeFiguraFiscal.Cadastro', {
    extend : 'Ext.panel.Panel',
    alias : 'widget.analisefigurafiscal',
    requires : [ 'Ext.ux.grid.FiltersFeature' ],
    layout : {
        type : 'vbox',
        align : 'stretch',
        pack : 'start'
    },
    items : [ {
        padding : '10',
        xtype : 'form',
        border : false,
        items : [ {
            xtype : 'fieldcontainer',
            layout : 'hbox',
            items : [ {
                xtype : 'textfield',
                fieldLabel : 'GTIN',
                labelWidth : 40
            }, {
                xtype : 'tbspacer',
                width : 10
            },

            {
                xtype : 'button',
                text : 'Procurar',
                iconCls : 'botoes-search',
                width : 110
            }, {
                xtype : 'tbspacer',
                width : 10
            }, {
                xtype : 'button',
                text : 'Limpar',
                iconCls : 'botoes-clear',
                width : 110
            } ]
        }, {

            xtype : 'fieldcontainer',
            layout : 'hbox',

            items : [ {
                xtype : 'textfield',
                fieldLabel : 'NCM',
                labelWidth : 40
            }, {
                xtype : 'tbspacer',
                width : 10
            }, {
                xtype : 'button',
                text : 'Procurar',
                iconCls : 'botoes-search',
                width : 110
            }, {
                xtype : 'tbspacer',
                width : 10
            }, {
                xtype : 'button',
                text : 'Limpar',
                iconCls : 'botoes-clear',
                width : 110
            } ]
        } ]

    }, {
        xtype : 'gridpanel',
        flex : 1,
        layout : 'fit',
        selModel : selModel,
        features : [ filters ],
        title : 'Análise de vinculações de figuras fiscais a produtos',
        store : 'Strbc.store.AnaliseDeFigurasFiscais',
        columns : [ {
            text : 'Código',
            dataIndex : 'codigo',
            width : 100,
            filter : {
	            type : 'int'
            }
        }, {
            text : 'GTIN',
            dataIndex : 'gtin',
            width : 150,
            filter : {
	            type : 'string'
            }
        }, {
            text : 'NCM',
            dataIndex : 'ncm',
            width : 150,
            filter : {
	            type : 'string'
            }
        }, {
            text : 'Tipo Figura',
            dataIndex : 'figura',
            flex : 1,
            filter : {
	            type : 'string'
            }
        }, {
            text : 'Descrição',
            dataIndex : 'descricao',
            flex : 2,
            filter : {
	            type : 'string'
            }
        }, {
            xtype : 'actioncolumn',
            header : 'Ações',
            menuDisable : true,
            width : 80,
            items : [ {
                iconCls : 'botoes-search',
                tooltip : 'Icms'
            }, {
                iconCls : 'botoes-search',
                tooltip : 'PisCofins'
            } ]
        } ],
        tbar : [ {
            xtype : 'button',
            iconCls : 'botoes-delete',
            text : 'Remover',
            width : 110
        }, {
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
        } ],
        bbar : {
            xtype : 'pagingtoolbar',
            store : 'Strbc.store.AnaliseDeFigurasFiscais',
            pageSize : 5,
            displayInfo : true,
            plugins : Ext.create('Ext.ux.ProgressBarPager')
        }
    } ]
});