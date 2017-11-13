

var FUNCAO = Ext.create('Strbc.util.Funcoes');

Ext.define('Strbc.view.pagamentos.GridPagamentos', {

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

     renderer: function (value, a, d, f, g, h, j, k) {
     	console.log('pagamento')
           
            if (value == 'S') {
                return '<img src="content/ico/pago_sim.png"  title="Pagamento efetuado">' + ' Sim'
            }
            else {
                return '<img src="content/ico/pago_nao.png" title="Não esta pago">' + ' Nao'
            }
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