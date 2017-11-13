
var groupingFeature = Ext.create('Ext.grid.feature.Grouping', {
    startCollapsed: true
});
Ext.require(['Ext.ux.TextMaskPlugin']);
Ext.define('Strbc.view.mensalidades.Mensalidade', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.gridmensalidades',
    store: 'Strbc.store.Mensalidades',
    //features: [groupingFeature],
    requires: [
        'Ext.grid.feature.Grouping',
		'Ext.ux.TextMaskCore'
    ],

    features: [{
        ftype: 'grouping',
        groupHeaderTpl: '<center><b  style="color:red;">Relação de mensalidades do {columnName}: {name} </b></center>',
        hideGroupedHeader: false,
       // startCollapsed: true,
       
    }],
    /*listeners: {
    afterrender: function () {
    var size = this.store.groups.length;
    for (i = 0; i < size; i++) {
    this.groupingFeature.collapse(this.store.groups.keys[i], true);
    }
    //groupingFeature.expand(groupName, true);
    }

    },*/
    columns: [
      {
          header: "Ano", flex: 1,
          width: 160, sortable: true,
          dataIndex: 'ano'
      },
    {
        header: "Mes",
        width: 160, flex: 1,
        dataIndex: 'mes'
    }, {
        header: "Valor",
        width: 170, flex: 1,
        dataIndex: 'valor',
		renderer: function(value) {
		   return  Ext.util.Format.MoneyMask.setMask('R$ #999.999.990,00').mask(value);//MascaraMoeda(value, '.', ',', null, 2);//Ext.util.Format.number(value, '0.000,00');
		
		} 
        // renderer :Ext.util.Format.maskRenderer('999.999.999.999,99')
       /*renderer: function(value) {
		var value=	Ext.util.Format.usMoney(value);
		value.replace('$','');
			//Ext.util.Format.thousandSeparator = '.';
          // Ext.util.Format.decimalSeparator = ',';
           return value; //  Ext.util.Format.number(value, '0.000,00');
             
         }*/
              
    }, {
        header: "Pago",
        width: 80, flex: 1,
        dataIndex: 'situacao',
        renderer: function (value, a, d, f, g, h, j, k) {
        	
            if (value == 'pago') {
                return '<img src="content/ico/pago_sim.png"  title="Pagamento efetuado">' + ' Sim'
            }
            else {
                return '<img src="content/ico/pago_nao.png" title="Não esta pago">' + ' Nao'
            }
        }
    }, {
        xtype: 'actioncolumn',
        width: 100,
        header: 'acoes',
        items: [{
            getClass: function (v, meta, rec) {
                if (rec.get('situacao') == 'aberto') {
                    return 'aberto';
                } else {
                    return 'pago';
                }
            },
            getTip: function (v, meta, rec) {
                if (rec.get('situacao') == 'aberto') {
                    return 'Dar Baixa';
                } else {
                    return 'Estornar';
                }
            }
            // icon: 'http://findicons.com/files/icons/1150/tango/16/go_bottom.png',
            //tooltip: 'Dar Baixa'
        }, '',
        {
            iconCls: 'icon-editar',
            tooltip: 'Detalhar|Editar'
        }/*, '',
        {
            iconCls: 'icon-delete',
            tooltip: 'Deletar'
        },*/]
    }],

    tbar: {
        xtype: 'toolbar',
        dock: 'top',
        items: [
        { xtype: 'tbfill' },
        {
            xtype: 'button',
            text: 'Novo',
            icon: 'http://findicons.com/files/icons/982/dellipack_2/16/plus.png',
            action: 'novo'
        }
    ]
    }


});
