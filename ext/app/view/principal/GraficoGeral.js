
var colors = [ 'url(#v-1)', 'url(#v-2)' ];

Ext.define('Strbc.view.principal.GraficoGeral', {
    extend : 'Ext.chart.Chart',
    alias : 'widget.graficogeral',
   // theme : 'Fancy',
    animate : {
        easing : 'bounceOut',
        duration : 750
    },
    animate : true,
    shadow : true,
    store : 'GraficosGerais',

    gradients : [ {
        'id' : 'v-1',
        'angle' : 0,
        stops : {
            0 : {
	            color : 'rgb(69,139,00)'
            },
            1000 : {
	            color : 'rgb(69,139,0)'
            }
        }
    }, {
        'id' : 'v-2',
        'angle' : 0,
        stops : {
            0 : {
	            color : 'rgb(0,238,0)'
            },
            1000 : {
	            color : 'rgb(0,238,0)'
            }
        }
    } ],
    axes : [ {
        type : 'Numeric',
        position : 'bottom',
        fields : [ 'valor' ],
        minimum : 0,
        label : {
	        renderer : Ext.util.Format.numberRenderer('0,0')
        },
        grid : true,
    }, {
        type : 'Category',
        position : 'left',
        fields : [ 'nome' ],
    } ],
    series : [ {
        type : 'bar',
        axis : 'bottom',
        tips : {
            trackMouse : true,
            width : 290,
            autoWidth : true,
            height : 28,
            renderer : function(storeItem, item) {
	            this.setTitle(storeItem.get('nome') + ': ' + storeItem.get('valor'));
            }
        },
        label : {
            display : 'insideEnd',
            'text-anchor' : 'middle',
            field : 'valor',
            orientation : 'horizontal',

        },
        renderer : function(sprite, storeItem, barAttr, i, store) {
	        barAttr.fill = colors[i % colors.length];
	        return barAttr;
        },

        xField : 'nome',
        yField : 'valor'
    } ]
});
