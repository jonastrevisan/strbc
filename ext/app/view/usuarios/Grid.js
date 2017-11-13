var selModel = Ext.create('Ext.selection.CheckboxModel', {
	mode : 'MULTI'
});

var filters = {
    ftype : 'filters',
    local : true
};

Ext.define('Strbc.view.usuarios.Grid', {
    extend : 'Ext.grid.Panel',
    layout : 'fit',
    flex : 1,
    alias : 'widget.usuariosgrid',
    selModel : selModel,
    features : [ filters ],
    title : 'Usuários',
    store : 'Strbc.store.Usuarios',
    columns : [ {
        xtype : 'actioncolumn',
        header : 'Ação',
        tooltip : 'Editar',
        menuDisabled : true,
        iconCls : 'botoes-edit',
        width : 50
    }, {
        text : 'E-mail/Login',
        dataIndex : 'email',
        flex : 1,
        filter : {
	        type : 'string'
        }
    }, {
        text : 'Nome',
        dataIndex : 'nome',
        filter : {
	        type : 'string'
        }
    }, {
        text : 'Administrador',
        dataIndex : 'admin',
        flex : 1,
        filter : {
	        type : 'string'
        }
    } ],
    tbar : [ {
        xtype : 'button',
        iconCls : 'botoes-add',
        text : 'Inserir',
        itemId : 'inserir',
        width : 110
    }, {
        xtype : 'button',
        iconCls : 'botoes-delete',
        text : 'Remover',
        itemId: 'Remover',
        width : 110
    }, {
        xtype : 'button',
        iconCls : 'botoes-check',
        text : 'Ativar',
        itemId : 'ativar',
        width : 110
    }, {
        xtype : 'button',
        iconCls : 'botoes-uncheck',
        text : 'Inativar',
        itemId : 'inativar',
        width : 110
    } ],
    bbar : {
        xtype : 'pagingtoolbar',
        store : 'Strbc.store.Usuarios',
        pageSize : 10,
        displayInfo : true,
        plugins : Ext.create('Ext.ux.ProgressBarPager')
    }
});