
var FUNCAO = Ext.create('Strbc.util.Funcoes');
Ext.define('Strbc.view.pagamentos.Cadastro', {
     extend: 'Ext.grid.Panel',
    alias : 'widget.crudProduto',
    store: 'Strbc.store.Pagamentos',
   

    columns: [{
        header: "Descricao",
        flex:1,
        dataIndex: 'DESCRICAO'

    },
    
     {
     header: "Pago",
     width: 60,
      dataIndex: 'PAGO',
     renderer: function (value) {
         return FUNCAO.SIM_NAO_POR_EXTENSO(value)
     }
    
 },
      {
          xtype: 'actioncolumn',
          text: 'acões', align: 'center',
          width: 180,
          items: [{
              icon: 'https://cdn3.iconfinder.com/data/icons/text/100/print-16.png',
              tooltip: 'Visualizar',
              style: 'margin-left: 5px;'
          }, '->', 
              {
                  iconCls: 'icon-delete',
                  tooltip: 'Deletar',
                  style: 'margin-left: 5px;'
              }

    ]
      }],

    initComponent: function () {
        this.dockedItems = [
         {
             xtype: 'toolbar',
             dock: 'top',
             items: [{
                 xtype: 'tbspacer',
                 flex: 1
             },
			{
			    xtype: 'button',
			    text: 'Novo',
			    icon: 'http://findicons.com/files/icons/982/dellipack_2/16/plus.png',
			    action: 'novo'
			}

    ]
         }];
        this.callParent(arguments);
    }
});