var filters = {
    ftype: 'filters',
    local: false,
    phpMode: true
};
var FUNCAO = Ext.create('Strbc.util.Funcoes');
Ext.define('Strbc.view.aniversariantes.GridAniversariantes', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.gridaniversariantes',
    requires: ['Ext.ux.grid.FiltersFeature'],
    boder: false,
    loadMask: false,
   // requires: ['Ext.toolbar.Paging', 'Ext.ux.grid.FiltersFeature', 'Sindicato.override.PagingToolbar'],
    store: 'Strbc.store.Aniversariantes',
    features: [filters],
    columns: [{
        header: "Matricula",
        width: 90,
        dataIndex: 'matricula',
        filter: {
            type: 'int'
        }
    },
       {
           header: "NOME",
           width: 170,
           flex: 1,
           dataIndex: 'nome',
           renderer: function (value, metaData, record) {
			var diaMesAniver=   record.data.datanascimento.getDate()+'/'+ record.data.datanascimento.getMonth();
			var hojeMes = new Date().getDate()+'/'+ new Date().getMonth();
			   if (diaMesAniver == hojeMes) {
                return '<img src="content/ico/present.png"  title="Esta de aniversário hoje"> ' + record.data.nome
            }
           else{
			   return record.data.nome;
			   }
			  
           },
           filter: {
               type: 'string'
           }
       },
     {
	 
			xtype: 'datecolumn',
			dataIndex: 'datanascimento',
			 flex:1,
			 header: "Data Nascimento",
			format: 'd/m/Y',
           filter: {
               type: 'date',
			   afterText :'Depois de',
			   beforeText :'Antes de',
			    onText :'Em',
				
           },
        /* renderer: function (value,a,e,t) {
			 			   console.log(value);
						   console.log(a);

            /* var data= value.getDate();
			 var dataHoje= new Date();
			 if(data == dataHoje)
			 {
				 return 'hoje :'+value;
				 }
				 else{
					 return value;
					 }*
         },*/
     },
     /* {
          xtype: 'actioncolumn',
          text: 'acões', align: 'center',
          width: 180,
          items: [{
              icon: 'https://cdn3.iconfinder.com/data/icons/text/100/print-16.png',
              tooltip: 'Imprimir',
              style: 'margin-left: 5px;'
          }, '->', {
              iconCls: 'icon-editar',
              tooltip: 'Editar/Detalhar',
              style: 'margin-left: 5px;',
              text: 'desfiliar'
          }, '->', {
              style: 'margin-left: 5px;',
              iconCls: 'icon-desfiliar',
              tooltip: 'Desfiliar',
              action: 'desfiliar'
          }, '->',
              {
                  iconCls: 'icon-book',
                  tooltip: 'Carteira',
                  style: 'margin-left: 5px;'
              }, '->',

    {
        icon: 'http://cdn1.iconfinder.com/data/icons/6x16-free-application-icons/16/Dollar.png',
        tooltip: 'Mensalidades',
        style: 'margin-left: 5px;'
    }]
      }*/],

    initComponent: function () {
        this.dockedItems = [
        {
            xtype: 'pagingtoolbar',
            dock: 'bottom',
            store: 'Strbc.store.Aniversariantes',
            pageSize: 30,
            displayInfo: true,
            displayMsg: 'Mostrando dados {0} - {1} de {2}',
            emptyMsg: "Nenhum dado encontrado."
        }, {
            xtype: 'toolbar',
            dock: 'top',
            items: [{
                xtype: 'tbspacer',
                flex: 1
            }

    ]
        }];
        this.callParent(arguments);
    }
});